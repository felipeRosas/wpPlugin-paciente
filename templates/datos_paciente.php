<?php

if(isset($_GET['id'])){
        $id=$_GET['id'];
        //echo $id;
    }else{
        echo "seleccione un paciente";
        die();
    }
 
$functions = new wpPacientesFunciones();
 
$respuesta = json_decode($functions->listar_evaluaciones($id));

$datos = $respuesta->datos;

$evaluaciones=$respuesta->evaluaciones;
$resultadoHTML="";

           
            foreach($evaluaciones as $evaluacion){
                $resultadoHTML .= "<tr id='".$evaluacion->id."'><td>".$evaluacion->id."</td>";
                $resultadoHTML .= "<td>".$evaluacion->fecha_evaluacion."</td>";
                $resultadoHTML .= "<td><button class='btnEditar btn btn-info btn-sm'>Editar</button></td>";
                $resultadoHTML .= "<td><button class='btnEliminar btn btn-danger btn-sm'>Eliminar</button></td>";
                $resultadoHTML .= "<td><a class='btnVer btn btn-info btn-sm '>Ver</button></td>";
                
                $resultadoHTML .= "</tr>";
                }
            
            

?>

<div class="container">	
				<div class="row">
				    <H1>Datos Paciente</H1>
				    
				    <input type="hidden" id="idpaciente" value="<?php echo $id ?>">
					<div class="col-md-10 col-12">
					    
					    <table class="table">
						<thead></thead>
						<tbody id="datosRespuesta">
							<?php
							$cumpleanos = new DateTime($datos->edad);
                            $hoy = new DateTime();
                            $annos = $hoy->diff($cumpleanos);
                            
							
							    echo  "<tr>";	
                                echo  "<th>Nombre</th>";
                                echo  "<th >".$datos->nombre." ".$datos->apellidos."</th>";
                                echo  "</tr>";
							    echo  "<tr>";	
                                echo  "<th>Rut</th>";
                                echo  "<th id='datosRut'>".$datos->rut."</th>";
                                echo  "</tr>";
                                echo  "<tr>";	
                                echo  "<th>Edad</th>";
                                echo  "<th id='datosEdad'>".$annos->y." años</th>";
                                echo  "</tr>";
                                echo  "<tr>	";
                                echo  "<th>Comuna</th>";
                                echo  "<th id='datosComuna'>".$datos->comuna."</th>";
                                echo  "</tr>";
                                echo  "<tr>	";
                                echo  "<th>Sexo</th>";
                                echo  "<th id='datosSexo'>".$datos->sexo."</th>";
                                echo  "</tr>";
							?>

						</tbody>
					</table>
					</div>
				</div>
				
				<div class="row">
				    <div class="col-md-10 col-12" id="listaEvaluaciones">
				        <h3>Evaluaciones</h3>
					    <button type="button" class="btn btn-primary nuevaEvaluacion" >Nueva Evaluacion</button>
					    <?php echo "<input type='hidden' id='idpacientenuevaevaluacion' value=".$id.">" ?>
				        <div id="evaluacionesPaciente">
				            <table id='tabla-evaluaciones' class='table table-striped'>
				                <tr><th>id</th><th>fecha</th><th  COLSPAN='3'>opciones</th></tr>
				            <?php echo $resultadoHTML ?>
				            </table>
				        </div>
				    </div>
    				
    			</div>
    			
    			
</div>