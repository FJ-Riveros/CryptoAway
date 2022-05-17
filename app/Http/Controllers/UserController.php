<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\user_has_trips  $user_has_trips
     * @return \Illuminate\Http\Response
     */
    public function show(user_has_trips $user_has_trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_has_trips  $user_has_trips
     * @return \Illuminate\Http\Response
     */
    public function edit(user_has_trips $user_has_trips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_has_trips  $user_has_trips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_has_trips $user_has_trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_has_trips  $user_has_trips
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_has_trips $user_has_trips)
    {
        //
    }

    public function userPosts(Request $request){
        // return User::getUserPosts($idUser);
        return Post::where('user_idUser','=', $request->idUser)->get();
    }


}
