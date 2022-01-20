				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<div class="container-fluid">
						<br><br>
						<center> <h1> Mis Seguimientos </h1> </center>
						<br><br><br>
						<?php if ($numeros != ""){ ?>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<?php if (empty($numeros)) { ?>
										<a href="#" class="btn btn-outline-primary float-left">Total : 0 Seguimientos </a>
									<?php }else{ ?>
										<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($numeros) ?>  Seguimientos </a>
										<input type="hidden" name="" id="totalRegistros" value="<?php echo count($numeros) ?>">
									<?php } ?>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<input class="form-control" id="SearchSeg" type="search" placeholder="Search..">
								</div>
							</div>
							<br><br><br>
							<div class="row">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr class="text-center">
												<th> Apellido(s) </th>
												<th> Nombres(s) </th>
												<th> Teléfono </th>
												<th> Hora de llamada </th>
												<th> Reagendar </th>
												<th> Cambiar status </th>
											</tr>
										</thead>
										<tbody id="tablaSeguimientos">
											<?php foreach ($numeros as $row){ ?>
												<tr>
													<td>
														<center>
															<?php if ($row -> Apellidos != "") {
																print_r($row -> Apellidos);
															}else {
																print_r('Sin Registro');
															} ?>
														</center>
													</td>
													<td>
														<center>
															<?php if ($row -> Nombres != "") {
																print_r($row -> Nombres);
															}else {
																print_r('Sin Registro');
															} ?>
														</center>
													</td>
													<td>
														<center>
															<?php if ($row -> Telefono != "") {
																print_r($row -> Telefono);
															}else {
																print_r('Sin Registro');
															} ?>
														</center>
													</td>
													<td>
														<center>
															<?php if ($row -> CallHSeguimiento != "00:00:00") {
																print_r($row -> CallHSeguimiento);
															}else {
																print_r('Sin Hora de LLamada');
															} ?>
														</center>
													</td>
													<td>
														<center>
															<form class="" action="<?= base_url()?>Ejecutivo/tipificar-llamada" method="post">
																<input type="hidden" class="form-control" name="statusLlamada" value="2">
																<input type="hidden" class="form-control" name="IdNT" value="<?= $row -> CallNT ?>">
																<input id="btnReagendar" type="submit" class="btn btn-outline-dark" name="" value="reagendar">
															</form>
														</center>
													</td>
													<td>
														<center>
															<form class="" onsubmit="return validarCla()" action="<?= base_url()?>Ejecutivo/re-tipificar-llamada" method="post">
																<center>
																	<div class="form-group">
																		<input type="hidden" class="form-control" name="IdNT" value="<?= $row -> CallNT ?>">
																		<select class="form-control" id="statusLlamada" name="statusLlamada">
																			<option value="Selecciona-estatus-de-la-llamada"> Selecciona estatus de la llamada </option>
																			<?php foreach ($status as $row){ ?>
																				<option value="<?= $row -> IdStatus ?>"> <?= $row -> CallStatus ?> </option>
																			<?php } ?>
																		</select>
																	</div>
																	<input id="btnCalificar" type="submit" class="btn btn-outline-success" name="" value="Clasificar">
																</center>
															</form>
														</center>
													</td>
												</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
						<?php }else { ?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<center>
										<h1> Felicidades hoy puedes descansar un poco. No cuentas con Seguimientos. </h1>
										<br><br>
										<img src="<?= base_url()?>images/Icono/Call_Icon_S.png" alt="Call_Icon_S">
									</center>
								</div>
							</div>
						<?php } ?>
					</div>
			  </div>
			</div>
		</div>
