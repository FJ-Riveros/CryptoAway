<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Likes;
use App\Models\Comments;
use Spatie\Permission\Traits\HasRoles;



class User extends Model implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable, Authenticatable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'avatar',
        'description',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public function getFullName()
	{
		return $this->surname . ' ' . $this->name;
	}

	public function friends()
	{
		return $this->belongsToMany(User::class, 'friends', 'id_user', 'id_friend');
	}

	public function addFriend(User $user)
	{
		$this->friends()->attach($user->id);
	}

	public function removeFriend(User $user)
	{
		$this->friends()->detach($user->id);
	}

    public function user_posts_relation(){
        return $this->hasMany(Post::class, 'user_idUser');
    }


    public function user_comment_relation(){
        return $this->belongsToMany(Post::class, 'comments', 'user_idUser', 'Post_idPost')->withTimestamps();
    }

    public function createComment(Post $post, string $text){
        $this->user_comment_relation()->attach($post->id, ['Text' => $text]);        
    }

    //Remove the like from a post
    public function removeComment(Post $post){
        $this->user_comment_relation()->detach($post->id);        
    }

    public function user_likes_relation(){
        return $this->belongsToMany(Post::class, 'likes', 'user_idUser', 'Post_idPost')->withTimestamps();
    }

    //Get the post id and attach it to the user to create the like
    public function createLike(Post $post){
        $this->user_likes_relation()->attach($post->id);        
    }
    
    //Remove the like from a post
    public function removeLike(Post $post){
        $this->user_likes_relation()->detach($post->id);        
    }

}
