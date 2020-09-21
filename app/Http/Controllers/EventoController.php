<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Events\EventSaved;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Event;
use  Carbon\Carbon;

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
        // $fileUrl = Storage::url($file);
        $file = request()->file('file')->store('eventos/'.$request->title);

        $event->user_id = auth()->id();
        $event->category_id = $request->get('category_id');
        $event->title = $request->get('title');
        $event->extracto = $request->get('extracto');
        $event->content = $request->get('content');
        $event->fecha = Carbon::parse($request->get('fecha'))->toDateTimeString();
        $event->hora = Carbon::parse($request->get('hora'))->toDateTimeString();
        $event->direccion = $request->get('direccion');
        $event->file = $file;
        $event->iframe = $request->get('iframe');
        
        // se guarda el post en la base da datos
        $event->save();

        // Se dispara el evento para la optimización de la imagen
        EventSaved::dispatch($event);

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

        $datos = $request->validate([
            'title'         => 'required|min:5',Rule::unique('events')->ignore($evento->title),
            'content'       => 'required',
            'category_id'   => 'required',
            'tag_id'        => 'required',
            'extracto'      => 'required',
            'fecha'         => 'required|date',
            'hora'          => 'required',
            'direccion'     => 'required',
            'file'          => 'image|max:2048' 
        ]);

        if ($request->hasFile('file')){
            // Se elimina la imagen del evento actual
            Storage::delete($evento->file);

            $file = request()->file('file')->store('eventos/'.$request->title);

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
               'file' => $file,
               'iframe' => $request->get('iframe')
            ]);

            // Se dispara el evento para la optimización de la imagen
            // EventSaved::dispatch($evento);

            // optimización de la imagen
            $image = Image::make(Storage::get($file))
                            ->widen(600)
                            ->encode();

            // se reemplaza la imagen que subio el usuario por la imagen optimizada
            Storage::put($evento->file, (string) $image);

        } else {
            $evento->update(array_filter($datos));
        }

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

        Storage::delete($event->file);
        
        $event->tags()->detach();
        
        $event->delete();

        return redirect()->route('admin.evento')->with('status_success', 'El evento ha sido eliminado');
    }
    
}
