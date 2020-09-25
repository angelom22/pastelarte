<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use  Carbon\Carbon;
use App\Models\Curso;
use App\Models\Carrera;
use App\Models\Leccion;
use App\Models\CursoLeccion;
use App\Models\CarreraCurso;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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
            'duracion_curso'    => Carbon::parse($request->duracion_curso)->toDateTimeString(),
            // 'duracion_curso'    => $request->duracion_curso,
            'nivel_habilidad'   => $request->nivel_habilidad,
            'lengueaje'         => $request->lengueaje,
            'instructor'        => $request->instructor,
            'url_video_preview_curso' => $request->url_video_preview_curso,
            ]);
        
        // se guarda en la tabla relacion el curso creado con la carrera a la que fue asignado
        CarreraCurso::create([
            'carrera_id'    => $request->carrera_id,
            'curso_id'      => $curso->id
        ]);

        // optimización de la imagen
        $image = Image::make(Storage::get($thumbnail))
                        ->widen(600)
                        // ->limitColors(255)
                        ->encode();

        // se reemplaza la imagen que subio el usuario por la imagen optimizada
        Storage::put($curso->thumbnail, (string) $image);

        return redirect()->route('admin.curso')->with('status_success', 'El curso ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $curso = Curso::findBySlugOrFail($slug);
        
        $lecciones = Leccion::where('curso_id', $curso->id)->get();
        
        // dd($lecciones);
        
        $cursos = Curso::orderBy('id', 'ASC')->paginate(3);

        return view('cursos.show',compact('curso','cursos', 'lecciones'));
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
