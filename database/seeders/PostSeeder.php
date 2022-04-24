<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::create([
            'imgPost'         => 'https://pixabay.com/es/photos/gaviotas-aves-volador-alas-vuelo-6841129/',
            'textPost'        => 'This is a test',
            'user_idUser'     => '1', 
        ]);
    }
}
