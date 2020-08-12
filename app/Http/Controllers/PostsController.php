<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }
    
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
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get File Name With The EXT
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get Just File Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get Just Ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            // File Name To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
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
        $post = Post::find($id);

        //check for correct user
        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'صفحه غیر قابل دسترسی است. لطفا وارد شوید یا ثبت نام کنید!');
        }

        return view('posts.edit')->with('post', $post);
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
        $post = Post::find($id);
        if (empty($post)) {
            return response("Not Found!", 404);
        }

        if ($request->hasFile('cover_image')) {
            // Get File Name With The EXT
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get Just File Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get Just Ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            // File Name To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'cover_image' => $fileNameToStore
        // ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'ویرایش با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        //check for correct user
        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'صفحه غیر قابل دسترسی است. لطفا وارد شوید یا ثبت نام کنید!');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'حذف با موفقیت انجام شد');
    }
}
