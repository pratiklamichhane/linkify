<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $name = 'Welcome to Linkify';
        return view('homepage', compact('name'));
    }

    public function about(){
        return view('about');
    }
}
