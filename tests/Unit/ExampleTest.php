<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Http;


class ExampleTest extends TestCase
{

    //Consideration: Try to always to get the User, Post from the DB and then operate on that object, whether we delete, update, create...

    private String $base_route = "http://localhost:8000/";

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
    public function get_posts_from_user()
    {
        $response = Http::get($base_url . 'user/1/posts');

        $this->assertTrue(!is_null($response));
    }

    //Create Post 
    public function create_post()
    {
        $response = Http::post($base_url. 'posts/create_post');

        $this->assertTrue($response);

    }

    //Delete Post 
    public function delete_post()
    {

        $idPostToDelete = 1;
        $createPost = Http::post($base_url. 'posts/create_post');

        $newPost = new Post();

        //Look
        $newPost::find();

        $deletePost = Http::post($base_url. 'posts/delete_post/', [
            'idpost' => $idPostToDelete
        ]);
        
        $this->assertTrue($deletePost);

    }

    //Last Post from User 
    public function last_post()
    {

        $idUser = 1;
        $user = new User();
        $user::find(1);

        $response = Http::get($base_url . 'user/'. idUser . '/last_post');

        $this->assertTrue($response);

    }


    //Get Post likes



    //Get the number of comments from a Post



}
