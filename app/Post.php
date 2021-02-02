<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;


class Post extends Model
{


    //可変項目(変わる項目)
    protected $fillable =
    [
        'admin_id',
        'text',
        'image',
        'name'
    ];



    //Postモデルからuserを唱えるとユーザーにアクセスできる
    public function user(){
        return $this->belongsTo(User::class);
    }
        //Postモデルからuserを唱えるとユーザーにアクセスできる
    public function admin(){
        return $this->belongsTo(Admin::class);
    }


}
