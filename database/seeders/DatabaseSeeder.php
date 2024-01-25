<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        \App\Models\Category::create([
            "id"   => 1,
            "name" => "Hamburguesas",
            "img" => "hamburguesas.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 2,
            "name"=> "Hot-Dogs",
            "img" => "hotdogs.jpg",
        ]);

        \App\Models\Food::create([
            "name"=> "La maleducada pipi",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);

        \App\Models\Food::create([
            "name"=> "La maleducada pi",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "La Cubana",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "La Española",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "No Gluten",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "Cuasó",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "la funfuñosa",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "4kilos",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "La maleducada XXL",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "La perruna",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "pajaro loco",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);
        \App\Models\Food::create([
            "name"=> "pajaro loco2",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);



        \App\Models\Tag::create([
            "name"=> "Carne",
        ]);

        \App\Models\Tag::create([
            "name"=> "Pescado",
        ]);

        \App\Models\Tag::create([
            "name"=> "Pollo",
        ]);

        \App\Models\Tag::create([
            "name"=> "Lactosa",
        ]);

        \App\Models\Tag::create([
            "name"=> "Sin gluten",

    }
}
