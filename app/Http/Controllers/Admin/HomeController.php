<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
         $posts = Admin::latest()->get();

        return view('admin.home',[
          'posts' => $posts
        ]);
    }

}

