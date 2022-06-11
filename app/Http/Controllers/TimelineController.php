<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;


class TimelineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('timelineBody');
    }

    /**
     * Show the timeline from the selected user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function observeTimeline(Request $request)
    {
        
        return view('observeTimeline', ["userObserved" => User::find($request->userId)]);
    }
}
