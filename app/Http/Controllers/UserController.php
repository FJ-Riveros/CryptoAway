<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Friends;
use Illuminate\Support\Facades\Auth;


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
    public function update(Request $request)
    {
        $updateUser = User::find($request->idUser);

        //Only the user can modify is own information, not other users
        if( Auth::id() != $request->idUser) return ["msg" => "Access denied, only the same user can modify his own information."]; 

        $input = $request->all();
        $updateUser->username = $input['username'];
        $updateUser->name = $input['name'];
        $updateUser->email = $input['email'];
        $updateUser->avatar = $input['avatar'];
        $updateUser->description = $input['description'];

        $updateUser->save();

        $updateUser = User::find($request->idUser);
        
        return [
            "msg"  => "Post updated.",
            "post" => $updateUser
        ];
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

    //Get the posts from a specific user
    public function user_posts(Request $request){
        $user = User::find($request->idUser);
        return $user->user_posts_relation;
    }

    //Returns the actual user ID
    public function userId(Request $request){
        $user = Auth::user(); 
        $id = Auth::id(); 

        return $id;
    }

    //Returns the last post from the user
    public function last_post(Request $request){

        $user = User::find($request->idUser);
        
        $post = $user->user_posts_relation->last();
        return $post;
    }

    //Returns the user by ID
    public function get_user_by_id(Request $request){
        $user = User::find($request->idUser);
        return $user;
    }

    //Returns the user when the username is given
    public function get_user_by_username(Request $request){
        $username = $request->username;
        try
        {
            return User::firstOrFail()->where('username', $value); 
        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            return "User not found.";
        }
    }
     
    //Returns boolean declaring if the user is already a friend
    //Test, need to compile
    //The best way to approach this is adding the 2 users at the same time
    //when one of the two tries to send a friend request, but keeping the 
    //actualRequest at 1.
      public function get_is_already_friend(Request $request){
        try
        {
            $actualUserId = User::find($request->currentUserId);
            $userToAddId = User::find($requets->userToAddId);
            Friends::where([
                'id_user'     => $actualUserId->id,
                'id_friend'   => $userToAddId->id,
            ])->firstOrFail();
            return true;
        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            return false;
        }
    }


}
