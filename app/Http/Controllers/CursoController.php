<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use App\Models\Curso;
use App\Models\Carrera;
use App\Models\Leccion;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'course.create');

        // Nueva instancia de blog
        $curso = new Curso;
        $carreras = Carrera::all();

        return view('admin.cursos.create', compact('curso','carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        // dd($request->all());
        Gate::authorize('haveaccess', 'course.create');

        $thumbnail = request()->file('thumbnail')->store('thumbnail/'.$request->title);
        // $thumbnailUrl = Storage::url($thumbnail);

        $user = auth()->id();
        
        $curso = Curso::create([
            'user_id' => $user,
            // 'leccion_id' => $request->leccion_id;
            'carrera_id'        => $request->carrera_id,
            'title'             => $request->title,
            'thumbnail'         => $thumbnail,
            'description'       => $request->description,
            'extracto'          => $request->extracto,
            'precio'            => $request->precio,
            'duracion_curso'    => $request->duracion_curso,
            'nivel_habilidad'   => $request->nivel_habilidad,
            'lengueaje'         => $request->lengueaje,
            'instructor'        => $request->instructor
            ]);

        // foreach($request->id_lecciones as $id_leccion)
        // {
        //     $lecccion = Leccion::create([
        //         'title_leccion'         => $request->title_leccion,
        //         'desciption_leccion'    => $request->desciption_leccion,
        //         'duracion_leccion'      => $request->duracion_leccion,
        //         'url_video'             => $request->url_video,
        //     ]);
        // }

        // Crear una funcion en el modelo curso que me guarde las relaciones entre los cursos y las lecciones
        // $curso->lecciones()->sync($request->id_lecciones);

        return redirect()->route('admin.curso')->with('status_success', 'El curso ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
