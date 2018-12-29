
<?php
 require_once plugin_dir_path(__FILE__) . '../wp-pacientes-funciones.php';
 $functions = new wpPacientesFunciones();
 
    //al agregar nuevo paciente
    if(isset($_POST['nuevoPaciente'])){
        $functions->guardar_paciente($_POST);
    }
    
    //al agregar evaluacion
    if(isset($_POST['evaluacion'])){
        $functions->guardar_evaluacion($_POST);
    }
    
    
    $id_usuario = get_current_user_id();
    
    
   // echo "usuario=".$id_usuario;
    
    
    $pacientes  = $functions->obtener_lista_pacientes();
    //print_r($pacientes);
    
    
    
    
?>

<div class="container">
            
            <div class="row mt-3">
              <div class="col-md-4">
                  <h1>Pacientes</h1>
              </div>
              
            </div>
            
           <div class="row mt-4">
               <div class="col-md-10" >

                    <table class="table table-hover table-bordered">
                        <?php
                            $link=the_permalink();
                            echo $link;?>
                        <a href="../wp-content/plugins/wp-pacientes/templates/datos_paciente.php" target="_back">datos</a>
                        <thead class="thead-dark">
                        <tr>
                            <th scope="id">Id</th>
                            <th scope="nombre">Nombre</th>
                            <th scope="correo">Correo</th>
                         </tr>
                        </thead>

                         <tbody>
                            <?php
                                foreach($pacientes as $paciente){
                                    echo "<tr>";
                                    echo "<th>".$paciente->id."</th>";
                                    echo "<th>". $paciente->user_login. "</th>";
                                    echo "<th>". $paciente->user_email."</th>";
                                    echo "<th><button type='button' class='btn btn-primary btn-datos' data-toggle='modal' data-target='#modalDatosPaciente'>
                                            Datos
                                            </button></th>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
               </div>
               
           </div>
       </div>
       



<div class="modal fade" id="modalDatosPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Datos del Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    		<div class="container">	
				<div class="row">
					<table class="table">
						<thead></thead>
						<tbody>
							<tr>	
								<th>Rut</th>
								<th id="datosRut"></th>
							</tr>
							<tr>	
								<th>Edad</th>
								<th id="datosEdad"></th>
							</tr>
							<tr>	
								<th>Comuna</th>
								<th id="datosComuna"></th>
							</tr>
							<tr>	
								<th>Sexo</th>
								<th id="datosSexo"></th>
							</tr>

						</tbody>
					</table>
				</div>
				
				<div class="row">
				    <div class="col-md-10" id="listaEvaluaciones">
				        
				    </div>
    				<button type="button" class="btn btn-primary nuevaEvaluacion" data-toggle="modal" data-target="#modalEvaluacion">
  						Nueva Evaluacion
					</button>
    			</div>
    			
    		</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         <input type="submit" value="Guardar" class="btn btn-primary">
      </div>
      
    </div>
  </div>
</div>




<!-- Modal Evaluacion-->
<div class="modal fade" id="modalEvaluacion" tabindex="-1" role="dialog" aria-labelledby="modalEvaluacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evaluacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            
				<form action=" <?php the_permalink(); ?>" method="post" class="form-group">
				<div class="row" style="background-color: ">
				    <th><input type="hidden" value="evaluacion" name="evaluacion"></th>
				    <input type="hidden" value="" name="idpaciente" id="idpaciente">
					<table class="table" > 
						<thead>Antecedentes de ingreso</thead>
						<tbody>
							<tr >
								<th>Diagnostico</th>
								<th><input type="radio" name="diagnostico" value="parkinson">parkinson</th>
								<th><input type="radio" name="diagnostico" value="parkinsonismo">parkinsonismo</th>
							</tr>
							<tr >
								<th>Fecha de Evaluacion</th>
								<th><input type="date" name="fechaDeEvaluacion"></th>
							</tr>
							<tr >
								<th>Uso de ayudas tecnicas</th>
								<th><input type="radio" name="usoDeAyudasTecnicas" value="no">No</th>
								<th>
								    <select class="custom-select" name="usoDeAyudasTecnicas">
								        <option>Si</option>
								        <option value="baston">Baston</option>
								        <option value="andador">Andador</option>
								        <option value="silla de ruedas">Silla de ruedas</option>
								        <option value="carro de marcha">Carro de marcha</option>
								    </select>
								</th>
							</tr>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row" style="background-color:#e2efd9 ">
					evaluacion nbp
					<table class="table"> 
						<thead>
							<tr>
								<th>Escala de balance BERG</th>
								<th>resultado</th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<th>Transferencia Sedante</th>
								<th><input type="radio" name="transferenciaSedante" value="0">0</th>
								<th><input type="radio" name="transferenciaSedante" value="1">1</th>
								<th><input type="radio" name="transferenciaSedante" value="2">2</th>
								<th><input type="radio" name="transferenciaSedante" value="3">3</th>
								<th><input type="radio" name="transferenciaSedante" value="4">4</th>
							</tr>
							<tr>
								<th>Tandem</th>
								<th><input type="radio" name="tandem" value="0">0</th>
								<th><input type="radio" name="tandem" value="1">1</th>
								<th><input type="radio" name="tandem" value="2">2</th>
								<th><input type="radio" name="tandem" value="3">3</th>
								<th><input type="radio" name="tandem" value="4">4</th>
							</tr>
							<tr>
								<th>Alcance funcional</th>
								<th><input type="radio" name="alcanceFuncional" value="0">0</th>
								<th><input type="radio" name="alcanceFuncional" value="1">1</th>
								<th><input type="radio" name="alcanceFuncional" value="2">2</th>
								<th><input type="radio" name="alcanceFuncional" value="3">3</th>
								<th><input type="radio" name="alcanceFuncional" value="4">4</th>
							</tr>
							<tr>
								<th>Step</th>
								<th><input type="radio" name="step" value="0">0</th>
								<th><input type="radio" name="step" value="1">1</th>
								<th><input type="radio" name="step" value="2">2</th>
								<th><input type="radio" name="step" value="3">3</th>
								<th><input type="radio" name="step" value="4">4</th>
							</tr>
							<tr>
								<th>Promedio</th>
								
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row" style="background-color:#d9e2f3 ">
					<table class="table">
						<thead>
							<tr>
								<th>Test de integracion Sensorial</th>
								<th>resultado (segundos)</th>
							</tr>	
						</thead>
						<tbody>
								<tr>
									<th>Condicion 1</th>
									<th>
									    <select class="custom-select" name="condicion_1" id="condicion1">
									        <?php
									            for($i=0; $i<=30 ;$i++){
                                                   echo "<option value=".$i.">$i</option>";
                                                }
									        ?>
									    </select>
									</th>
								</tr>
								<tr>
									<th>Condicion 2</th>
									<th>
									    <select class="custom-select" name="condicion_2" id="condicion2">
									        <?php
									            for($i=0; $i<=30 ;$i++){
                                                   echo "<option value=".$i.">$i</option>";
                                                }
									        ?>
									    </select>
									</th>
								</tr>
								<tr>
									<th>Condicion 3</th>
									<th>
									    <select class="custom-select" name="condicion_3" id="condicion3">
									        <?php
									            for($i=0; $i<=30 ;$i++){
                                                   echo "<option value=".$i.">$i</option>";
                                                }
									        ?>
									    </select>
									</th>
								</tr>
								<tr>
									<th>Condicion 4</th>
									<th>
									    <select class="custom-select" name="condicion_4" id="condicion4">
									        <?php
									            for($i=0; $i<=30 ;$i++){
                                                   echo "<option value=".$i.">$i</option>";
                                                }
									        ?>
									    </select>
									</th>
								</tr>
								<tr>
								    <th>Tiempo total (0 a 120s)</th>
								</tr>
						</tbody>
					</table>
				</div>
				<div class="row" style="background-color:#ffe598 ">
					<table class="table">
						<thead>
							<tr>
								<th>MINIBEST</th>
								<th>Resultado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							    <th>Item 3</th>
							    <th><input type="radio" name="minibest_item3" value="0">0</th>
								<th><input type="radio" name="minibest_item3" value="1">1</th>
								<th><input type="radio" name="minibest_item3" value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 4</th>
							    <th><input type="radio" name="minibest_item4" value="0">0</th>
								<th><input type="radio" name="minibest_item4" value="1">1</th>
								<th><input type="radio" name="minibest_item4" value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 5</th>
							    <th><input type="radio" name="minibest_item5" value="0">0</th>
								<th><input type="radio" name="minibest_item5" value="1">1</th>
								<th><input type="radio" name="minibest_item5" value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 6</th>
							    <th><input type="radio" name="minibest_item6" value="0">0</th>
								<th><input type="radio" name="minibest_item6" value="1">1</th>
								<th><input type="radio" name="minibest_item6" value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 9</th>
							    <th><input type="radio" name="minibest_item9" value="0">0</th>
								<th><input type="radio" name="minibest_item9" value="1">1</th>
								<th><input type="radio" name="minibest_item9" value="2">2</th>    
							    </th>
							</tr>
							<?php
							for($i=10; $i<15; $i++){
							    echo "<tr>";
							    echo "<th>Item $i</th>";
							    for($j=0; $j<=2; $j++){
							        echo "<th><input type='radio' name='minibest_item$i' value=".$j.">$j</th>";
							    }
							    echo "</tr>";
							}
							?>
							<tr>
							    <th>Puntaje Total (0 a 28 pts)</th>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row" style="background-color:#c3e6cb ">
					<table class="table">
						<thead>
							<th>FGA</th>
							<th>Resultado</th>
						</thead>
						<tbody>
							<tr>
								<th>Item 4</th>
								<th><input type="radio" name="FGA_item4" value="0">0</th>
								<th><input type="radio" name="FGA_item4" value="1">1</th>
								<th><input type="radio" name="FGA_item4" value="2">2</th>
								<th><input type="radio" name="FGA_item4" value="3">3</th>
							</tr>
							<tr>
								<th>Item 7</th>
								<th><input type="radio" name="FGA_item7" value="0">0</th>
								<th><input type="radio" name="FGA_item7" value="1">1</th>
								<th><input type="radio" name="FGA_item7" value="2">2</th>
								<th><input type="radio" name="FGA_item7" value="3">3</th>
							</tr>
								<tr>
								<th>Item 8</th>
								<th><input type="radio" name="FGA_item8" value="0">0</th>
								<th><input type="radio" name="FGA_item8" value="1">1</th>
								<th><input type="radio" name="FGA_item8" value="2">2</th>
								<th><input type="radio" name="FGA_item8" value="3">3</th>
							</tr>
							<tr>
								<th>Item 9</th>
								<th><input type="radio" name="FGA_item9" value="0">0</th>
								<th><input type="radio" name="FGA_item9" value="1">1</th>
								<th><input type="radio" name="FGA_item9" value="2">2</th>
								<th><input type="radio" name="FGA_item9" value="3">3</th>
							</tr>
							<tr>
								<th>Item 10</th>
								<th><input type="radio" name="FGA_item10" value="0">0</th>
								<th><input type="radio" name="FGA_item10" value="1">1</th>
								<th><input type="radio" name="FGA_item10" value="2">2</th>
								<th><input type="radio" name="FGA_item10" value="3">3</th>
							</tr>
							<tr>
								<th>Puntaje Total(0 a 30 pts)</th>
								
							</tr>
						</tbody>
					</table>
				</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
        <input type="submit" value="Guardar evaluacion" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>