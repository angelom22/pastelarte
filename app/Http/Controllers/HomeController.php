<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Carrera;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user()->roles[0]->full_access);
        $carreras = Carrera::withCount("cursos")->get();

        $cursosFeatured = Curso::withCount("estudiantes")
                                    ->with("carrera")
                                    ->whereFeatured(true)
                                    ->whereStatus(Curso::DISPONIBLE)
                                    ->get();

        // dd($cursosFeatured[0]->rating);
        
        $total = $cursosFeatured->count();
        

        return view('home', compact('carreras', 'cursosFeatured','total'));
    }
}
