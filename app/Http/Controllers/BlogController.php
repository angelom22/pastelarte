<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use  Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filtrarCategoria($slug)
    {
        $category   = Category::where('slug', $slug)->pluck('id')->first();
        $blogs      = Blog::where('category_id', $category)->orderBy('id', 'DESC')->where('status', 'PUBLICADO')->paginate(3);

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
        
        $blogs  = Blog::publicados()->paginate(3);

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

        return view('blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request()->file('file'));
        // Validación
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required',
            'category_id' => 'required',
            'extracto' => 'required',
            // 'file' => 'required|image|max:2048'
        ]);

        // Nueva instancia de blog
        $blog = new Blog;
        
        $file = Storage::disk('public')->put('blog/'.$request->title, $request->file('file'));

        $blog->user_id = auth()->id();
        $blog->category_id = $request->get('category_id');
        $blog->title = $request->get('title');
        $blog->extracto = $request->get('extracto');
        $blog->content = $request->get('content');
        // $blog->status = $request->get('status');
        $blog->status = 'PUBLICADO';
        $blog->file = $file;
        $blog->iframe = $request->get('iframe');
        $blog->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at'))  : null;

        // guardar etiquetas
        // $blog->tags()->sync($request->get('tag_id'));

        // se guarda el post en la base da datos
        $blog->save();

    

        return back()->with('flash', 'Tu publicación ha sido creada exitosamente');
    }

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
