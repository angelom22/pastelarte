<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Curso;
use App\Models\Category;
use App\Models\Carrera;
use App\Models\OrderLine;
use App\RolesPermisos\Models\Role;


class AdminController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess', 'dashboard.admin');

        $users = User::where('status', true)->orderBy('id', 'desc')->paginate(3);
        $cursosGratis = Curso::where('gratis', true)->count();
        $cursosPagos = Curso::where('gratis', false)->count();
        $ganaciaTotal = OrderLine::sum("precio");

        return view('admin.dashboard.index', compact('users', 'cursosPagos', 'cursosGratis', 'ganaciaTotal'));
    }

    public function curso(Request $request)
    {
        $this->authorize('haveaccess', 'course.admin');

        $cursos = Curso::Search($request->title)->withCount("estudiantes")->orderBy('id', 'DESC')->paginate(5);
        // dd($cursos[0]->estudiantes());
        
        return view('admin.cursos.index', compact('cursos'));
    }


    public function leccion(Curso $curso)
    {
        $this->authorize('haveaccess', 'lesson.admin');

        $cursos = Curso::orderBy('id', 'DESC')->get();

        return view('admin.leccion.create', compact('cursos'));
       
    }

    public function carrera()
    {
        $this->authorize('haveaccess', 'career.admin');

        $carreras = Carrera::orderBy('id', 'ASC')->get();

        return view('admin.carreras.index', compact('carreras'));
    }

    public function blog()
    {
        $this->authorize('haveaccess', 'blog.admin');

        $blogs = Blog::orderBy('id', 'ASC')->get();

        return view('admin.blog.index',compact('blogs'));
    }

    public function evento()
    {
        $this->authorize('haveaccess', 'event.admin');

        $events = Event::orderBy('id', 'ASC')->get();

        return view('admin.evento.index',compact('events'));
    }

    public function user($id)
    {   
        // dd($id);
        $this->authorize('haveaccess', 'userown.show');

        $roles = Role::orderBy('name')->get();

        $user = User::findOrfail($id);
        // dd($user->avatar);

        return view('admin.user.view', compact('user', 'roles'));
    }






















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
