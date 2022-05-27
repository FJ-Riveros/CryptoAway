<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Likes;


class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imgPost',
        'textPost',
        
    ];


    public function post_user(){
        return $this->belongsTo(User::class , 'user_idUser');
    }

    public function post_likes_relation(){
        return $this->belongsToMany(User::class, 'likes', 'Post_idPost', 'user_idUser');
    }

}
