<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Friends::create([
            'id_friend'       => '1',
            'id_user'         => '2',
            'actualRequest'   => '0',
        ]);

        \App\Models\Friends::create([
            'id_friend'       => '1',
            'id_user'         => '3',
            'actualRequest'   => '1',
        ]);
    }
}
