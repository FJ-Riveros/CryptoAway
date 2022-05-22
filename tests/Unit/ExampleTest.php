<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use function PHPUnit\Framework\isEmpty;

class ExampleTest extends TestCase
{

    //Consideration: Try to always to get the User, Post from the DB and then operate on that object, whether we delete, update, create...

    /* 
        Use to debug the output

        var_dump($jObj);
        ob_flush();

    */
    const BASE_ROUTE = "http://localhost:8000/";

    protected function setUp() :void
    {
        parent::setUp();

        $login = Http::post(self::BASE_ROUTE . 'api/login', [
            'email'    => 'juan@gmail.com',
            'password' => '123'
        ]);

        $bearer_token = $login->json()["data"]["token"];
        $GLOBALS['TEST_BEARER_TOKEN'] = $bearer_token;   
    }

    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);

    }


    /*  ------------------------------Posts Tests------------------------------ */

    //Test that we can retrieve the tests from the user
    public function test_get_posts_from_user()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/1/posts');
        

        $jObj = $response->json();
        $length = count($jObj) > 0 ? true : false;
        $this->assertTrue($length);
    }

    //Create Post 
    public function test_create_post()
    {        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->post(self::BASE_ROUTE . 'api/posts/create_post', [
            'imgPost'    => 'https://pixabay.com/es/photos/gaviotas-aves-volador-alas-vuelo-6841129/',
            'textPost'   => 'This is a test post'
        ]);

        $this->assertTrue($response->getStatusCode() == 200);        
    }

    //Delete Post 
    public function test_delete_post()
    {

        //Get the latest post
        $newPost = Post::all()->last();

        
        var_dump($newPost);
        ob_flush();
        // //Look
        // $newPost::find();

        // $deletePost = Http::post(self::BASE_ROUTE . 'posts/delete_post/', [
        //     'idpost' => $idPostToDelete
        // ]);
        
        // $this->assertTrue($deletePost);

    }

    //Last Post from User 
    // public function tet_last_post()
    // {

    //     $idUser = 1;
    //     $user = new User();
    //     $user::find(1);

    //     $response = Http::get(self::BASE_ROUTE  . 'user/'. $idUser . '/last_post');

    //     $this->assertTrue($response);

    // }


    //Get Post likes



    //Get the number of comments from a Post



}
