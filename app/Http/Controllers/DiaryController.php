<?php

namespace Mec\Http\Controllers;


use Illuminate\Http\Request;
use Mec\Http\Requests;
use Mec\Http\Controllers\Controller;
use Mec\Models\Post;

class DiaryController extends Controller
{
   public function getIndex(){

   		$posts = Post::orderBy('created_at','desc')->simplepaginate(4);
        return view('diary/diary')->withPosts($posts);

   }

   public function getSingle($slug){
      //current id
   		$post        = Post::where('slug' , '=' , $slug) -> first();
      $id          = Post::where('slug' , '=' ,$slug)  -> pluck('id');
      //previous id
      $previous_id = Post::where('id'   , '<' , $id)   -> max('id');
      $previous    = Post::find($previous_id);
      //Next id
      $next_id     = Post::where('id'   , '>' , $id )  -> min('id');
      $next        = Post::find($next_id);
      //-----------------------------------------------------------------
      $recent      = Post::orderBy('created_at','desc')->simplepaginate(4);
   		return view('diary.singlePost')->withPost($post)->withRecent($recent)->withPrevious($previous)->withNext($next);
   }
}
