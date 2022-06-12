<?php

namespace App\Http\Controllers;

use App\Models\trips;
use Illuminate\Http\Request;

class TripsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trips');    
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
     * @param  \App\Models\trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function show(trips $trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function edit(trips $trips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trips $trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function destroy(trips $trips)
    {
        //
    }
}
