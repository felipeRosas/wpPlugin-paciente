
<?php
 require_once plugin_dir_path(__FILE__) . '../wp-pacientes-funciones.php';
 $functions = new wpPacientesFunciones();
 /*
    //al agregar nuevo paciente
    if(isset($_POST['nuevoPaciente'])){
        $functions->guardar_paciente($_POST);
    }
    
    //al agregar evaluacion
    if(isset($_POST['evaluacion'])){
        $functions->guardar_evaluacion($_POST);
    }
   */ 
    
    $id_usuario = get_current_user_id();
    $pacientes  = $functions->obtener_lista_pacientes();
    
    
?>

<div class="container mt-4">
            
            <div class="row mt-3">
              <div class="col-md-4">
                  <h1>Pacientes</h1>
                  <button class="btn btn-info" id="btn-lista" style="display:none;">lista</button>
              </div>
              
            </div>
            
           <div class="row mt-4" id="div-pacientes">
               <div class="col-md-8 col-12" >
                
                    <table class="table table-hover table-bordered">
                       
                        <thead class="">
                        <tr>
                            <th scope="id">Id</th>
                            <th scope="nombre">Nombre</th>
                            <th scope="correo">Correo</th>
                            <th  COLSPAN='3'>opciones</th>
                         </tr>
                        </thead>

                         <tbody >
                            <?php
                                foreach($pacientes as $paciente){
                                    echo "<tr>";
                                    echo "<th>".$paciente->id."</th>";
                                    echo "<th>". $paciente->user_login. "</th>";
                                    echo "<th>". $paciente->user_email."</th>";
                                   /* echo "<th><button type='button' class='btn btn-primary btn-datos' data-toggle='modal' data-target='#modalDatosPaciente' data-backdrop='static'>
                                            Datos
                                            </button></th>";*/
                                    echo "<th><button type='button' class='btn btn-primary btn-datos btn-sm' >
                                            Datos
                                            </button></th>";
                                   echo "<td><button class='btn btn-danger btn-sm btn-eliminar-paciente' id='' >Eliminar</button></td>";
                                   echo "<td><button class='btn btn-info btn-sm btn-editar-paciente' id='' >Editar</button></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        
                    </table>
               </div>
               
          
               
           </div>
          
       </div>
       


