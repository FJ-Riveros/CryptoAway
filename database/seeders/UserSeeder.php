<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username'        => 'try',
            'name'            => 'ruiz perez',
            'surname'         => 'juan',
            'email'           => 'juan@gmail.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'metamaskAddress' => 'juan',
            'avatar'          => 'none',
            'description'     => 'juan'
        ]);

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

        // User-DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password')
        // )];
    }
}
