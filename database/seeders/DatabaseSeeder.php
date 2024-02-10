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

        \App\Models\Role::create([
            "id"   => 1,
            "name" => "admin",
        ]);
        \App\Models\Role::create([
            "id"   => 2,
            "name" => "user",
        ]);

        //Usuarios, duh

        \App\Models\User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678'),
            "role_id" => 1,
        ]);

        \App\Models\User::create([
            "name" => "Rod",
            "email" => "r@gmail.com",
            "password" => Hash::make('12345678'),
            "role_id" => 2,
        ]);

        \App\Models\User::create([
            "name" => "Pau",
            "email" => "p@gmail.com",
            "password" => Hash::make('12345678'),
            "role_id" => 2,
        ]);

        \App\Models\User::create([
            "name" => "Trini",
            "email" => "t@gmail.com",
            "password" => Hash::make('12345678'),
            "role_id" => 2,
        ]);

        //Categorías comida

        \App\Models\Category::create([
            "id"   => 1,
            "name" => "Ver todo",
            "img" => "ver_todo.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 2,
            "name" => "Hamburguesas",
            "img" => "hamburguesas.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 3,
            "name"=> "Hot-Dogs",
            "img" => "hotdogs.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 4,
            "name"=> "Postres",
            "img" => "postres.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 5,
            "name"=> "Bocatas",
            "img" => "bocatas.jpg",
        ]);

        \App\Models\Category::create([
            "id"   => 6,
            "name"=> "Complementos",
            "img" => "complementos.jpg",
        ]);

        //Comidas

        \App\Models\Food::create([
            "name"=> "La maleducada pipi",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 1,
        ]);

        \App\Models\Food::create([
            "name"=> "La maleducada pi",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "La Cubana",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "La Española",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "No Gluten",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "Cuasó",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "la funfuñosa",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "4kilos",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "La maleducada XXL",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "La perruna",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "pajaro loco",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "pajaro loco2",
            "price"   => 6,
            "img" => "burger1.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "tartiña",
            "price"   => 6,
            "img" => "tartas.jpg",
            "description" => "la mejor hamburguesa del mundo ñam ñam",
            "category_id" => 4,
        ]);
        \App\Models\Food::create([
            "name"=> "tarta",
            "price"   => 6,
            "img" => "tartas.jpg",
            "description" => "la mejor tarta del mundo ñam ñam",
            "category_id" => 4,
        ]);
        \App\Models\Food::create([
            "name"=> "tartita",
            "price"   => 6,
            "img" => "tartas.jpg",
            "description" => "la mejor tarta del mundo ñam ñam",
            "category_id" => 4,
        ]);
        \App\Models\Food::create([
            "name"=> "tartota",
            "price"   => 6,
            "img" => "tartas.jpg",
            "description" => "la mejor tarta del mundo ñam ñam",
            "category_id" => 4,
        ]);

        //Categorías blog


        \App\Models\Tag::create([
            "name"=> "General",
        ]);

        \App\Models\Tag::create([
            "name"=> "Carne",
        ]);

        \App\Models\Tag::create([
            "name"=> "Vegetariano",
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

        \App\Models\Tag::create([
            "name"=> "Mariscos",
        ]);

        \App\Models\Tag::create([
            "name"=> "Comida chatarra",
        ]);

        //Posts

        \App\Models\Post::create([
            "title"=> "Comida sana para el día a día",
            "content"=> "Todos los días se come bien y sano. Un poco de verde para no terminar verde. Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.",
            "img"=> "post1.jpg",
            "status"=> "Published",
            "tag_id"=> 3,
        ]);
        \App\Models\Post::create([
            "title"=> "Somos lechosos",
            "content"=> "La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones. La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.La leche tiene muchos beneficios, pero la lactosa puede no ser tan buena para ciertas personas. Aquí te contamos acerca de otras opciones.",
            "img"=> "post2.jpg",
            "status"=> "Published",
            "tag_id"=> 5,
        ]);
        \App\Models\Post::create([
            "title"=> "La vida sin gluten",
            "content"=> "Los panes no saben igual sin gluten.",
            "img"=> "post3.jpg",
            "status"=> "Draft",
            "tag_id"=> 6,
        ]);

        \App\Models\Post::create([
            "title"=> "Cada día más sano",
            "content"=> "La gente que consume verduras, menos grasas saturadas y cositas verdes, tiende a tener un estilo de vida más saludable y enérgico.",
            "img"=> "post4.jpg",
            "status"=> "Published",
            "tag_id"=> 3,
        ]);

        \App\Models\Post::create([
            "title"=> "Paellas pa' ellas",
            "content"=> "Este 14 de Febrero, aprende como hacer una paella para tu amada.",
            "img"=> "post5.jpg",
            "status"=> "Published",
            "tag_id"=> 7,
        ]);

        \App\Models\Post::create([
            "title"=> "Delicias culinarias asiáticas",
            "content"=> "En el continente asiático podemos encontrar una inmensa gamma de platillos, que van desde lo más tradicional hasta lo más sofisticado.",
            "img"=> "post6.jpg",
            "status"=> "Published",
            "tag_id"=> 2,
        ]);

        \App\Models\Post::create([
            "title"=> "La comida chatarra está fea",
            "content"=> "Por más bien que pueda lucir una hamburguesa de doble queso, doble carne, bacon, etc, estudios revelan que el sistema digestivo puede sufrir un gran golpe al digerir tanto.",
            "img"=> "post7.jpg",
            "status"=> "Draft",
            "tag_id"=> 8,
        ]);

        //Restaurantes

        \App\Models\Restaurant::create([
            "name"=>"Naked & Sated",
            "description"=>"Rico y divertido.",
            "url_sitio"=>"https://nakedandsated.com/",
            "url_maps"=>"https://maps.app.goo.gl/G8bSNykUbCkggkN27",
            "img"=>"restaurant1.jpg",
            "tag_id"=>4
        ]);

        \App\Models\Restaurant::create([
            "name"=>"LA CAMELIA VEGAN BAR",
            "description"=>"Lo verde es ecofriendly.",
            "url_sitio"=>"https://www.bi-aste.com/articulo/que-ver-en-bilbao/5-mejores-restaurantes-vegetarianos-bilbao/20220606131418001603.html#strongla-camelia-vegan-bar-strong",
            "url_maps"=>"https://maps.app.goo.gl/Y5PjGb1Dsbm6t2pH8",
            "img"=>"restaurant2.jpg",
            "tag_id"=>3
        ]);

        \App\Models\Location::create([
            'province'=>'Vizcaya',
            'city'=> 'Bilbao',
            'address'=> 'Jardines 13',
            'cp' => '48004'
        ]);

        \App\Models\Event::create([
            'title'=>'Salida libre',
            'description'=> 'Ven a comer lo bueno para ti!',

        ]);

        // \App\Models\Event::create([
        //     'title'=>'Todayland',
        //     'description'=> 'Muy chido',
        //     'start'=> '2024-02-05',
        //     'end'=> '2024-02-06'
        // ]);
    }
}
