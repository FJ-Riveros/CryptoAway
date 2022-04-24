<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Trips::create([
            'itinerary'        => 'Lorem Ipsum',
            'price'           => '2804',
            'maxGroup'        => '8',
            'startDate'       => '2022/08/25', 
            'endDate'         => '2022/08/28', 
            'img'             => 'https://cdn.pixabay.com/photo/2016/11/08/05/15/water-buffalo-1807517_960_720.jpg', 
            'maxGroup'        => '8', 
            'destination'     => 'Indonesia', 
        ]);
    }
}
