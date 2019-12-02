<?php

namespace App\Http\Controllers;

Class PagesController extends Controller{

   
    public function getAbout(){
        $first= "Esra";
        $last="Arafa";
        $full=$first." ".$last;
        $email="misssarro@gmail.com";
        return view("about")->with("fullName",$full)->with("email",$email);
    }
}