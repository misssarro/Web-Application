<?php

namespace App\Http\Controllers;
use App\Post;
Class BlogController extends Controller{

    public function getIndex(){
        $posts=Post::paginate(10);
        return view('blog.index',['posts'=>$posts]);
    }
    public function getSinglePost($id){
        $post= Post::findOrFail($id);
        return view('blog.single',['post'=>'post']);
    }
   
}