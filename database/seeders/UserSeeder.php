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
            'username'        => 'tundra',
            'name'            => 'Mac',
            'surname'         => 'Carson',
            'email'           => 'franciscojavier.riveros.alu@iescampanillas.com',
            'points'          => 0,
            'password'        => bcrypt('123'),
            'avatar'          => 'https://cdn.pixabay.com/photo/2018/11/29/21/19/hamburg-3846525_960_720.jpg',
            'description'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem et nisi soluta quia, corrupti facere dolorum minus fugit, iusto quaerat ducimus, corporis itaque incidunt. Officiis magnam quasi eaque doloribus architecto?",
        ])->assignRole('admin');

        \App\Models\User::create([
            'username'        => 'gloomy',
            'name'            => 'Chaney',
            'surname'         => 'Nell',
            'email'           => 'nell@gmail.com',
            'password'        => bcrypt('123'),
            'avatar'          => 'https://cdn.pixabay.com/photo/2018/04/27/08/55/water-3354062_960_720.jpg',
            'description'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sequi dolore, saepe sint dolorem sit, officia eligendi perferendis corrupti sapiente eos culpa a, veritatis tempore possimus temporibus! Nesciunt, maxime officiis?",
        ]);

        \App\Models\User::create([
            'username'        => 'paver',
            'name'            => 'Huynh',
            'surname'         => 'Miah',
            'email'           => 'miah@gmail.com',
            'password'        => bcrypt('123'),
            'avatar'          => 'https://cdn.pixabay.com/photo/2016/11/21/17/44/arches-national-park-1846759_960_720.jpg',
            'description'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nihil ut itaque nesciunt necessitatibus deleniti quam error quisquam commodi quidem? Ea, omnis. Possimus, eos! Magni tempora sapiente rerum dicta quidem?",
        ]);

        \App\Models\User::create([
            'username'        => 'melodic',
            'name'            => 'Shalter',
            'surname'         => 'Aled',
            'email'           => 'aled@gmail.com',
            'password'        => bcrypt('123'),
            'avatar'          => 'https://cdn.pixabay.com/photo/2018/05/04/12/21/man-3373868_960_720.jpg',
            'description'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Id totam accusantium amet officiis dignissimos aliquam mollitia dicta nam laboriosam nostrum sed, corporis illo quia, voluptatum neque blanditiis, voluptates optio. Laborum.",
        ]);
    }
}
