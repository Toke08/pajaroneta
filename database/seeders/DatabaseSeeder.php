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

        //HAMBURGESAS

        \App\Models\Food::create([
            "name"=> "Pajaroneta caliente",
            "price"   => 6,
            "img" => "hot-dog2.jpg",
            "description" => "Perrito caliente super rico y sano",
            "category_id" => 3,
        ]);
        \App\Models\Food::create([
            "name"=> "Ensalada",
            "price"   => 6,
            "img" => "ensalada.jpg",
            "description" => "Si quieres algo ligero, esto es para ti",
            "category_id" => 6,
        ]);
        \App\Models\Food::create([
            "name"=> "Tiramisú",
            "price"   => 5,
            "img" => "tiramisu.jpg",
            "description" => "¡Delicioso tiramisú perfecto para todos!",
            "category_id" => 4,
        ]);
        \App\Models\Food::create([
            "name"=> "Bocatti",
            "price"   => 6,
            "img" => "bocati.jpg",
            "description" => "Bocata super sano y rico",
            "category_id" => 5,
        ]);
        \App\Models\Food::create([
            "name"=> "Vegan burger",
            "price"   => 6,
            "img" => "burger4.jpg",
            "description" => "Jugosa hamburguesa vegana, perfecta para todos",
            "category_id" => 2,
            "views"=> 2045,
        ]);
        \App\Models\Food::create([
            "name"=> "Sin gluten-burger",
            "price"   => 6,
            "img" => "burger2.jpg",
            "description" => "Deliciosa y sana",
            "category_id" => 2,
        ]);
        \App\Models\Food::create([
            "name"=> "Pajaro-Burger",
            "price"   => 6,
            "img" => "burger3.jpg",
            "description" => "La especial de la casa",
            "category_id" => 2,
        ]);
        //COMPLEMENTOS
        \App\Models\Food::create([
            "name"=> "Patatas al horno",
            "price"   => 6,
            "img" => "papas.jpg",
            "description" => "Deliciosas patatas al horno",
            "category_id" => 6,
        ]);

        //HOT DOGS
        \App\Models\Food::create([
            "name"=> "Perrito caliente",
            "price"   => 6,
            "img" => "hot-dog1.jpg",
            "description" => "Perrito caliente super rico",
            "category_id" => 3,
        ]);


        //BOCATAS
        \App\Models\Food::create([
            "name"=> "Bocata vegetal",
            "price"   => 6,
            "img" => "vegetal.jpg",
            "description" => "Bocata super sano y rico",
            "category_id" => 5,
        ]);

        // POSTRES
        \App\Models\Food::create([
            "name"=> "Chocotarta vegana",
            "price"   => 5,
            "img" => "chocotarta.jpg",
            "description" => "Deliciosa tarta vegana de chocolate negro",
            "category_id" => 4,
        ]);

        \App\Models\Food::create([
            "name"=> "Tarta de queso",
            "price"   => 5,
            "img" => "tartaqueso.jpg",
            "description" => "Apta para todos los paladares",
            "category_id" => 4,
        ]);
        \App\Models\Food::create([
            "name"=> "Brownie helado",
            "price"   => 5,
            "img" => "brownie.jpg",
            "description" => "Este brownie te pedirá repetir",
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
            "title"=> "Comida sana para tu día",
            "content"=> "Todos los días se come bien y sano. Un poco de verde para no terminar verde. Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.Todos los días se come bien y sano. Un poco de verde para no terminar verde.",
            "img"=> "post1.jpg",
            "status"=> "Published",
            "tag_id"=> 3,
            "views"=> 3392,
        ]);
        \App\Models\Post::create([
            "title"=> "Somos bien lácteos",
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

        //
        /**/
        \App\Models\Location::create([

            'province'=>'Vizcaya',
            'city'=> 'Bilbao',
            'address'=> 'Jardines 13',
            'url'=> 'https://maps.app.goo.gl/V8Y61jAg3XPxXYED7',
            'cp' => '48004'
        ]);
        \App\Models\Location::create([
            'province'=>'Vizcaya',
            'city'=> 'Barakaldo',
            'address'=> 'Alameda Urquijo 30',
            'url'=> 'https://maps.app.goo.gl/V8Y61jAg3XPxXYED7',
            'cp' => '48008'
        ]);

        \App\Models\Event::create([
            'title'=>'Salida libre',
            'description'=>'A comer bien',
            'start'=>'2022-02-15',
            'end'=>'2022-02-15',
            'id_location'=>'1',
        ]);

        \App\Models\Event::create([
            'title'=>'BBK LIVE',
            'description'=>'A comer con musica',
            'start'=>'2022-02-16',
            'end'=>'2022-02-16',
            'id_location'=>'2',
        ]);
        \App\Models\Event::create([
            'title'=>'Tomorrowland',
            'description'=>'A comer con musica en ingles',
            'start'=>'2022-02-05',
            'end'=>'2022-02-05',
            'id_location'=>'2',
        ]);
        \App\Models\Event::create([
            'title'=>'Festival Electro',
            'description'=>'A comer con musica en ingles electrónica',
            'start'=>'2022-02-22',
            'end'=>'2022-02-22',
            'id_location'=>'2',
        ]);
        \App\Models\Event::create([
            'title'=>'Rap Fest',
            'description'=>'A comer rapeando',
            'start'=>'2022-02-26',
            'end'=>'2022-02-26',
            'id_location'=>'2',
        ]);
        /*
        \App\Models\Calendar::create([
            'start'=>'2024-02-17',
            'end'=> '2024-02-17',
            'location_id' => '2',
            'event_id' => '2',
        ]);
        \App\Models\Calendar::create([
            'start'=>'2024-02-24',
            'end'=> '2024-02-28',
            'location_id' => '1',
            'event_id' => '1',
        ]);
        */
    }
}

