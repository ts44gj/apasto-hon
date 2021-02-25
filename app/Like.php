<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Post;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * query scope to judge the post is liked or not
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @param int $postId
     *
     * @return bool true | false
     */
    public function scopeExistsByUserIdAndPostId($query, int $userId, int $postId): bool
    {
        return $query
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->exists();
    }

    /**
     * query scope to judge the post is liked or not
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @param int $postId
     *
     * @return Like
     */
    public function scopeFindByUserIdAndPostId($query, int $userId, int $postId): Like
    {
        return $query
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->first();
    }

    // relation
    //Postモデルからuserを唱えるとユーザーにアクセスできる
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

        //Postモデルからuserを唱えるとユーザーにアクセスできる
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}

