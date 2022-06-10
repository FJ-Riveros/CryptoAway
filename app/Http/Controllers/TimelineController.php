<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function observeTimeline()
    {
        
        return view('observeTimeline');
    }


}
