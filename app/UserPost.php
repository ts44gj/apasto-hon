<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;

class UserPost extends Model
{


    //可変項目(変わる項目)
    protected $fillable =
    [
        'user_id',
        'text',
        'image',
        'name'
    ];


    //UserPostモデルからuserを唱えるとユーザーにアクセスできる
    public function user(){
        return $this->belongsTo(User::class);
    }
}
