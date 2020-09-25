<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Carrera;

class CarreraController extends Controller
{

    public function filtrarCarrera($slug)
    {
        $carrera   = Carrera::select('id', 'title', 'description', 'precio')->where('slug', $slug)->first();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
