<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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


        \App\Models\Role::create([
            "id"   => 1,
            "name" => "admin",
        ]);
        \App\Models\Role::create([
            "id"   => 2,
            "name" => "user",
        ]);
        \App\Models\User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678'),
            "role_id" => 1,
        ]);



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

        \App\Models\Category::create([
            "id"   => 3,
            "name"=> "Postres",
            "img" => "postres.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 4,
            "name"=> "Bocatas",
            "img" => "bocatas.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 5,
            "name"=> "Complementos",
            "img" => "complementos.jpg",
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
            "name"=> "General",
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
        ]);


        \App\Models\Post::create([
            "title"=> "Post por defecto",
            "content"=> "Post por defecto",
            "img"=> "default.jpg",
            "status"=> 0,
            "tag_id"=> 2,
        ]);
        \App\Models\Post::create([
            "title"=> "Post por defecto2",
            "content"=> "Post por defecto",
            "img"=> "default.jpg",
            "status"=> 1,
            "tag_id"=> 3,
        ]);
        \App\Models\Post::create([
            "title"=> "Post por defecto3",
            "content"=> "Post por defecto",
            "img"=> "default.jpg",
            "status"=> 1,
            "tag_id"=> 4,
        ]);

        \App\Models\Restaurant::create([
            "name"=>"naked & sated",
            "description"=>"rico y barato",
            "url"=>"https://nakedandsated.com/",
            "img"=>"nakedandsated.jpg",
            "tag_id"=>3
        ]);

    }
}
