<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{



   public function index()
    {
        return view('user.home');
    }

        //タイムライン画面を表示
    //public function showTimeline(){

       // $posts = Post::latest()->get();
      //  return view('post.user.timeline',['posts' => $posts],);
    //}
    //タイムライン画面を表示
    public function showTimeline(){

        $posts = Post::latest()->get();
        return view('user.home',['posts' => $posts],);
    }
        //お店毎のタイムライン画面を表示
    public function show(Admin $admin_id){

        $user = Admin::find($admin_id->id);

        $posts =Post::where('admin_id',$admin_id->id)->latest()->get();
        return view('post.user.show_timeline',['posts' => $posts,'user_name' => $user ->name,]);
        //,compact('posts'))
}


}
