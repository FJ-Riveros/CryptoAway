<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FriendsSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(TripsSeeder::class);
        $this->call(User_Has_TripsSeeder::class);
        $this->call(CommentsSeeder::class);
        //Votes
    }
}
