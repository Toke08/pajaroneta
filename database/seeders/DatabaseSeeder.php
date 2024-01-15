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

        \App\Models\Food::create([
            "name"=> "La maleducada",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "La Cubana",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "La Española",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "No Gluten",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "Cuasó",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "la funfuñosa",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "4kilos",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "La maleducada XXL",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "La perruna",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
        \App\Models\Food::create([
            "name"=> "pajaro loco",
            "price"   => 6,
            "img" => "default.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
        ]);
    }
}