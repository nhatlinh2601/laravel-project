<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(PostReviews::class);
    }

    public static function getPostsAtHome(){
        return self::orderBy('created_at', 'desc')->limit(8)->get();
    }

    public static function getPostPag($perPage){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->join('categories' , 'categories.id' , '=', 'posts.category_id')
        ->select('posts.*', 'users.name AS user_name', 'categories.name AS cate_name')
        ->paginate($perPage);

        return $posts;
    }

    public static function getPostRand(){
        $posts = DB::table('posts')
        ->select('posts.*')
        ->inRandomOrder()
        ->take(3)
        ->get();

        return $posts;
    }

    public static function getPostById($id_post){
        $post = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*',  'users.name AS user_name', 'users.image_path AS user_img')
            ->where('posts.id', '=', $id_post)
            ->first();
    
        return $post;
    }
    

    public static function getPostSameUser($id_user){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*',  'users.name AS user_name', 'users.image_path AS user_img')
        ->where('users.id', '=', $id_user)
        ->take(3)
        ->get();

        return $posts;
    }

    public static function getPostPopular($id_post){
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name AS user_name', 'users.image_path AS user_img')
            ->where('posts.id', '!=', $id_post) 
            ->inRandomOrder()
            ->take(3)
            ->get();
    
        return $posts;
    }

    public static function postByAjax(){
        $post = Post::select('title')->get();
        return $post;
    }

    public static function getPostByName($name){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name AS user_name', 'users.image_path AS user_img')
        ->where('posts.title', 'like', '%' . $name . '%')
        ->get();

        return $posts;
    }
    

}
