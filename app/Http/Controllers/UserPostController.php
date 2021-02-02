<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\UserPost;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{



    public function __construct()
    {
       $this->middleware('auth:user');
    }


 //text 作成画面を表示
    public function user_create()
    {
        return view('post.user.create', [
        ]);}

    public function user_store(Request $request){

        if($request->file('image')->isValid()){
            $fileName=$request->file('image')->getClientOriginalName();
            //upload
            $request->file('image')->storeAs('public/images',$fileName);

            $fullFilePath = '/storage/images/'.$fileName;
            $text = $request ->input('text');

            UserPost::create([
                'user_id' => \Auth::user()->id,
                'image'=>$fullFilePath,
                'text'=> $text
            ]);
        }
        return redirect(route('user.home.index'));
    }


        public function output(){
        $user_id = Auth::id();
        $user_images = Image::whereUser_id($user_id)->get();
        return view('post.user.output', ['user_images' => $user_images]);

        }
               //タイムライン画面を表示
    public function showTimeline(){
        $posts=UserPost::all();
        $names=User::all();
        return view('post.user.timeline',['posts' => $posts],['name'=>$names]);
    }


    public function show($id){

        $id=Admin::all();
        $admin = Admin::get();
        $admins = Admin::where('id', $id)->first();
        $posts=User::select('id')->get();
        return view('post.user.show_timeline.',['posts'=>$posts],);
    }



}

