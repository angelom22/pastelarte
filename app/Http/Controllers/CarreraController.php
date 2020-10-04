<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCareerRequest;

class CarreraController extends Controller
{

    public function filtrarCarrera($slug)
    {
        $carrera   = Carrera::select('carreras.*')->where('slug', $slug)->first();

        $carrera_cursos    = Curso::where('carrera_id', $carrera->id)
                            ->where("status", Curso::DISPONIBLE)
                            ->select('cursos.*')
                            ->orderBy('id', 'ASC')
                            ->get();

        $cursos    = Curso::where('carrera_id', $carrera->id)
                            ->where("status", Curso::DISPONIBLE)
                            ->select('cursos.*')
                            ->orderBy('id', 'ASC')
                            ->paginate();

        return view('carrera.index',compact('carrera_cursos','carrera', 'cursos'));
    }

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
    public function create()
    {
        Gate::authorize('haveaccess', 'career.create');

        // Nueva instancia de blog
        $carrera = new Carrera;

        return view('admin.carreras.create', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerRequest $request)
    {
        Gate::authorize('haveaccess', 'career.create');

        $curso = Carrera::create([
            'title'             => $request->title,
            'precio'            => $request->precio,
            'description'       => $request->description,
            'url_video_preview_carrera' => $request->url_video_preview_carrera,
            // 'thumbnail'         => $thumbnail,
        ]);

         return redirect()->route('admin.carrera,index')->with('status_success', 'La carrera ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $carrera   = Carrera::select('carreras.*')->where('slug', $slug)->first();

        $carrera_cursos    = Curso::where('carrera_id', $carrera->id)
                            ->where('status', 'DISPONIBLE')
                            ->select('cursos.*')
                            ->orderBy('id', 'ASC')
                            ->get();

        $cursos    = Curso::where('carrera_id', $carrera->id)
                            ->where('status', 'DISPONIBLE')
                            ->select('cursos.*')
                            // ->orderBy('id', 'ASC')
                            ->paginate(3);

        return view('carrera.index',compact('carrera_cursos','carrera', 'cursos'));
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
        // dd($request->carrera_id);
        $this->authorize('haveaccess', 'career.edit');

        $carrera = Carrera::findOrFail($request->carrera_id);

        $datos = $request->validate([
            'title'         => 'required|min:5',Rule::unique('carreras')->ignore($request->title),
            'precio'       => 'required|numeric',
            'url_video_preview_carrera'   => 'required|active_url',
        ]);

        // se actualiza la carrera en la base da datos
        $carrera->update($datos);

        return redirect()->back()->with('status_success', 'La carrera ha sido actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $this->authorize('haveaccess', 'career.destroy');

        // Se elimina la carrera
        $carrera->delete();

        return redirect()->route('admin.carrera')->with('status_success', 'La carrera ha sido eliminada');
    }
}
