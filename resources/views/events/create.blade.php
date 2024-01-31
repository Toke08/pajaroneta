@extends('layout.masterpage')
@section('titulo')
Evento nuevo
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva evento</h1>

    <form action="{{route('eventos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="date">Fecha evento:</label>
        <input type="date" id="date" name="date" required>
        <br>
        <h2>¿Dónde se llevará a cabo el evento?</h2>

        <div>
            <select id="province" onchange="renderCiudades(allCities)">
              <option selected disabled>Selecciona una provincia</option>
            </select>

            <select id="city" disabled>
              <option selected disabled>Selecciona una ciudad</option>
            </select>

            <select id="cp" disabled>
              <option selected disabled>Selecciona el código postal</option>
            </select>

            <select id="address" disabled>
              <option selected disabled>Selecciona una dirección</option>
            </select>
        </div>
        <button type="submit">Crear Evento</button>
    </form>
@endsection

@section('script')
    <script>
        console.log("hola");
        const url = "../../public/json/ciudades.json";
        let allCities; // Declarar la variable allCities en el ámbito global
        const btnProv = document.getElementById("province");
        const btnCiu = document.getElementById("city");
        const btnCp= document.getElementById("cp");

        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                // Asignar el valor de data a allCities
                allCities = data;

                // Resto del código sigue igual
                const provinciasSet = new Set();
                const ciudadesSet = new Set();
                // const cpSet = new Set();

                data.forEach((ciudad) => {
                    provinciasSet.add(ciudad.Provincia);
                    ciudadesSet.add(ciudad.Municipio);
                    // cpSet.add(ciudad.CP);
                });

                while (btnProv.firstChild) {
                    btnProv.removeChild(btnProv.firstChild);
                }

                const defaultOptionProvincias = document.createElement("option");
                defaultOptionProvincias.text = "Selecciona una provincia";
                defaultOptionProvincias.disabled = true;
                defaultOptionProvincias.selected = true;
                btnProv.appendChild(defaultOptionProvincias);

                provinciasSet.forEach((provincia) => {
                    const option = document.createElement("option");
                    option.value = provincia;
                    option.text = provincia;
                    btnProv.appendChild(option);
                });
            });

        function renderCiudades() {
            const selectedProvincia = btnProv.value;

            const ciudades = allCities.filter((ciudad) => ciudad.Provincia === selectedProvincia);
            // const cps = ciudades.map((ciudad) => ciudad.CP);

            while (btnCiu.firstChild) {
                btnCiu.removeChild(btnCiu.firstChild);
            }

            const defaultOptionCiudades = document.createElement("option");
            defaultOptionCiudades.text = "Selecciona una ciudad";
            defaultOptionCiudades.disabled = true;
            defaultOptionCiudades.selected = true;
            btnCiu.appendChild(defaultOptionCiudades);

            const ciudadesSet = new Set();

            ciudades.forEach((ciudad) => {
                if (!ciudadesSet.has(ciudad.Municipio)) {
                    const option = document.createElement("option");
                    option.value = ciudad.Municipio;
                    option.text = `${ciudad.Municipio} - CP: ${ciudad.CP}`;
                    btnCiu.appendChild(option);
                    ciudadesSet.add(ciudad.Municipio);
                }
            });


            btnCiu.disabled = false;
        }

    </script>
@endsection
