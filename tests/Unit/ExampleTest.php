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


        //Used to include the timestamps in the querys
        ->withTimestamps()
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

    //Test that we can retrieve the posts from the user
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

        $newPostId = $newPost->id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->post(self::BASE_ROUTE . 'api/posts/delete_post', [
            'idPostDelete'    => $newPostId,
        ]);
        
        $deletedPost = Post::find($newPostId);

        $this->assertTrue(is_null($deletedPost));

    }

    //Last Post from User 
    public function test_last_post()
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/1/last_post');
        
        $jObj = $response->json();
        $length = count($jObj) > 0 ? true : false;
        $this->assertTrue($length);
    }


    //Get Post likes


    //Check if the user liked the given Post

    //userLikedActualPost


    //Get the number of comments from a Post


    /*  ------------------------------ /Posts Tests------------------------------ */



    /*  ------------------------------ User Tests------------------------------ */


    //Get User by id
    public function test_get_user_by_id()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/1');
        
        $jObj = $response->json();
        $length = $jObj != "" ? true : false;

        $this->assertTrue($length);
    }

    //Update User Test
    public function test_update_user()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->put(self::BASE_ROUTE . 'api/user/update');
        
        $jObj = $response->json();
        $length = $jObj != "" ? true : false;

        $this->assertTrue($length);
    }


    //Check if user exist (When adding a friend)
    //Need to compile

    public function test_get_user_by_username()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/by_username/try');
        
        $jObj = $response->json();
        $success = is_array($jObj) ? true : false;
        $this->assertTrue($success);
    }
    

    //Check if already a friend (When adding a friend)
    public function test_is_friend()
    {

        $currentUser = 1;
        $userToAdd = 2;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/is_friend/1/2');
        
        $jObj = $response->json();
        $this->assertTrue(is_int($jObj));
    }
    
    //Try to add friend
    //Create delete friend to reset the db for each test
    public function test_send_friend_request()
    {
        $currentUser = 3;
        $userToAdd = 4;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->post(self::BASE_ROUTE . 'api/user/send_friend_request', [
            'actualUser'  => $currentUser,
            'userToAdd'   => $userToAdd
        ]);
        
        $jObj = $response->json();

        $this->assertTrue(is_int($jObj));

        //Delete friend afterwards to reset the tests
    }

    //Get user friend requests
    public function test_get_friend_requests()
    {
        $currentUser = 2;
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/get_friend_requests/' . $currentUser);
        
        $jObj = $response->json();

        $this->assertTrue(is_array($jObj));
    }   

    //Get user friends
    public function test_get_friends()
    {
        $currentUser = 1;
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->get(self::BASE_ROUTE . 'api/user/get_friends/' . $currentUser);
        
        $jObj = $response->json();

        $this->assertTrue(count($jObj) > 0);
    }

    //Give like to a post
    public function test_like_post()
    {
        $testUser = 1;
        $testPost = 1;
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $GLOBALS['TEST_BEARER_TOKEN'],
        ])->post(self::BASE_ROUTE . 'api/user/like_post', [
            'userId'  => $testUser,
            'postId'   => $testPost
        ]);
        
        $jObj = $response->json();

        $this->assertTrue(is_array($jObj));
    }


    //User liked actual post?

    //Remove like from a post

    //Delete friend

    //Add new user

    //Suggest users to add

    /*  ------------------------------ /User Tests------------------------------ */

}
