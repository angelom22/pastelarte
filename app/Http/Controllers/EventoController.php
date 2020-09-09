<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Event;
use  Carbon\Carbon;
use Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtrarCategoria($slug)
    {
        $category   = Category::where('slug', $slug)->pluck('id')->first();
        $events      = Event::where('category_id', $category)->orderBy('id', 'DESC')->paginate(3);

        $categories = Category::orderBy('name', 'ASC')->get();
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('evento.index',compact('events', 'categories', 'tags'));
    }
    
    public function filtrarEtiqueta($slug)
    {
        $events      = Event::whereHas('tags', function($query) use($slug)
        {
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->paginate(3);
        
        $categories = Category::orderBy('name', 'ASC')->get();
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('evento.index',compact('events', 'categories', 'tags'));
    }

    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->paginate(4);

        $categories = Category::orderBy('name', 'ASC')->get();

        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('evento.index', compact('events', 'categories', 'tags'));
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
    public function show($slug)
    {
        $event = Event::findBySlugOrFail($slug);

        $categories = Category::orderBy('name', 'ASC')->get();

        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('evento.show',compact('event', 'categories', 'tags'));
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
