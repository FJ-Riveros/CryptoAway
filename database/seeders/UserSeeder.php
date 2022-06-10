<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'description'     => 'juan',
        ])->assignRole('Admin');

        \App\Models\User::create([
            'username'        => 'prueba2',
            'name'            => 'riveros racero',
            'surname'         => 'fran',
            'email'           => 'fran@gmail.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'metamaskAddress' => 'fran',
            'avatar'          => 'none',
            'description'     => 'fran',
        ]);

        \App\Models\User::create([
            'username'        => 'prueba2',
            'name'            => 'luke',
            'surname'         => 'luk',
            'email'           => 'test2@gmail.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'metamaskAddress' => 'tes2',
            'avatar'          => 'none',
            'description'     => 'test2',
        ]);

        \App\Models\User::create([
            'username'        => 'prueba3',
            'name'            => 'caitlyn',
            'surname'         => 'cait',
            'email'           => 'test3@gmail.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'metamaskAddress' => 'cait',
            'avatar'          => 'none',
            'description'     => 'cait',
        ]);
    }
}
