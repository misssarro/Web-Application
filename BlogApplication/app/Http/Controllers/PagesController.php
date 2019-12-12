<?php

namespace App\Http\Controllers;
use App\Post;
Class PagesController extends Controller{

    public function getIndex(){
        $posts=Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome',['posts'=>$posts]);
    }
   
    public function getAbout(){
        $first= "Esra";
        $last="Arafa";
        $full=$first." ".$last;
        $email="misssarro@gmail.com";
        return view("pages.about")->with("fullName",$full)->with("email",$email);
    }
}