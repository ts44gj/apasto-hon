<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use \InterventionImage;

class PostController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth:admin');
    }


 //text 作成画面を表示
    public function create()
    {
        return view('post.admin.create', [
        ]);}

    public function store(Request $request){

        if($request->file('image')->isValid()){
            $fileName=$request->file('image')->getClientOriginalName();
            //upload
            $request->file('image')->storeAs('public/images',$fileName);



            $fullFilePath = '/storage/images/'.$fileName;
            $text = $request ->input('text');

            Post::create([
                'admin_id' => \Auth::user()->id,
                'name'=>\Auth::user()->name,
                'image'=>$fullFilePath,
                'text'=> $text
            ]);


        }
        return redirect(route('admin.home.index'));
    }

     //タイムライン画面を表示
    public function admin_showTimeline(){

        $posts = Post::latest()->get();
        return view('post.admin.timeline',['posts' => $posts],);
    }

     //お店毎のタイムライン画面を表示
    public function admin_show($admin_id){

        $posts =Post::where('admin_id',$admin_id)->latest()->get();
        return view('post.admin.show_timeline')->with('posts',$posts);
}



}

