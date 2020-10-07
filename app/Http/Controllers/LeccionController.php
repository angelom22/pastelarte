<?php

namespace App\Http\Controllers;

use App\Helpers\Uploader;
use  Carbon\Carbon;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;
use App\Models\CursoLeccion;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\LessonRequest;

class LeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Curso $id)
    {
        Gate::authorize('haveaccess', 'lesson.create');
        
        // $curso = Curso::findOrFail($id);
        // dd($curso);
        // Nueva instancia de leccion
        $leccion = new Leccion;

        return view('admin.leccion.create', compact('leccion','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        Gate::authorize('haveaccess', 'lesson.create');

        // se Valida de el formilario contiene el campo file
        $file = null;
        if($request->hasFile("file"))
        {
            $file = Uploader::uploadFile("file", "lecciones/".$request->title_leccion);
        }

        $leccion = Leccion::create([
            'curso_id'              => $request->curso_id,
            'title_leccion'         => $request->title_leccion,
            'leccion_type'          => $request->leccion_type,
            'description_leccion'   => $request->description_leccion,
            'duracion_leccion'      => $request->duracion_leccion,
            'url_video'             => $request->url_video,
            'file'                  => $file,
        ]);
        
        CursoLeccion::create([
            'curso_id'      => $request->curso_id,
            'leccion_id'    => $leccion->id
        ]);

        // Retornar la vista al curso individual "cursos.show, $request->curso_id"
        return back()->with('status_success', 'La lección ha sido creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecciones = Leccion::whereCursoId($id)
                            ->select('lecciones.*')
                            ->orderBy('order', 'desc')
                            ->paginate();
        // dd($lecciones);
        return view('admin.leccion.show', compact('lecciones'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('haveaccess', 'lesson.edit');

        $leccion = Leccion::findOrfail($id);
        // dd($leccion);

        return view('admin.leccion.edit', compact('leccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, $id)
    {
        $this->authorize('haveaccess', 'lesson.edit');

        $leccion = Leccion::where('id', $id)->first();

        // Se comprueba se se tiene un archivo en la colunma file
        $file = $leccion->file;
        if ($request->hasFile('file')) {
            if ($leccion->file) {
                Uploader::removeFile("lecciones/".$leccion->title_leccion, $leccion->file);
            }
            $file = Uploader::uploadFile('file', "lecciones/".$leccion->title_leccion);
        }

        $leccion->fill([
            'curso_id' => $request->curso_id,
            'title_leccion' => $request->title_leccion,
            'leccion_type' => $request->leccion_type,
            'description_leccion' => $request->description_leccion,
            'duracion_leccion' => $request->duracion_leccion,
            'url_video' => $request->url_video,
            'file' => $file
        ])->save();
        // dd($leccion->curso->id);

        return redirect()->action(
            [LeccionController::class, 'show'], [$leccion->curso->id]
        )->with('status_success', 'La lección ha sido actualizada exitosamente');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $this->authorize('haveaccess', 'course.destroy');

        try {
            $leccion = Leccion::where('id', $id)->first();
            if (request()->ajax()) {
                if ($leccion->file) {
                    Uploader::removeFile("lecciones/".$leccion->title_leccion, $leccion->file);
                }
                $leccion->delete();
                session()->flash("message", ["success", __("La lección :id del curso :course ha sido eliminada correctamente", [
                    "id" => $leccion->id,
                    "course" => $leccion->curso->title
                ])]);
            } else {
                abort(401);
            }
        } catch (\Exception $exception) {
            session()->flash("message", ["danger", $exception->getMessage()]);
        }
    }
}
