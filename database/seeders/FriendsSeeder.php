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
        \App\Models\User::create([
            'username'        => 'prueba2',
            'name'            => 'riveros racero',
            'surname'         => 'fran',
            'email'           => 'fran@gmail.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'metamaskAddress' => 'fran',
            'avatar'          => 'none',
            'description'     => 'fran'
        ]);
    }
    // DB::table('friends')->insert([
    //     'name' => Str::random(10),
    //     'email' => Str::random(10).'@gmail.com',
    //     'password' => Hash::make('password'),
    // ]);
    
}
