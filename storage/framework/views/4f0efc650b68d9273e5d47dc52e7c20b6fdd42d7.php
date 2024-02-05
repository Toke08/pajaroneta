



<?php $__env->startSection('titulo'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style></style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Calendario</h1>
<div id="calendario"></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#event">
    Añadir evento
    </button>

    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea un nuevo evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">

                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="title">Nombre del evento</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId">
                    
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea  class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="start">Start</label>
                    <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId">
                    
                </div>
                <div class="form-group">
                    <label for="end">End</label>
                    <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId">
                    
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_save">Guardar</button>
            <button type="button" class="btn btn-warning"  id="btn_modify">Editar</button>
            <button type="button" class="btn btn-danger" id="btn_delete">Eliminar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        // recoge los datos del from jquery
        let formulario=document.querySelector("form");

        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',


        locale:"es", //idioma español

        events:"http://localhost/pajaroneta/public/eventos/mostrar",

        dateClick:function(info){   //la info recoge el día que haces click
            $("#event").modal("show"); //al hacer click en la fecha que salga el modal evento jjejjej
        }

    });
      calendar.render();

      //capturo la accion del btn guadar
      document.getElementById("btn_save").addEventListener('click', function(){
            //recupero la info del form
            const datos= new FormData(formulario);
            console.log(datos);
            console.log(formulario.title.value);
            console.log(formulario.description.value);

            axios.post("http://localhost/pajaroneta/public/eventos/agregar", datos)
            .then(
                (respuesta)=>{
                $("#event").modal("hide");
            }
            )
            .catch((error) => {
            console.error('Error en la solicitud:', error);

        if (error.response) {
            console.error('Respuesta del servidor:', error.response.data);
            // Muestra mensajes de error al usuario si es necesario
        } else if (error.request) {
            console.error('No se recibió respuesta del servidor');
        } else {
            console.error('Error durante la solicitud:', error.message);
        }
    });

      });


    });

  </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/events/index.blade.php ENDPATH**/ ?>