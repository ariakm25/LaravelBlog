<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\App;

class FrontendController extends Controller
{
   //Index(Home)
   public function index()
   {
       $post = Post::orderBy('id', 'DESC')->paginate(2);
       return view('frontend.index')->with('posts', $post);
   }

   public function single()
   {
       return view('frontend.single')->with('post', Post::find(1));
   }

   public function single_app()
   {
       return view('frontend.app-single')->with('app', App::find(1));
   }

}
