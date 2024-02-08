@extends('layout.masterpage')

@section('estilos')

<style>
.landing_page {
    /* display:grid;
    align-items:center;
    justify-content:center; */

}
.part1 img{
    width:45em;
    position:absolute;
    top:30%;
    left: 15%;
}
.papa1 {
    transform:translate(0px, -330px);
}
.part2{
    display:grid;
    place-items:center;
}
.part2 img{
    width:45em;
}
.part3 img{
    width: 45em;
}
.who{
    display: flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    padding:0;
    margin:0;
    background-color:#730000;
    color:#fff;
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
            <img src="{{ asset('img/foods/papa_2.png') }}" alt="">
            <img class="papa1" src="{{ asset('img/foods/papas_1.png') }}" alt="">
        </div>
        <div class="part2">
            <img src="{{ asset('img/logo_pajar.png') }}" alt="">
            <p>Delicias para celiacos e intolerantes a través de toda España</p>
        </div>
        <div class="part3">
            <img src="{{ asset('img/foods/perro_caliente.png') }}" alt="">
        </div>
    </div>

    <div class="who">
        <img src="{{ asset('img/foods/burger_izq.png') }}" alt="">
        <div class="who_info">
            <h2>¿Quiénes somos?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <img src="{{ asset('img/foods/burger_der.png') }}" alt="">
    </div>



@endsection
