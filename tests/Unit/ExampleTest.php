<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\User;


class ExampleTest extends TestCase
{

    //Consideration: Try to always to get the User, Post from the DB and then operate on that object, whether we delete, update, create...

    const BASE_ROUTE = "http://localhost:8000/";

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);

    }


    //Posts Tests
    public function test_get_posts_from_user()
    {
        $response = Http::get(self::BASE_ROUTE  . 'user/1/posts');
        // $response = $response->object();
        $response = $response->object();
        $length = count($response) > 0 ? true : false;
        $this->assertTrue($length);
    }

    //Create Post 
    public function test_create_post()
    {
        
        $postBefore = Http::get(self::BASE_ROUTE . 'posts');
        $response = Http::post(self::BASE_ROUTE . 'posts/create_post');

        $this->assertTrue($response);

    }

    //Delete Post 
    public function test_delete_post()
    {

        $idPostToDelete = 1;
        $createPost = Http::post(self::BASE_ROUTE . 'posts/create_post');

        $newPost = new Post();

        //Look
        $newPost::find();

        $deletePost = Http::post(self::BASE_ROUTE . 'posts/delete_post/', [
            'idpost' => $idPostToDelete
        ]);
        
        $this->assertTrue($deletePost);

    }

    //Last Post from User 
    public function tet_last_post()
    {

        $idUser = 1;
        $user = new User();
        $user::find(1);

        $response = Http::get(self::BASE_ROUTE  . 'user/'. $idUser . '/last_post');

        $this->assertTrue($response);

    }


    //Get Post likes



    //Get the number of comments from a Post



}
