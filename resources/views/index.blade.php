@extends('layout.masterpage')

@section('estilos')

<style>
.landing_page {
    display:flex;
    flex-direction:row;

}
.part1 img{
    width:45em;
    display: flex;
    justify-content:left;
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
    width: 35em;
    transform:translate(0px, 60px);
    transform:rotate(-30deg);
    display: flex;
    justify-content:right
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
            <img src="{{ asset('img/foods/hawtdawg.png') }}" alt="">
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
    <div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#730000" fill-opacity="1" d="M0,128L80,149.3C160,171,320,213,480,218.7C640,224,800,192,960,186.7C1120,181,1280,203,1360,213.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    </div>


@endsection
