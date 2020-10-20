<?php

namespace App\Http\Controllers;

use App\Helpers\Currency;
use DB;
use App\User;
use App\Models\Curso;
use App\Models\Carrera;
use App\Models\Leccion;
use App\Helpers\Uploader;
use App\Models\CursoLeccion;
use App\Models\CarreraCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CourseRequest;


use App\Models\Comentario;
use App\Http\Resources\ComentarioResource;
use App\Models\Review;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $cursos = Curso::filtro();
        
        $totalCursos = $cursos->count();
    
        $session = session('search[cursos]');

        return view('cursos.index', compact('cursos', 'session'));
    }
    
    public function aprende(Curso $curso)
    {
        $curso->load("lecciones");
        return view('estudiante.cursos.show', compact('curso'));
    }

    public function createReview(Curso $curso) {
        return view("estudiante.cursos.reviews.form", compact("curso"));
    }

    public function storeReview(Curso $curso) 
    {
        $reviewed = $curso->reviews->contains('user_id', auth()->id());
        if ($reviewed) {
            return redirect(route("cursos.aprende", ["curso" => $curso]))
                ->with("message", ["danger", __("No puedes valorar este curso, ya lo has hecho antes")]);
        }

        // Valoracion si el usuario compro el curso
        // $userOwner = $curso->estudiantes->contains(auth()->id());
        // if ($userOwner) {
        //     return redirect(route("cursos.aprende", ["curso" => $curso]))
        //         ->with("message", ["danger", __("No puedes valorar este curso, ya que no lo has obtenido")]);
        // }

        $this->validate(request(), [
            "review" => "required|string|min:10",
            "stars" => "required"
        ]);

        $review = Review::create([
            "user_id" => auth()->id(),
            "curso_id" => $curso->id,
            "stars" => (int) request("stars"),
            "review" => request("review"),
            "created_at" => now()
        ]);

        return redirect(route("cursos.aprende", ["curso" => $curso]))
            ->with("message", ["success", __("Muchas gracias por valorar el curso")]);
    }

    public function search()
    {
        session()->remove('search[cursos]');
        if(request('search')){
            session()->put('search[cursos]', request('search'));
            session()->save();
        };
        return redirect(route('cursos.index'));
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
    public function store(CourseRequest $request)
    {
        // dd($request->all());
        Gate::authorize('haveaccess', 'course.create');

        $thumbnail = request()->file('thumbnail')->store('thumbnail/'.$request->title);
        // $thumbnailUrl = Storage::url($thumbnail);

        $curso = Curso::create([
            'carrera_id'        => $request->carrera_id,
            'title'             => $request->title,
            'thumbnail'         => $thumbnail,
            'description'       => $request->description,
            'extracto'          => $request->extracto,
            'precio'            => $request->precio,
            'duracion_curso'    => Carbon::parse($request->duracion_curso)->toDateTimeString(),
            // 'duracion_curso'    => $request->duracion_curso,
            'nivel_habilidad'   => $request->nivel_habilidad,
            'lenguaje'          => $request->lenguaje,
            'instructor'        => $request->instructor,
            'gratis'            => $request->gratis,
            'featured'          => $request->featured,
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
        $curso = Curso::findBySlugOrFail($slug)
                        ->load("lecciones", "estudiantes", "reviews.autor");
        // dd($curso->reviews->count());
        $TotalCursos = Curso::orderBy('id', 'ASC')->get();

        return view('cursos.show', compact('curso', 'TotalCursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        // dd($curso);
        $this->authorize('haveaccess', 'course.edit');

        $carreras = Carrera::all();

        $curso->load("lecciones");
        // dd($curso);
        
        return view('admin.cursos.edit', compact('curso','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Curso $curso)
    {
        // dd($request->orderedLecciones);
        $this->authorize('haveaccess', 'course.edit');

        // Si se actualiza el articulo se elimina la imagen antigua del servidor
        if ($request->hasFile('thumbnail')) {

            // Se elimina el thumbnail del curso
            Storage::delete($curso->thumbnail);

            // Se guarda la imagen nueva
            $thumbnail = request()->file('thumbnail')->store('thumbnail/'.$request->title);
    
            // se guarda el post en la base da datos
            $curso->update([
                'carrera_id'                => $request->carrera_id,
                'title'                     => $request->title,
                'thumbnail'                 => $thumbnail,
                'description'               => $request->description,
                'extracto'                  => $request->extracto,
                'precio'                    => $request->precio,
                'duracion_curso'            => Carbon::parse($request->duracion_curso)->toDateTimeString(),
                'nivel_habilidad'           => $request->nivel_habilidad,
                'lenguaje'                  => $request->lenguaje,
                'instructor'                => $request->instructor,
                'gratis'                    => $curso->gratis,
                'featured'                  => $curso->featured,
                'status'                    => $request->status,
                'url_video_preview_curso'   => $request->url_video_preview_curso,
            ]);

            // optimización de la imagen
            $image = Image::make(Storage::get($thumbnail))
                            ->widen(600)
                            // ->limitColors(255)
                            ->encode();
    
            // se reemplaza la imagen que subio el usuario por la imagen optimizada
            Storage::put($curso->thumbnail, (string) $image);
        }else {
            $curso->update(array_filter($request->all()));
        }

        // Se actualiza el orden de las lecciones en la tabla lecciones 
        if ($request->orderedLecciones) {
            $data = json_decode($request->orderedLecciones);
            foreach($data as $leccion) {
                Leccion::whereId($leccion->id)->update(["order" => $leccion->order]);
            }
        }

        return redirect()->route('admin.curso')->with('status_success', 'El curso ha sido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        // dd($curso);
        $this->authorize('haveaccess', 'course.destroy');

        try {
            
            if (request()->ajax()) {
                Storage::delete($curso->thumbnail);
                $curso->Lecciones()->delete();
                $curso->delete();
                session()->flash("message", ["success", __("El :curso ha sido eliminado correctamente", [
                    "curso" => $curso->title
                ])]);
            } else {
                abort(401);
            }
        } catch (\Exception $exception) {
            session()->flash("message", ["danger", $exception->getMessage()]);
        }


        // Se elimina el thumbnail actual del curso
        // Storage::delete($curso->thumbnail);
    
        // $curso->delete();

        // return redirect()->route('admin.curso')->with('status_success', 'Se a eliminado el curso correctamente'); 
    }
}
