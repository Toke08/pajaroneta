@extends('layout.masterpage')

@section('estilos')

<style>
.landing_page {
    /* display:flex;
    flex-direction:row;*/
    width: 2000px
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

    </div>

    <div id="comidas">

    </div>


    <div id="blogges">

    </div>



            @foreach ($restaurants as $restaurant)
            <div class="restaurants">
                <h3><a href="{{ $restaurant->url_sitio }}" target="blank">{{ $restaurant->name }}</a></h3>

                <p>{{ $restaurant->description }}</p>

                <br>
                <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                <a href="{{ $restaurant->url_maps }}" target="blank">Encuéntralos aquí</a>
            </div>
            @endforeach



@endsection
