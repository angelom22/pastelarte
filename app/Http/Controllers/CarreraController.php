<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Carrera;

class CarreraController extends Controller
{

    public function filtrarCarrera($slug)
    {
        $carrera   = Carrera::select('id', 'title', 'description')->where('slug', $slug)->first();
        $cursos    = Curso::where('carrera_id', $carrera)
                            ->where('status', 'DISPONIBLE')
                            // ->select('title', 'slug', 'thumbnail', 'precio', 'instructor')
                            // ->orderBy('id', 'DESC')
                            ->paginate(1);
        // dd($cursos);
        
        // $categories = Category::orderBy('name', 'ASC')->get();
        // $tags       = Tag::orderBy('name', 'ASC')->get();
        
        return view('carrera.index',compact('cursos','carrera'));
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
