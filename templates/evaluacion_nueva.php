<?php


//al agregar evaluacion
//print_r($_POST);
    if(isset($_POST['evaluacion'])){
        $functions->guardar_evaluacion($_POST);
        
    }
    
?>

<div class="container mt-4">
    <h1>Nueva Evaluacion </h1>
    <button type="button" class="btn btn-secondary mt-3 retorno-datos offset-10" >cancelar</button>
    <div class="row mt-4">
          
            
				<form action=" <?php the_permalink(); ?>" method="post" class="form-group">
				<div class="row" style="background-color: ">
				    <th><input type="hidden" value="evaluacion" name="evaluacion"></th>
				    <?php echo "<input type='hidden' value=".$id." name='idpaciente' id='idpaciente'>" ?>
					<table class="table" > 
					    <h5>Antecedentes de ingreso</h5>
						<thead></thead>
						<tbody>
							<tr >
								<th>Diagnostico</th>
								<th><input type="radio" name="diagnostico" value="parkinson" required>parkinson</th>
								<th><input type="radio" name="diagnostico" value="parkinsonismo" required>parkinsonismo</th>
							</tr>
							<tr >
								<th>Fecha de Evaluacion</th>
								<th><input type="date" name="fechaDeEvaluacion"></th>
							</tr>
							<tr id="usoDeAyudasTecnicas">
								<th>Uso de ayudas tecnicas</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasNo"   value="no">No</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasBaston"  value="baston">Baston</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasAndador"  value="andador">Andador</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasSillaDeRuedas"  value="silla de ruedas">Silla de Ruedas</th>
								<th><input type="checkbox" name="usoDeAyudasTecnicasCarroDeMarcha"  value="carro de marcha">Carro de Marcha</th>
								
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
								<th><input type="radio" name="transferenciaSedante" required value="0">0</th>
								<th><input type="radio" name="transferenciaSedante" required value="1">1</th>
								<th><input type="radio" name="transferenciaSedante" required value="2">2</th>
								<th><input type="radio" name="transferenciaSedante" required value="3">3</th>
								<th><input type="radio" name="transferenciaSedante" required value="4">4</th>
							</tr>
							<tr>
								<th>Tandem</th>
								<th><input type="radio" name="tandem" required value="0">0</th>
								<th><input type="radio" name="tandem" required value="1">1</th>
								<th><input type="radio" name="tandem" required value="2">2</th>
								<th><input type="radio" name="tandem" required value="3">3</th>
								<th><input type="radio" name="tandem" required value="4">4</th>
							</tr>
							<tr>
								<th>Alcance funcional</th>
								<th><input type="radio" name="alcanceFuncional" required value="0">0</th>
								<th><input type="radio" name="alcanceFuncional" required value="1">1</th>
								<th><input type="radio" name="alcanceFuncional" required value="2">2</th>
								<th><input type="radio" name="alcanceFuncional" required value="3">3</th>
								<th><input type="radio" name="alcanceFuncional" required value="4">4</th>
							</tr>
							<tr>
								<th>Step</th>
								<th><input type="radio" name="step" required value="0">0</th>
								<th><input type="radio" name="step" required value="1">1</th>
								<th><input type="radio" name="step" required value="2">2</th>
								<th><input type="radio" name="step" required value="3">3</th>
								<th><input type="radio" name="step" required value="4">4</th>
							</tr>
							<tr>
								<th>Puntaje Total</th>
								<th>
								   <label id="puntajeBerg"></label>
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
									    <select class="custom-select" name="condicion_1" id="condicion1" required>
									        <option value=""></option>
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
									    <select class="custom-select" name="condicion_2" id="condicion2" required>
									        <option value=""></option>
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
									    <select class="custom-select" name="condicion_3" id="condicion3" required>
									        <option value=""></option>
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
									    <select class="custom-select" name="condicion_4" id="condicion4" required>
									        <option value=""></option>
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
								    <th><label id="puntajeIntegracionSensorial"></label></th>
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
							    <th><input type="radio" name="minibest_item3" required value="0">0</th>
								<th><input type="radio" name="minibest_item3" required value="1">1</th>
								<th><input type="radio" name="minibest_item3" required value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 4</th>
							    <th><input type="radio" name="minibest_item4" required value="0">0</th>
								<th><input type="radio" name="minibest_item4" required value="1">1</th>
								<th><input type="radio" name="minibest_item4" required value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 5</th>
							    <th><input type="radio" name="minibest_item5" required value="0">0</th>
								<th><input type="radio" name="minibest_item5" required value="1">1</th>
								<th><input type="radio" name="minibest_item5" required value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 6</th>
							    <th><input type="radio" name="minibest_item6" required value="0">0</th>
								<th><input type="radio" name="minibest_item6" required value="1">1</th>
								<th><input type="radio" name="minibest_item6" required value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 9</th>
							    <th><input type="radio" name="minibest_item9" required value="0">0</th>
								<th><input type="radio" name="minibest_item9" required value="1">1</th>
								<th><input type="radio" name="minibest_item9" required value="2">2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 10</th>
							    <th><input type="radio" name="minibest_item10" required value="0" >0</th>
								<th><input type="radio" name="minibest_item10" required value="1" >1</th>
								<th><input type="radio" name="minibest_item10" required value="2" >2</th>    
							    </th>
							</tr>
							<tr>
							    <th>Item 11</th>
							    <th><input type="radio" name="minibest_item11" required value="0" >0</th>
								<th><input type="radio" name="minibest_item11" required value="1" >1</th>
								<th><input type="radio" name="minibest_item11" required value="2" >2</th>    
							    </th>
							</tr>
						    <tr>
                                <th>Item 12</th>
                                <th><input type="radio" name="minibest_item12" required value="0" >0</th>
                                <th><input type="radio" name="minibest_item12" required value="1" >1</th>
                                <th><input type="radio" name="minibest_item12" required value="2" >2</th>    
                                </th>
                            </tr>
                            <tr>
                                <th>Item 13</th>
                                <th><input type="radio" name="minibest_item13" required value="0" >0</th>
                                <th><input type="radio" name="minibest_item13" required value="1" >1</th>
                                <th><input type="radio" name="minibest_item13" required value="2" >2</th>    
                                </th>
                            </tr>
                            <tr>
                                <th>Item 14</th>
                                <th><input type="radio" name="minibest_item14" required value="0" >0</th>
                                <th><input type="radio" name="minibest_item14" required value="1" >1</th>
                                <th><input type="radio" name="minibest_item14" required value="2" >2</th>    
                                </th>
                            </tr>
								<tr>
								<th>Puntaje Total</th>
								<th>
								   <label id="puntajeMINIBEST"></label>
								</th>
								
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
                                <th><input type="radio" name="FGA_item4" required value="0">0</th>
                                <th><input type="radio" name="FGA_item4" required value="1">1</th>
                                <th><input type="radio" name="FGA_item4" required value="2">2</th>
                                <th><input type="radio" name="FGA_item4" required value="3">3</th>
                            </tr>
                            <tr>
                                <th>Item 7</th>
                                <th><input type="radio" name="FGA_item7" required value="0">0</th>
                                <th><input type="radio" name="FGA_item7" required value="1">1</th>
                                <th><input type="radio" name="FGA_item7" required value="2">2</th>
                                <th><input type="radio" name="FGA_item7" required value="3">3</th>
                            </tr>
                                <tr>
                                <th>Item 8</th>
                                <th><input type="radio" name="FGA_item8" required value="0">0</th>
                                <th><input type="radio" name="FGA_item8" required value="1">1</th>
                                <th><input type="radio" name="FGA_item8" required value="2">2</th>
                                <th><input type="radio" name="FGA_item8" required value="3">3</th>
                            </tr>
                            <tr>
                                <th>Item 9</th>
                                <th><input type="radio" name="FGA_item9" required value="0">0</th>
                                <th><input type="radio" name="FGA_item9" required value="1">1</th>
                                <th><input type="radio" name="FGA_item9" required value="2">2</th>
                                <th><input type="radio" name="FGA_item9" required value="3">3</th>
                            </tr>
                            <tr>
                                <th>Item 10</th>
                                <th><input type="radio" name="FGA_item10" required value="0">0</th>
                                <th><input type="radio" name="FGA_item10" required value="1">1</th>
                                <th><input type="radio" name="FGA_item10" required value="2">2</th>
                                <th><input type="radio" name="FGA_item10" required value="3">3</th>
                            </tr>
								<tr>
								<th>Puntaje Total</th>
								<th>
								   <label id="puntajeFGA"></label>
								</th>
								
							</tr>
						</tbody>
					</table>
				</div>
				<button type="button" class="btn btn-secondary mt-3 retorno-datos" >cancelar</button>
                <input type="submit" value="Guardar evaluacion" class="btn btn-primary mt-3">
            </form>
    </div>
    
</div>