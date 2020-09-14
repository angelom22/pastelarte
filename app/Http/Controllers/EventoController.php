<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreEventRequest;
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
        $events = Event::orderBy('id', 'DESC')
                            ->whereNotNull('fecha')
                            ->where('fecha', '>=' , Carbon::now() )
                            ->latest('fecha')->paginate(4);
        
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
        Gate::authorize('haveaccess', 'event.create');

        // Nueva instancia de blog
        $evento = new Event;
        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.evento.create', compact('categories', 'tags', 'evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        Gate::authorize('haveaccess', 'event.create');
        // Nueva instancia de blog
        $event = new Event;
        
        // $file = Storage::disk('public')->put('eventos/'.$request->title, $request->file('file'));
        $file = request()->file('file')->store('public/eventos/'.$request->title);
        $fileUrl = Storage::url($file);

        $event->user_id = auth()->id();
        $event->category_id = $request->get('category_id');
        $event->title = $request->get('title');
        $event->extracto = $request->get('extracto');
        $event->content = $request->get('content');
        $event->fecha = Carbon::parse($request->get('fecha'))->toDateTimeString();
        $event->hora = Carbon::parse($request->get('hora'))->toDateTimeString();
        $event->direccion = $request->get('direccion');
        $event->file = $fileUrl;
        $event->iframe = $request->get('iframe');
        
        // se guarda el post en la base da datos
        $event->save();

        // guardar etiquetas en la tabla relacional
        $event->syncTags($request->get('tag_id'));
    
        return redirect()->route('admin.evento')->with('status_success', 'El Evento ha sido creado exitosamente');
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
    public function edit(Event $evento)
    {
        // dd($evento);
        $this->authorize('haveaccess', 'event.edit');
        // $event = Event::findOrfail($id);
        // dd($event);

        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.evento.edit', compact('evento','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $evento)
    {
        $this->authorize('haveaccess', 'event.edit');

        $request->validate([
            'title'          => 'required|min:5|unique:events,title,'.$evento->title,
            'content' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'extracto' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
            'direccion' => 'required',
            // 'file' => 'required|image|max:2048' 
        ]);

         // se actualiza el evento en la base da datos
         $evento->update([
            'user_id' => auth()->id(),
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'extracto' => $request->get('extracto'),
            'content' => $request->get('content'),
            'fecha' => Carbon::parse($request->get('fecha'))->toDateTimeString(),
            'hora' => Carbon::parse($request->get('hora'))->toDateTimeString(),
            'direccion' => $request->get('direccion'),
            // 'file' => $file,
            'iframe' => $request->get('iframe')
         ]);


        // guardar etiquetas en la tabla relacional
        $evento->syncTags($request->get('tag_id'));
    
        return redirect()->route('admin.evento')->with('status_success', 'El Evento ha sido actualizado exitosamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess', 'event.destroy');

        $event = Event::findOrfail($id);

        $event->tags()->detach();
        
        Storage::disk('public')->delete($event->file);
        
        $event->delete();

        return redirect()->route('admin.evento')->with('status_success', 'El evento ha sido eliminado');
    }
    
}
