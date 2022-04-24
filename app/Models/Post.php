<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    // public function getPostData()
	// {
	// 	return $this->surname . ' ' . $this->name;
	// }

	// public function friends()
	// {
	// 	return $this->belongsToMany(User::class, 'friends', 'id_user', 'id_friend');
	// }
}
