<?php

namespace App\Http\Controllers;

use App\Helpers\Uploader;
use  Carbon\Carbon;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;
use App\Models\CursoLeccion;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLessonRequest;

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
    public function store(StoreLessonRequest $request)
    {
        // dd($request->all());
        // se Valida de el formilario contiene el campo file
        $file = null;
        if($request->hasFile("file"))
        {
            $file = Uploader::uploadFile("file", "lecciones");
        }

        $lecccion = Leccion::create([
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
            'leccion_id'    => $lecccion->id
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
                                ->orderBy('order', 'desc')
                                ->take(1)
                                ->first();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
