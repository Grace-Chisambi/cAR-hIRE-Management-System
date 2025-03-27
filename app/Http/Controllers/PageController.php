<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PageController extends Controller
{
    //
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
    public function login(){
       return view('pages.login');
    }
    public function register(){
        return view('pages.register');
     }

    public function admin(){
        return view('Dashboard.admin');
     }

     public function ceo(){
        return view('Dashboard.ceo');
     }
     public function email(){
        return view('cars.email');
     }




}
