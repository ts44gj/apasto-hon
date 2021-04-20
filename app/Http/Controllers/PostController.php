<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Post;
use AWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

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

    public function store(Request $request)
    {

        if ($request->file('image')->isValid()) {

            $fileName = $request->file('image')->getClientOriginalName();
            //upload
            $request->file('image')->storeAs(Storage::disk('s3'), $fileName);

            $fullFilePath = Storage::disk('s3') . $fileName;

            $url = Storage::disk('s3')->url($fullFilePath);

            // 署名付きURLを取得
            $client = AWS::createClient('cloudfront');
            $signedUrl = $client->getSignedUrl([
                'url' => $url,
                'expires' => time() + 30, // 30秒間有効
                'private_key' => base_path('pk-hogefuga.pem'),
                'key_pair_id' => env('AWS_CLOUDFRONT_KEY_PAIR_ID'),
            ]);
            dd($signedUrl);

            $text = $request->input('text');

            Post::create([
                'admin_id' => \Auth::user()->id,
                'name' => \Auth::user()->name,
                'image' => $fullFilePath,
                'text' => $text,

            ]);

        }
        return redirect(route('admin_Timeline'));
    }
    //投稿削除
    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('admin_Timeline'));
    }

    //投稿編集画面
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.admin.detail', ['post' => $post]);
    }
    //投稿編集実行
    public function update(Request $request, $id)
    {
        $save = [
            'admin_id' => \Auth::user()->id,
            'name' => \Auth::user()->name,
            'text' => $request->text,
        ];
        Post::where('id', $id)->update($save);

        return redirect(route('admin_Timeline'));
    }

    //タイムライン画面を表示
    public function admin_showTimeline()
    {

        $posts = Post::latest()->get();
        return view('admin.home', ['posts' => $posts], );
    }

    //お店毎のタイムライン画面を表示
    public function admin_show($admin_id)
    {

        $posts = Post::where('admin_id', $admin_id)->latest()->get();
        return view('post.admin.show_timeline')->with('posts', $posts);
    }

}
