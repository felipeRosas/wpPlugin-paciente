
<?php
   // $functions = new wpPacientesFunciones();
    $datos = json_decode($functions->obtener_info_paciente($_GET['edit']));
    
    
    //al editar nuevo paciente
    if(isset($_POST['editarPaciente'])){
        $functions->editar_paciente($_POST);
        //print_r($_POST);
        echo " ";
       
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mt-3">
            <h1>Editar Paciente</h1>
            <form action=" <?php the_permalink(); ?>" method="post" class="form-group mt-3">
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control col-10 col-md-10" autocomplete="off" required <?php echo "value='$datos->nombre'"?>>
                    <input type="hidden" value="editarPaciente" name="editarPaciente">
                    <input type="hidden" value="<?php echo $_GET['edit']?>" name="idPaciente">
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control col-10 col-md-10" autocomplete="off" required <?php echo "value='$datos->apellidos'"?>>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Sexo</label>
                    <div class="col-10">
                        <input type="radio" name="sexo" value="femenino"  class="form-control" <?php echo ($datos->sexo=="femenino") ? "checked" : "" ?>> Femenino
                        <input type="radio" name="sexo" value="masculino"  class="form-control" <?php echo ($datos->sexo=="masculino") ? "checked" : "" ?> > Masculino
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Rut</label>
                    <input type="text" name="rut" id="rut" class="form-control col-10 col-md-10" autocomplete="off" required <?php echo "value='$datos->rut'" ?> >
                    <div class="alert alert-danger col-10 col-md-10 offset-md-2  mt-2" id="alertRut" role="alert" style="display:none;">
                        Rut no valido
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control col-10 col-md-10" autocomplete="off" required <?php echo "value='$datos->correo'" ?>>
                    <div class="alert alert-danger col-10 col-md-10 offset-md-2  mt-2" id="alertCorreo" role="alert" style="display:none;">
                        Correo no valido
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Fecha de nacimiento</label>
                    <input type="date" name="fechaDeNacimiento" class="form-control col-10 col-md-10" required value="<?php echo date('Y-m-d', strtotime($datos->edad)) ?>">
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-10 col-md-2">Ubicación Actual</label>
                    <label class="col-form-label col-10 col-md-2"><?php echo $datos->comuna?></label>
                    <input type="hidden" value="<?php echo $datos->comuna ?>" name="ubicacionActual">
                    
                </div>
                <div class="form-group row selectUbicacion" >
                    <select id="regiones" class="form-control col-10 col-md-10 offset-md-2"></select>
                </div>
                <div class="form-group row selectUbicacion" >
                    <select id="comunas" name="comunas" class="  form-control col-10 col-md-10 offset-md-2"></select>
                </div>
                <div class="form-group row">
                    
                    <input type="submit" value="Guardar Cambios" class="btn btn-primary col-4 offset-md-2">
                    <!--<button class="btn btn-danger col-4 offset-md-2" id="btn-editar-cancelar">Cancelar</button>-->
                    <!--<input type="submit" value="Guardar Cambios" class="btn btn-primary col-4 offset-md-2">-->
                </div>
            </form>
        </div>
    </div>
</div>