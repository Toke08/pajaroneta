@extends('layout.masterpage')

@section('estilos')

<style>
.landing_page {
    /* display:flex;
    flex-direction:row;*/
    place-items:center;
    justify-content:center;
    display: grid;
    grid-gap:5rem;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Puedes ajustar el ancho según tus necesidades */
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}
.part1 img{
    width:45em;
    position: relative;
    margin-left: 20%
}
.papa1 {
    transform:translate(0px, -200px);
}
.papa2 {
    transform:translate(0px, -10px);
}
.part2{
    display:grid;
    place-items:center;
}
.part2 p{
    font-size: 1.5em;
    align-items: center;
}
.part2 img{
    width:45em;
}
.part3 img{
    width: 45em;
    position: relative;
    margin: 0%;
    padding: 0%;
}
.who{
    display: flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    background-color: #730000;
    color: #ffffff;
    background-position: center;

}
.who_info{
    display: flex;
    flex-direction:column;
}
.who img{
    width:35em;
    height: 25em;
}
/* estilo mapa */

#mapilla iframe{
    width: 100%;
}

/* estilos restaurantes */
.restaurantes{
    width: 500px;
    padding: 10px;
    max-width: 500px;
}
.restaurantes img{
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#restaurant, .publis, #comidas, #mapilla{
    margin-top: 10%;
}
.restaurants a{
    color: #000000;
    text-decoration: none;
}
#div-restaurantes{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}
/* estilos post */
#posts{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}

#posts img{
    max-width: 90%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#posts img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}
#posts button{
    background-color: #E5A200;
    color: #ffffff;
    border: none;
    border-radius: 1.5em;
    width: 30%;
    padding: 2%;
    transition: 0.3s ease-in-out;
}
#posts button:hover{
    background-color: #CA8F00;
    transition: box-shadow 0.3s ease-in-out;
}
#posts button a{
    text-decoration: none;
    color: #ffffff;
}
#posts button:active{
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none;
}

/* estilos comida */
#comidita{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}

#comidita img{
    max-width: 90%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#comidita img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}


</style>

@endsection


@section('contenido')

    <div class="landing_page">
        <div class="part1">
            <img class="papa2" src="{{ asset('img/landing_page/papa_2.png') }}" alt="">
            <img class="papa1" src="{{ asset('img/landing_page/papas_1.png') }}" alt="">
        </div>
        <div class="part2">
            <img src="{{ asset('img/landing_page/logo_pajar.png') }}" alt="">
            <p>Delicias para celiacos e intolerantes a través de toda España</p>
        </div>
        <div class="part3">
            <img src="{{ asset('img/landing_page/perro_caliente.png') }}" alt="">
        </div>
    </div>

    <div class="who">
        <img src="{{ asset('img/landing_page/burger_izq.png') }}" alt="">
        <div class="who_info">
            <h2>¿Quiénes somos?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <img src="{{ asset('img/landing_page/burger_der.png') }}" alt="">
    </div>
    <div id="mapilla">
        <div>
            <h2>Encuentrános</h2>
            <img src="" alt="">
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.5165004228597!2d-2.9419887246831182!3d43.26155407767463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e502842c84087%3A0x539b319a98f8cfbe!2sC.%20del%20Lic.%20Poza%2C%2031%2C%20Abando%2C%2048011%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1707666740981!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="comidas">
        <h2>¡Nuestra menú!</h2>
        <p>Ven a comer con nosotros</p>
        <div id="comidita">
            @foreach ($foods->take(3) as $food)
                <div class="com">
                    <a href="galeria-comidas/{{ $food->name }}"><img src="{{asset('img/foods')}}/{{ $food->img }}"><img></a>
                    <br>
                    <h3>{{ $food->name }}</h3>
                    <p>{{$food->description}}</p>
                </div>
            @endforeach
        </div>

    </div>

    <div class="publis">
        <h2>Opiniones y más</h2>
        <p>Te invitamos a leer nuestro blog :)</p>
        <div id="posts">
            @foreach ($posts->take(2) as $post)
                <div class="post">
                    <a href="blog/{{ $post->id }}"><img src="{{asset('img/posts')}}/{{ $post->img }}"><img></a>
                    <br>
                    <h3>{{ $post->title }}</h3>
                    <button> <a href="blog/{{ $post->id }}">Leer más</a></button>
                </div>
            @endforeach
        </div>
    </div>



    <div id="restaurant"></div>
        <h2>Por si estamos lejos de ti...</h2>
        <p>¡Encuentra restaurantes con opciones saludables cerca de ti!</p>
        <div id="div-restaurantes">
            @foreach ($restaurants as $restaurant)
            <div class="restaurantes">
                <a href="{{ $restaurant->url_sitio }}" target="blank">
                    <h3>{{ $restaurant->name }}</h3>

                    <p>{{ $restaurant->description }}</p>

                    <br>
                    <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                </a>
                <a href="{{ $restaurant->url_maps }}" target="blank">Encuéntralos aquí</a>
            </div>
            @endforeach
        </div>
    </div>



@endsection
