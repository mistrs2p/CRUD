<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // index => listing of all the posts
    // create => represent form
    // store => submit to the function , take care of submitting it to the model to the database
    // edit => edit form
    // update
    // delete
    // show => showing a single post

    public function index()
    {
        //fetch all of the data in the model in the table
        // $posts = Post::all(); // return this line and stops. not loading the view

        // return Post::where('title', 'Post Two')->get(); 
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title', 'desc')->take(1)->get(); // return this line and stops. not loading the view asc

        // $posts = Post::orderBy('title', 'desc')->get(); // return this line and stops. not loading the view asc
        $posts = Post::orderBy('created_at', 'desc')->paginate(5); // return this line and stops. not loading the view asc
        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
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
        // return $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        // Create post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success', 'پست جدید ایجاد شد.');
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
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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