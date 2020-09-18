<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Category;
use App\RolesPermisos\Models\Role;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public function curso()
    {
        $this->authorize('haveaccess', 'course.admin');

        
        return view('admin.cursos.index');
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

    public function user(User $id)
    {    
        $this->authorize('haveaccess', 'userown.show');

        $roles = Role::orderBy('name')->get();

        // $user = User::find($id);
        // dd($user);

        return view('admin.user.view', compact('id', 'roles'));
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
