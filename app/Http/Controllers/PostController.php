<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
 

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function create_post(Request $request){
        $newPost = new Post();
        // echo route('getUserId');
        // return route('getUserId');
        // $response = Http::get(route('getUserId'));
        // $response = Http::get(route('allPosts'));
        // $response = Http::get("http://localhost:8000/api/posts");

        // return $response->body();
        $response = Http::post("http://localhost:8000/login", [
            'email' => 'juan@gmail.com',
            'password' => '123',
        ]);

        //$user = Auth::user(); // Retrieve the currently authenticated user...
        //$id = Auth::id(); // Retrieve the currently authenticated user's ID...

        // return $id;
        // return "hola";

        // return $request->all();


    }

    public function userId(Request $request){
        

        $user = Auth::user(); // Retrieve the currently authenticated user...
        $id = Auth::id(); // Retrieve the currently authenticated user's ID...

        

        return $id;


    }

}
