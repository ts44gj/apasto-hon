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
    public function showTimeline(){
        $posts = Post::latest()->get();

        return view('post.user.timeline',['posts' => $posts],);
    }

    public function show($admin_id){

        $posts =Post::where('admin_id',$admin_id)->latest()->get();
        //$posts = Post::find($admin_id);
       // $admin_id = Admin::where('id',$admin_id)->first();

        return view('post.admin.show_timeline')->with('posts',$posts);

        //public function show(Admin $admin){
        //    $admin = Admin::find($admin->id); //idが、リクエストされた$userのidと一致するuserを取得
         //   $posts = Post::where('admin_id', $admin->id) //$userによる投稿を取得
        //    ->orderBy('created_at', 'desc');// 投稿作成日が新しい順に並べる
         //   return view('post.admin.show_timeline', [
         //   'admin_name' => $admin->name, // $user名をviewへ渡す
         //   'posts' => $posts, // $userの書いた記事をviewへ渡す
       // ]);

      //  }
}

}
