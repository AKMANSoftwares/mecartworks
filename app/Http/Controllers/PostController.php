<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Mec\Http\Requests;
use Mec\Http\Controllers\Controller;
use Mec\Models\Post;
use Mec\Models\User;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
     {
       $this->middleware('auth',['except'=>['logout'] ]);
     }
    public function index()
    {
        $posts = Post::orderBy('id','desc')->simplepaginate(5);
        return view('posts.index')->withPosts($posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      //validate
        $this->validate($request,array(
                'title'          => 'required|max:255',
                'slug'           => 'required|min:5|max:255|unique:posts,slug',
                'body'           => 'required',
                'featured-image' => 'sometimes|image'
            ));
        //insert into database
        $post  = new Post;
        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->body  = $request->body;

        //insert image
        if ($request->hasFile('featured-image')) {
            $image    = $request->file('featured-image');
            $filename = $request->slug. '-' . time() .'.' . $image->getClientOriginalExtension();
            $location = public_path('images/posts/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image = $filename;
        }
        //save
        $post->save();
        Session::flash('sucess','The blog post was sucessfully saved!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
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
        return view('posts.edit')->withPost($post);
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
        //form fields validation
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'slug'           => "required|min:5|max:255|unique:posts,slug,$id",
            'body'           => 'required',
            'featured-image' => 'sometimes|image'
            ));
        //instantiate
        $post = Post::find($id);
        //get the values
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->body  = $request->input('body');

        if ($request->hasFile('featured-image')) {
            //create new image
            $image    = $request->file('featured-image');
            $filename = $request->slug. '-' .time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/posts/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            //store in database
            $oldFilename = $post->image;
            $post->image = $filename;
            //delete old image
            File::delete(public_path('images/posts/'. $oldFilename));
        }

        //save
        $post->save();
        //redirect
        return redirect()->route('posts.show',$post->id);
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
        $post->delete();
        return redirect()->route('posts.index');
    }
}
