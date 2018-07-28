<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title='Welcome to Laravel';
      //return view('pages.index');
      return view('pages.index')->with('title',$title);
      //return view('pages.about',compact('title'));
    }
    public function about(){
      //$title='Welcome To Laravel';
      //return view('pages.about',compact('title'));
      $title='About us';
      //return view('pages.about',compact('title'));
      return view('pages.about')->with('title',$title);
    }
    public function services(){
      $data=array(
        'title'=>'Services',
        'services'=>['Web Design','Programming','SEO']
      );
      return view('pages.services')->with($data);
}
}
