<?php
    require_once plugin_dir_path(__FILE__) . '../wp-pacientes-funciones.php';
    $functions = new wpPacientesFunciones();

    $datos=json_decode($functions->obtener_evaluacion($idEvaluacion));
    //print_r($datos);

    
    if(isset($_POST['evaluacion'])){
        $functions->actualizar_evaluacion($_POST);
    }
    
?>

<div class="container mt-4">
    <h1>Editar Evaluacion </h1>
    
    <div class="row mt-4">
          
            
				<form action=" <?php the_permalink(); ?>" method="post" class="form-group">
				<div class="row" style="background-color: ">
				    <th><input type="hidden" value="editarEvaluacion" name="evaluacion"></th>
				    <?php echo "<input type='hidden' value=".$idEvaluacion." name='idEvaluacion' id='idEvaluacion'>" ?>
				    <?php echo "<input type='hidden' value=".$_GET['pac']." name='' id='idpaciente'>" ?>
					<table class="table" > 
					<h5>Antecedentes de ingreso</h5>
						<thead></thead>
						<tbody>
							<tr >
								<th>Diagnostico</th>
								
								<th><input type="radio" name="diagnostico" value="parkinson">parkinson</th>
								<th><input type="radio" name="diagnostico" value="parkinsonismo">parkinsonismo</th>
							</tr>
							<tr >
								<th>Fecha de Evaluacion</th>
								<th><input type="date" name="fechaDeEvaluacion" value="<?php echo date('Y-m-d', strtotime($datos[0]->fecha_evaluacion)) ?>"></th>
							</tr>
								<tr >
								    
								<th>Uso de ayudas tecnicas</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasNo" value="no" <?php echo ($datos[0]->uso_de_ayudas_tecnicas == 1)? "checked " : "" ?>>No</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasBaston" value="baston" <?php echo ($datos[0]->uso_de_ayudas_tecnicas_baston == 1)? "checked " : "" ?>>Baston</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasAndador" value="andador" <?php echo ($datos[0]->uso_de_ayudas_tecnicas_andador == 1)? "checked " : "" ?>>Andador</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasSillaDeRuedas" value="silla de ruedas" <?php echo ($datos[0]->uso_de_ayudas_tecnicas_silla_ruedas == 1)? "checked " : "" ?>>Silla de Ruedas</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasCarroDeMarcha" value="carro de marcha" <?php echo ($datos[0]->uso_de_ayudas_tecnicas_carro_marcha == 1)? "checked " : "" ?>>Carro de Marcha</th>
								
							</tr>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row" style="background-color:#e2efd9 ">
					<h5>evaluacion nbp</h5>
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
								<th><input type="radio" name="transferenciaSedante" value="0" <?php echo ($datos[0]->transferencia_sedante === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="transferenciaSedante" value="1" <?php echo ($datos[0]->transferencia_sedante === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="transferenciaSedante" value="2" <?php echo ($datos[0]->transferencia_sedante === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="transferenciaSedante" value="3" <?php echo ($datos[0]->transferencia_sedante === "3")? "checked " : "" ?>>3</th>
								<th><input type="radio" name="transferenciaSedante" value="4" <?php echo ($datos[0]->transferencia_sedante === "4")? "checked " : "" ?>>4</th>
							</tr>
							<tr>
								<th>Tandem</th>
								<th><input type="radio" name="tandem" value="0" <?php echo ($datos[0]->tandem === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="tandem" value="1" <?php echo ($datos[0]->tandem === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="tandem" value="2" <?php echo ($datos[0]->tandem === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="tandem" value="3" <?php echo ($datos[0]->tandem === "3")? "checked " : "" ?>>3</th>
								<th><input type="radio" name="tandem" value="4" <?php echo ($datos[0]->tandem === "4")? "checked " : "" ?>>4</th>
							</tr>
							<tr>
								<th>Alcance funcional</th>
								<th><input type="radio" name="alcanceFuncional" value="0" <?php echo ($datos[0]->alcance_funcional === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="alcanceFuncional" value="1" <?php echo ($datos[0]->alcance_funcional === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="alcanceFuncional" value="2" <?php echo ($datos[0]->alcance_funcional === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="alcanceFuncional" value="3" <?php echo ($datos[0]->alcance_funcional === "3")? "checked " : "" ?>>3</th>
								<th><input type="radio" name="alcanceFuncional" value="4" <?php echo ($datos[0]->alcance_funcional === "4")? "checked " : "" ?>>4</th>
							</tr>
							<tr>
								<th>Step</th>
								<th><input type="radio" name="step" value="0" <?php echo ($datos[0]->step === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="step" value="1" <?php echo ($datos[0]->step === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="step" value="2" <?php echo ($datos[0]->step === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="step" value="3" <?php echo ($datos[0]->step === "3")? "checked " : "" ?>>3</th>
								<th><input type="radio" name="step" value="4" <?php echo ($datos[0]->step === "4")? "checked " : "" ?>>4</th>
							</tr>
							<tr>
								<th>Promedio</th>
								<th>
								    <?php
								        $puntajeBerg=($datos[0]->transferencia_sedante * 3.5)+($datos[0]->tandem * 3.5)+($datos[0]->alcance_funcional * 3.5)+($datos[0]->step *3.5);
								        echo "<label id='puntajeBerg'>$puntajeBerg</label>";
								    ?>
								   
								</th>
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
									    <select class="custom-select" name="condicion_1"  id="condicion1">
									        <?php
									            $valor = $datos[0]->condicion_1;
									            for($i=0; $i<=30 ;$i++){
									                if($valor == (string)$i){
									                    echo "<option selected='true' value=".$i." >$i</option>";
									                }else{
                                                        echo "<option value=".$i." >$i</option>";
									                }
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
									        $valor = $datos[0]->condicion_2;
									            for($i=0; $i<=30 ;$i++){
                                                    if($valor == (string)$i){
									                    echo "<option selected='true' value=".$i." >$i</option>";
									                }else{
                                                        echo "<option value=".$i." >$i</option>";
									                }
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
									        $valor = $datos[0]->condicion_3;
									            for($i=0; $i<=30 ;$i++){
                                                   if($valor == (string)$i){
									                    echo "<option selected='true' value=".$i." >$i</option>";
									                }else{
                                                        echo "<option value=".$i." >$i</option>";
									                }
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
									        $valor = $datos[0]->condicion_4;
									            for($i=0; $i<=30 ;$i++){
                                                   if($valor == (string)$i){
									                    echo "<option selected='true' value=".$i." >$i</option>";
									                }else{
                                                        echo "<option value=".$i." >$i</option>";
									                }
                                                }
									        ?>
									    </select>
									</th>
								</tr>
								<tr>
								    <th>Tiempo total (0 a 120s)</th>
								     <th>
								         <?php 
								            $puntajeIntegracion = $datos[0]->condicion_1+$datos[0]->condicion_2+$datos[0]->condicion_3+$datos[0]->condicion_4;
								            echo "<label id='puntajeIntegracionSensorial'>$puntajeIntegracion</label>";
								         ?>
								         
								    </th>
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
							    <th><input type="radio" name="minibest_item3" value="0" <?php echo ($datos[0]->minibest_item3 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item3" value="1" <?php echo ($datos[0]->minibest_item3 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item3" value="2" <?php echo ($datos[0]->minibest_item3 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 4</th>
							    <th><input type="radio" name="minibest_item4" value="0" <?php echo ($datos[0]->minibest_item4 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item4" value="1" <?php echo ($datos[0]->minibest_item4 === "2")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item4" value="2" <?php echo ($datos[0]->minibest_item4 === "3")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 5</th>
							    <th><input type="radio" name="minibest_item5" value="0" <?php echo ($datos[0]->minibest_item5 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item5" value="1" <?php echo ($datos[0]->minibest_item5 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item5" value="2" <?php echo ($datos[0]->minibest_item5 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 6</th>
							    <th><input type="radio" name="minibest_item6" value="0" <?php echo ($datos[0]->minibest_item6 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item6" value="1" <?php echo ($datos[0]->minibest_item6 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item6" value="2" <?php echo ($datos[0]->minibest_item6 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 9</th>
							    <th><input type="radio" name="minibest_item9" value="0" <?php echo ($datos[0]->minibest_item6 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item9" value="1" <?php echo ($datos[0]->minibest_item6 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item9" value="2" <?php echo ($datos[0]->minibest_item6 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 10</th>
							    <th><input type="radio" name="minibest_item10" value="0" <?php echo ($datos[0]->minibest_item10 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item10" value="1" <?php echo ($datos[0]->minibest_item10 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item10" value="2" <?php echo ($datos[0]->minibest_item10 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 11</th>
							    <th><input type="radio" name="minibest_item11" value="0" <?php echo ($datos[0]->minibest_item11 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item11" value="1" <?php echo ($datos[0]->minibest_item11 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item11" value="2" <?php echo ($datos[0]->minibest_item11 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 12</th>
							    <th><input type="radio" name="minibest_item12" value="0" <?php echo ($datos[0]->minibest_item12 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item12" value="1" <?php echo ($datos[0]->minibest_item12 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item12" value="2" <?php echo ($datos[0]->minibest_item12 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 13</th>
							    <th><input type="radio" name="minibest_item13" value="0" <?php echo ($datos[0]->minibest_item13 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item13" value="1" <?php echo ($datos[0]->minibest_item13 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item13" value="2" <?php echo ($datos[0]->minibest_item13 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 14</th>
							    <th><input type="radio" name="minibest_item14" value="0" <?php echo ($datos[0]->minibest_item14 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="minibest_item14" value="1" <?php echo ($datos[0]->minibest_item14 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="minibest_item14" value="2" <?php echo ($datos[0]->minibest_item14 === "2")? "checked " : "" ?>>2</th>    
							    </th>
							</tr>
							
							<tr>
							    <th>Puntaje Total (0 a 28 pts)</th>
							    <?php
							        $puntaje = ($datos[0]->minibest_item3*1.4)+($datos[0]->minibest_item4*1.4)+($datos[0]->minibest_item5*1.4)+($datos[0]->minibest_item6*1.4)+($datos[0]->minibest_item9*1.4)+($datos[0]->minibest_item10*1.4)+($datos[0]->minibest_item11*1.4)+($datos[0]->minibest_item12*1.4)+($datos[0]->minibest_item13*1.4)+($datos[0]->minibest_item14*1.4);
							        echo "<th> <label id='puntajeMINIBEST'>$puntaje</label></th>";
							    ?>
							    
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
								<th><input type="radio" name="FGA_item4" value="0" <?php echo ($datos[0]->fga_item4 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="FGA_item4" value="1" <?php echo ($datos[0]->fga_item4 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="FGA_item4" value="2" <?php echo ($datos[0]->fga_item4 === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="FGA_item4" value="3" <?php echo ($datos[0]->fga_item4 === "3")? "checked " : "" ?>>3</th>
							</tr>
							<tr>
								<th>Item 7</th>
								<th><input type="radio" name="FGA_item7" value="0" <?php echo ($datos[0]->fga_item7 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="FGA_item7" value="1" <?php echo ($datos[0]->fga_item7 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="FGA_item7" value="2" <?php echo ($datos[0]->fga_item7 === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="FGA_item7" value="3" <?php echo ($datos[0]->fga_item7 === "3")? "checked " : "" ?>>3</th>
							</tr>
								<tr>
								<th>Item 8</th>
								<th><input type="radio" name="FGA_item8" value="0" <?php echo ($datos[0]->fga_item8 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="FGA_item8" value="1" <?php echo ($datos[0]->fga_item8 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="FGA_item8" value="2" <?php echo ($datos[0]->fga_item8 === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="FGA_item8" value="3" <?php echo ($datos[0]->fga_item8 === "3")? "checked " : "" ?>>3</th>
							</tr>
							<tr>
								<th>Item 9</th>
								<th><input type="radio" name="FGA_item9" value="0" <?php echo ($datos[0]->fga_item9 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="FGA_item9" value="1" <?php echo ($datos[0]->fga_item9 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="FGA_item9" value="2" <?php echo ($datos[0]->fga_item9 === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="FGA_item9" value="3" <?php echo ($datos[0]->fga_item9 === "3")? "checked " : "" ?>>3</th>
							</tr>
							<tr>
								<th>Item 10</th>
								<th><input type="radio" name="FGA_item10" value="0" <?php echo ($datos[0]->fga_item10 === "0")? "checked " : "" ?>>0</th>
								<th><input type="radio" name="FGA_item10" value="1" <?php echo ($datos[0]->fga_item10 === "1")? "checked " : "" ?>>1</th>
								<th><input type="radio" name="FGA_item10" value="2" <?php echo ($datos[0]->fga_item10 === "2")? "checked " : "" ?>>2</th>
								<th><input type="radio" name="FGA_item10" value="3" <?php echo ($datos[0]->fga_item10 === "3")? "checked " : "" ?>>3</th>
							</tr>
							<tr>
								<th>Puntaje Total(0 a 30 pts)</th>
								<?php
								$puntajeFGA=($datos[0]->fga_item4*2)+($datos[0]->fga_item7*2)+($datos[0]->fga_item8*2)+($datos[0]->fga_item9*2)+($datos[0]->fga_item10*2);
								    echo "<th><label id='puntajeFGA'>$puntajeFGA</label></th>";
								?>
								 
							</tr>
						</tbody>
					</table>
				</div>
				<button type="button" class="btn btn-secondary mt-3 retorno-datos" data-dismiss="modal">cancelar</button>
                <input type="submit" value="Guardar evaluacion" class="btn btn-primary mt-3">
            </form>
    </div>
    
</div>