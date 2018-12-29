<?php
    require_once plugin_dir_path(__FILE__) . '../wp-pacientes-funciones.php';
 $functions = new wpPacientesFunciones();
?>
<div class="container">
    <h1>Datos del  Paciente</h1>
    
    <div class="row">
          <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Datos del paciente</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <th><label>RUT</label></th>
              <th><input type="text" class="form-control" id="rut" name="rut"></th>
            </tr>
            
          </tbody>
        </table>
    </div>
    
</div>