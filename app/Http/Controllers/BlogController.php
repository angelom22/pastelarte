<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Blog;
use  Carbon\Carbon;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filtrarCategoria($slug)
    {
        // dd($slug);
        $category   = Category::where('slug', $slug)->pluck('id')->first();
        $blogs      = Blog::where('category_id', $category)->orderBy('id', 'DESC')->where('status', 'PUBLICADO')->paginate(3);
        dd($blogs);

        $categories = Category::orderBy('name', 'ASC')->get();
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('Blog.index',compact('blogs', 'categories', 'tags'));
    }
    
    public function filtrarEtiqueta($slug)
    {
        $blogs      = Blog::whereHas('tags', function($query) use($slug)
        {
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLICADO')->paginate(3);
        
        $categories = Category::orderBy('name', 'ASC')->get();
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('Blog.index',compact('blogs', 'categories', 'tags'));
    }

    public function index()
    {
        $blogs = Blog::publicados()->paginate(3);

        $categories = Category::orderBy('name', 'ASC')->get();
        // dd($categories[0]->slug);

        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('Blog.index',compact('blogs', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'blog.create');

        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        Gate::authorize('haveaccess', 'blog.create');

        $this->validate($request, [
            'title' => 'required|min:5'
        ]);
    
        $blog = Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->get('title')
            ]);

        return redirect()->route('BlogEdit', $blog);

    }

    
    // public function store(StoreBlogRequest $request)
    // {
        // Gate::authorize('haveaccess', 'blog.create');
    //     // Nueva instancia de blog
    //     $blog = new Blog;
        
    //     $file = Storage::disk('public')->put('blog/'.$request->title, $request->file('file'));

    //     $blog->user_id = auth()->id();
    //     $blog->category_id = $request->get('category_id');
    //     $blog->title = $request->get('title');
    //     $blog->extracto = $request->get('extracto');
    //     $blog->content = $request->get('content');
    //     $blog->status = $request->get('status');
    //     $blog->file = $file;
    //     $blog->iframe = $request->get('iframe');
        
    //     // se guarda el post en la base da datos
    //     $blog->save();

    //     // guardar etiquetas en la tabla relacional
    //     $blog->syncTags($request->get('tag_id'));
    
    //     return redirect()->route('admin.blog')->with('status_success', 'Tu publicación ha sido creada exitosamente');
    // }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::findBySlugOrFail($slug);

        $categories = Category::orderBy('name', 'ASC')->get();

        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('Blog.show',compact('blog', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        // dd($blog);
        $this->authorize('haveaccess', 'blog.edit');
        
        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.blog.edit', compact('blog','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, Blog $blog)
    {
        $this->authorize('haveaccess', 'blog.edit');

        // ddd($request->validated());

        // Si se actualiza el articulo se elimina la imagen antigua del servidor
        if ($request->hasFile('file')) {
            // Se elimina el file actual
            Storage::delete($blog->file);
        }
        
        // Se guarda la imagen nueva
        // $file = request()->file('file')->store('blog/'.$request->title);
        // $fileUrl = Storage::url($file);
        $file = $request->file('file')->store('blog/'.$request->title);

        // se guarda el post en la base da datos
        $blog->update(array_filter([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' =>  $request->title,
            'extracto' =>  $request->extracto,
            'content' =>  $request->content,
            'status' =>  $request->status,
            'file' =>  $file,
            'iframe' =>  $request->iframe,
        ]));

        // optimización de la imagen
        $image = Image::make(Storage::get($file))
                        ->widen(600)
                        // ->limitColors(255)
                        ->encode();

        // se reemplaza la imagen que subio el usuario por la imagen optimizada
        Storage::put($blog->file, (string) $image);

        // guardar etiquetas en la tabla relacional
        $blog->syncTags($request->get('tag_id'));
    
        return redirect()->route('admin.blog')->with('status_success', 'Tu publicación ha sido guardada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('haveaccess', 'blog.destroy');

        $blog->tags()->detach();

        // Se elimina el avatar actual
        Storage::delete($blog->file);
        
        $blog->delete();

        return redirect()->route('admin.blog')->with('status_success', 'La publicación ha sido eliminada');
    }
}
