<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        return view('pages.services');
    }
    public function car(){
        return view('pages.car');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function pricing(){
        return view('pages.pricing');
    }
    public function login(){
       return view('pages.login');
    }
    public function register(){
        return view('pages.register');
     }
}
