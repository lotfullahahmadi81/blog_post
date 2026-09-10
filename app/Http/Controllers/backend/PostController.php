<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.posts.index')
        ->with('posts',Post::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'description' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'sub_title' => $request->subtitle,
            'description' => $request->description,
            'slug' => Str::slug($request->title)
        ]);
        Session()->flash('success','Post created successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('backend.posts.edit')
        ->with('posts',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'description' => 'required'
        ]);

        $post->title = $request->title;
        $post->sub_title = $request->subtitle;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);

        $post->save();
        Session()->flash('success','Post updated successfully');
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Post $post)
{
    $post->delete();

    return response()->json([
        'success' => true,
        'message' => 'Post deleted successfully.'
    ]);
}
}
