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
            'itinerary'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis et maiores modi reiciendis, libero quaerat magni eos porro pariatur placeat eligendi hic. Asperiores quae debitis fugiat, aliquid optio mollitia sunt?
            Fugiat labore quidem molestiae eum placeat nulla expedita earum aut iusto repudiandae, error dolor, modi quaerat natus soluta quod deserunt vitae fugit tempora ea consectetur. Temporibus cum voluptate veritatis nobis?',
            'price'           => 80,
            'maxGroup'        => '8',
            'startDate'       => '2022/08/13', 
            'endDate'         => '2022/08/24', 
            'img'             => 'https://cdn.pixabay.com/photo/2016/11/14/02/51/rice-plantation-1822444__340.jpg', 
            'destination'     => 'Indonesia', 
        ]);

        \App\Models\Trips::create([
            'itinerary'        => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, reprehenderit architecto incidunt eius nihil hic! Laborum doloribus ratione quaerat nemo sed doloremque nulla eligendi molestiae quibusdam quia. Necessitatibus, voluptatum commodi.
            Eos incidunt et amet reprehenderit dolor, hic magnam, repellat ab assumenda eveniet explicabo commodi odit quibusdam deleniti provident modi cum dolorum quidem, voluptate voluptatem est temporibus. Tenetur eaque quae error!',
            'price'           => '120',
            'maxGroup'        => '12',
            'startDate'       => '2022/09/10', 
            'endDate'         => '2022/09/16', 
            'img'             => 'https://cdn.pixabay.com/photo/2015/11/05/23/02/chichen-itza-1025099_960_720.jpg', 
            'destination'     => 'Mexico', 
        ]);

        \App\Models\Trips::create([
            'itinerary'        => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores veritatis vitae aut id dolorem, quidem cumque ut mollitia aliquam odit illum porro unde voluptatem cum! Accusamus architecto repellat ullam alias?
            Enim unde officia perspiciatis ea, qui tenetur soluta veniam repudiandae excepturi eius voluptas eveniet, laboriosam pariatur natus aut quod! Aut accusantium consequatur et unde quod aliquid doloremque dolor iusto nemo?',
            'price'           => '100',
            'maxGroup'        => '6',
            'startDate'       => '2022/08/5', 
            'endDate'         => '2022/08/10', 
            'img'             => 'https://cdn.pixabay.com/photo/2014/10/26/15/03/garden-by-the-bay-503897_960_720.jpg', 
            'destination'     => 'Singapur', 
        ]);

        \App\Models\Trips::create([
            'itinerary'        => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores veritatis vitae aut id dolorem, quidem cumque ut mollitia aliquam odit illum porro unde voluptatem cum! Accusamus architecto repellat ullam alias?
            Enim unde officia perspiciatis ea, qui tenetur soluta veniam repudiandae excepturi eius voluptas eveniet, laboriosam pariatur natus aut quod! Aut accusantium consequatur et unde quod aliquid doloremque dolor iusto nemo?',
            'price'           => '100',
            'maxGroup'        => '18',
            'startDate'       => '2022/10/1', 
            'endDate'         => '2022/10/7', 
            'img'             => 'https://cdn.pixabay.com/photo/2018/04/25/09/26/eiffel-tower-3349075_960_720.jpg', 
            'destination'     => 'Paris', 
        ]);

    }
}
