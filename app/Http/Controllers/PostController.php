<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

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


        public function output(){
        $user_id = Auth::id();
        $user_images = Image::whereUser_id($user_id)->get();
        return view('post.admin.output', ['user_images' => $user_images]);

        }
               //タイムライン画面を表示
    public function showTimeline(){
        $posts=Post::all();
        $names=Admin::all();
        return view('post.admin.timeline',['posts' => $posts],['name'=>$names]);
    }


    public function show($id){

        //$id=Admin::all();
        //$admin = Admin::get();
        //$admins = Admin::where('id', $id)->first();
        $posts=Admin::where('id')->get();
        return view('post.admin.show_timeline.',['posts'=>$posts],);
    }



}

