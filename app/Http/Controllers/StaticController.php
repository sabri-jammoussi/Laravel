<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index(){
        return view('welcome'); //isem el page eli fel view 
    }

    public function about(){
        return view('about');//name of  page in  view
    }
    public function portfolio(){
        return "<h1>PORTFOLIO PAGE</h1>";
    }

    public function contact(){
        return view('contact');
    }
}
