<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {  //  WITH PERMETTE DI EFFETTURARE UNA SINGOLA CHIAMATA PREDENDO CATGORY E TAGS

        $posts = Post::with(['category','tags'])->orderBy('created_at', 'desc')->limit(20)->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories= Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|Max:150|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' =>'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'


        ]);

        $data = $request->all();
        $slug = Str::slug($data['title']);
        $counter = 1;
        $slug_base = Str::slug($data['title']);
        $post_present = Post::where('slug', $slug)->first();

        while ($post_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        }

        $post = new Post();
        $post->fill($data);
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        $request->validate([

            'title' => 'required|Max:150|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' =>'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'




        ]);

        $data = $request->all();


        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }
        else{
            //  $post->tags()->sync([]);
             $post->tags()->detach();
        }

        
        if ($post->title != $data['title']) {
            $slug = Str::slug($data['title']);
            $counter = 1;
            $slug_base = Str::slug($data['title']);
            $post_present = Post::where('slug', $slug)->first();
            $data['slug'] = $slug;

            while ($post_present) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $post_present = Post::where('slug', $slug)->first();
                

            }
        };
      
    
        
        $post->update($data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
