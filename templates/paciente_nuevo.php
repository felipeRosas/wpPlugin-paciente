<?php

 
    //al agregar nuevo paciente
    if(isset($_POST['nuevoPaciente'])){
        $functions->guardar_paciente($_POST);
    }
  
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mt-3">
            <h1>Agregar Paciente</h1>
            <form action=" <?php the_permalink(); ?>" method="post" class="form-group mt-3">
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control col-10 col-md-10" autocomplete="off" required>
                    <input type="hidden" value="nuevoPaciente" name="nuevoPaciente">
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control col-10 col-md-10" autocomplete="off" required>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Sexo</label>
                    <div class="col-10">
                        <input type="radio" name="sexo" value="femenino" checked class="form-control"> Femenino
                        <input type="radio" name="sexo" value="masculino"  class="form-control"> Masculino
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Rut</label>
                    <input type="text" name="rut" id="rut" class="form-control col-10 col-md-10" autocomplete="off" required >
                    <div class="alert alert-danger col-10 col-md-10 offset-md-2  mt-2" id="alertRut" role="alert" style="display:none;">
                        Rut no valido
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control col-10 col-md-10" autocomplete="off" required>
                    <div class="alert alert-danger col-10 col-md-10 offset-md-2  mt-2" id="alertCorreo" role="alert" style="display:none;">
                        Correo no valido
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Fecha de nacimiento</label>
                    <input type="date" name="fechaDeNacimiento" class="form-control col-10 col-md-10" required>
                </div>
                <div class="form-group row">
                     <label for="" class="col-form-label col-10 col-md-2">Ubicación</label>
                    <select id="regiones" class="form-control col-10 col-md-10 offset-md-2"></select>
                </div>
                <div class="form-group row">
                    <select id="comunas" name="comunas" class="form-control col-10 col-md-10 offset-md-2"></select>
                </div>
                <div class="form-group row">
                    <input type="submit" value="agregar" class="btn btn-primary col-10 offset-md-2">
                </div>
            </form>
        </div>
    </div>
</div>