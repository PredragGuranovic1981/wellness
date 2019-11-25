<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
      return view('pages.home');
    }

    public function getAbout(){
      return view('pages.about');
    }

    public function getGalery(){
      return view('pages.galery');
    }

    public function getTreatment(){
      return view('pages.treatment');
    }

    public function getContact(){
      return view('pages.contact');
    }
}
