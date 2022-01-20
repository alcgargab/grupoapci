			<div class="">
				<div class="row">
					<div id="ap-menu-lg" class="ap-menu-lg-class">
						<div class="row">
						  <div class="ap-class-12">
								<input id="ruta" type="hidden" name="" value="<?= $tbl_em_ruta?>">
								<div id="ap-menu-gerente">
									<?php if ($this -> session -> user == "ECcaemi"){ ?>
										<!-- pase de salida -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
													<p> Pase de salida <img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-ps">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-ps">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Pase de salida </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_exit_pass()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/generate-exit-pass" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-exit-pass-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-9">
																						<div class="form-group">
																					    <label for="empleado_p_s"> Empleado </label>
																							<select class="form-control" id="empleado_p_s" name="empleado_p_s" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="hora_p_s"> Hora: </label>
																							<input type="time" class="form-control" id="hora_p_s" name="hora_p_s" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="motivo_p_s"> Motivo </label>
																							<center> <textarea name="motivo_p_s" class="form-control" id="motivo_p_s" rows="3" cols="80" required>  </textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn" name="btnGePermiso" id="btnGePermiso" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-exit-pass-of-my-team">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- permisos -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
													<p> Permisos <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-p-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-p">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-p">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Permiso </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_permission()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/add-permissions" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-permission-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																					    <label for="selectempleado"> Empleado </label>
																							<select class="form-control" id="selectempleadoper" name="selectempleado" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-3">
																						<div class="form-group">
																							<label for="horas"> Número de Horas </label>
																							<input type="number" class="form-control" id="horas" name="horas" value="" readonly required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="horastart"> De: </label>
																							<input type="time" class="form-control" id="horastart" name="horastart" value="" required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="horaend"> A: </label>
																							<input type="time" class="form-control" id="horaend" name="horaend" value="" required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="FPermiso"> Fecha de Permiso </label>
																							<input type="date" class="form-control" id="FPermiso" name="FPermiso" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="Motivo"> Motivo </label>
																							<center> <textarea name="Motivo" class="form-control" id="Motivo" rows="3" cols="80" required>  </textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn" name="btnGePermiso" id="btnGePermiso" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-permissions-of-my-team">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- vacantes -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-vac-down">
													<p>
														Vacantes
														<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														<input id="tentrevista" type="hidden" name="tentrevista" value="0">
													</p>
												</a>
											</div>
											<div id="ap-vac-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-vac">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_AV.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														  <div class="modal fade" id="ap-modal-vac">
														    <div class="modal-dialog modal-dialog-centered modal-xl">
														      <div class="modal-content">
														        <div class="modal-header ap-gral-modal-header">
														          <h4 class="modal-title"> Nueva Vacante </h4>
														          <button type="button" class="close" data-dismiss="modal">
														          	<i class='fas fa-times ap-gral-fa-times'></i>
														          </button>
														        </div>
														        <div class="modal-body">
														          <form class="" onsubmit="return validate_vacancy()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/add-job-vacancy" method="post">
																				<div class="container-fluid">
																					<div class="row">
																					  <div class="ap-class-12">
																					    <span id="ap-vacant-error">  </span>
																					  </div>
																					</div>
															          	<div class="row">
															          	  <div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="Puesto"> Puesto: </label>
																								<select class="form-control" name="Puesto" id="Puesto" required>
																									<option value="selecciona-el-puesto"> Selecciona el puesto: </option>
																									<?php foreach ($tbl_pue as $row){ ?>
																										<option value="<?= $row -> id_pue ?>"> <?= $row -> puesto_pue ?> </option>
																									<?php } ?>
																								</select>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="LTrabajo"> Lugar de Trabajo: </label>
																								<input type="text" name="LTrabajo" class="form-control" id="LTrabajo" required>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="empleados_va"> Numero de empleados: </label>
																								<input type="number" name="empleados_va" class="form-control" id="empleados_va" required>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="Sueldo"> Sueldo: </label>
																								<input type="number" name="Sueldo" class="form-control" id="Sueldo" required>
																							</div>
															          	  </div>
															          	</div>
																					<div class="row">
																					  <div class="ap-class-4">
																							<div class="form-group">
																								<label for="aDesempenae"> Actividades a desempeñar: </label>
																								<textarea name="aDesempenae" rows="8" cols="80" class="form-control" id="aDesempenae" required></textarea>
																							</div>
																					  </div>
																						<div class="ap-class-4">
																							<div class="form-group">
																								<label for="Requisitos"> Requisitos: </label>
																								<textarea name="Requisitos" rows="8" cols="80" class="form-control" id="Requisitos" required></textarea>
																							</div>
																					  </div>
																						<div class="ap-class-4">
																							<div class="form-group">
																								<label for="FLimite"> Fecha limite: </label>
																								<input type="date" class="form-control" name="FLimite" id="FLimite" required>
																							</div>
																					  </div>
																					</div>
															          </div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																				    <input type="submit" id="btnVacante" class="btn btn-block ap-gral-btn" name="" value="Generar">
																				  </div>
																				</div>
														          </form>
														        </div>
														        <div class="modal-footer ap-gral-modal-footer">
														        </div>
														      </div>
														    </div>
														  </div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-my-job-vacancies">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VMV.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- Entrevista -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
													<p>
														Entrevistas
														<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
													</p>
												</a>
											</div>
											<div id="ap-en-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a href="<?= base_url()?>Gerentedearea/<?= $tbl_em_ruta ?>/view-interview">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<!-- personal -->
										<div class="card">
											<div class="card-header">
												<a class="card-link" data-toggle="collapse" href="#ap-e-down">
													<p>
														Personal
														<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
													</p>
												</a>
											</div>
											<div id="ap-e-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-employee">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- evaluación -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
													<p> Evaluación <img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-e">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_EE.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-e">
																<div class="modal-dialog modal-xl modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Evaluar empleado </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_evaluation()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/generate-evaluation" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																					    <label for="selectempleado"> Empleado </label>
																							<select class="form-control" id="selectempleado" name="selectempleado" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																				</div>
																				<div class="container">
																				  <table class="table table-striped">
																				    <thead>
																				      <tr>
																				        <th>Competencias personales</th>
																				        <th> Muy bajo </th>
																								<th> Bajo </th>
																								<th> Medio </th>
																								<th> Alto </th>
																				        <th> Muy Alto </th>
																				      </tr>
																				    </thead>
																				    <tbody>
																				      <tr>
																				        <td>
																				        	<b> Comunicación: </b> Capacidad para intercambiar puntos de vista, opiniones o cualquier otro tipo de información de manera clara y efectiva.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoc" name="comunicacion" value="6">
																											<label class="custom-control-label" for="muyBajoc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="Bajoc" name="comunicacion" value="7">
																											<label class="custom-control-label" for="Bajoc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="Medioc" name="comunicacion" value="8">
																											<label class="custom-control-label" for="Medioc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="Altoc" name="comunicacion" value="9">
																											<label class="custom-control-label" for="Altoc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoc" name="comunicacion" value="10">
																											<label class="custom-control-label" for="muyAltoc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Tolerancia a la frustración: </b> Capacidad para mantener una conducta efectiva al enfrentar situaciones cambiantes, dificultades o inconvenientes, pese a que las medidas adoptadas por otros sean contrarias a su sentir.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoTF" name="TolFru" value="6">
																											<label class="custom-control-label" for="muyBajoTF">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoTF" name="TolFru" value="7">
																											<label class="custom-control-label" for="BajoTF">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioTF" name="TolFru" value="8">
																											<label class="custom-control-label" for="MedioTF">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoTF" name="TolFru" value="9">
																											<label class="custom-control-label" for="AltoTF">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoTF" name="TolFru" value="10">
																											<label class="custom-control-label" for="muyAltoTF">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Autocontrol: </b> Capacidad para dominar y orientar de manera pertinente y en favor de las necesidades de la Institución, sentimientos y emociones.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoA" name="Autocontrol" value="6">
																											<label class="custom-control-label" for="muyBajoA">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoA" name="Autocontrol" value="7">
																											<label class="custom-control-label" for="BajoA">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioA" name="Autocontrol" value="8">
																											<label class="custom-control-label" for="MedioA">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoA" name="Autocontrol" value="9">
																											<label class="custom-control-label" for="AltoA">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoA" name="Autocontrol" value="10">
																											<label class="custom-control-label" for="muyAltoA">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Motivación: </b> Disposición general para participar en las tareas que le son encomendadas.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoM" name="Motivacion" value="6">
																											<label class="custom-control-label" for="muyBajoM">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoM" name="Motivacion" value="7">
																											<label class="custom-control-label" for="BajoM">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioM" name="Motivacion" value="8">
																											<label class="custom-control-label" for="MedioM">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoM" name="Motivacion" value="9">
																											<label class="custom-control-label" for="AltoM">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoM" name="Motivacion" value="10">
																											<label class="custom-control-label" for="muyAltoM">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Adaptabilidad: </b> Capacidad para comportarse efectivamente en nuevos contextos de desempeño.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoAd" name="Adaptacion" value="6">
																											<label class="custom-control-label" for="muyBajoAd">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoAd" name="Adaptacion" value="7">
																											<label class="custom-control-label" for="BajoAd">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioAd" name="Adaptacion" value="8">
																											<label class="custom-control-label" for="MedioAd">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoAd" name="Adaptacion" value="9">
																											<label class="custom-control-label" for="AltoAd">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoAd" name="Adaptacion" value="10">
																											<label class="custom-control-label" for="muyAltoAd">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Seguridad: </b> Confianza en sí mismo para realizar actividades y resolver problemas con la certeza de ser capaz de enfrentar posibles dificultades.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoS" name="Seguridad" value="6">
																											<label class="custom-control-label" for="muyBajoS">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoS" name="Seguridad" value="7">
																											<label class="custom-control-label" for="BajoS">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioS" name="Seguridad" value="8">
																											<label class="custom-control-label" for="MedioS">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoS" name="Seguridad" value="9">
																											<label class="custom-control-label" for="AltoS">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoS" name="Seguridad" value="10">
																											<label class="custom-control-label" for="muyAltoS">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Creatividad: </b> Capacidad para proponer y emprender alternativas pertinentes para hacer más eficiente el propio trabajo y el de otros.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoCr" name="Creatividad" value="6">
																											<label class="custom-control-label" for="muyBajoCr">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoCr" name="Creatividad" value="7">
																											<label class="custom-control-label" for="BajoCr">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioCr" name="Creatividad" value="8">
																											<label class="custom-control-label" for="MedioCr">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoCr" name="Creatividad" value="9">
																											<label class="custom-control-label" for="AltoCr">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoCr" name="Creatividad" value="10">
																											<label class="custom-control-label" for="muyAltoCr">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Cooperación: </b> Disponibilidad para trabajar en equipo y comprometerse con las responsabilidades y en las tareas que se deriven de ello.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoCoo" name="Cooperacion" value="6">
																											<label class="custom-control-label" for="muyBajoCoo">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoCoo" name="Cooperacion" value="7">
																											<label class="custom-control-label" for="BajoCoo">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioCoo" name="Cooperacion" value="8">
																											<label class="custom-control-label" for="MedioCoo">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoCoo" name="Cooperacion" value="9">
																											<label class="custom-control-label" for="AltoCoo">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoCoo" name="Cooperacion" value="10">
																											<label class="custom-control-label" for="muyAltoCoo">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Apego a normas: </b> Capacidad para entender y cumplir sus obligaciones como (PUESTO) en concordancia con la normatividad y reglamentos aplicables.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoAn" name="ApNormas" value="6">
																											<label class="custom-control-label" for="muyBajoAn">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoAn" name="ApNormas" value="7">
																											<label class="custom-control-label" for="BajoAn">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioAn" name="ApNormas" value="8">
																											<label class="custom-control-label" for="MedioAn">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoAn" name="ApNormas" value="9">
																											<label class="custom-control-label" for="AltoAn">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoAn" name="ApNormas" value="10">
																											<label class="custom-control-label" for="muyAltoAn">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Visión Comunitaria: </b> Disposición para tomar decisiones pertinentes con base en el análisis de creencias, prácticas y necesidades de la Comunidad.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoVc" name="VisCom" value="6">
																											<label class="custom-control-label" for="muyBajoVc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoVc" name="VisCom" value="7">
																											<label class="custom-control-label" for="BajoVc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioVc" name="VisCom" value="8">
																											<label class="custom-control-label" for="MedioVc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoVc" name="VisCom" value="9">
																											<label class="custom-control-label" for="AltoVc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoVc" name="VisCom" value="10">
																											<label class="custom-control-label" for="muyAltoVc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																				    </tbody>
																						<thead>
																				      <tr>
																				        <th>Competencias laborales</th>
																				        <th> Muy bajo </th>
																								<th> Bajo </th>
																								<th> Medio </th>
																								<th> Alto </th>
																				        <th> Muy Alto </th>
																				      </tr>
																				    </thead>
																						<tbody>
																							<tr>
																				        <td>
																				        	<b> Planeación: </b> Capacidad para definir rutas apropiadas de acción en correspondencia con las rutinas y  retos enfrentados.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoP" name="Planeacion" value="6">
																											<label class="custom-control-label" for="muyBajoP">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoP" name="Planeacion" value="7">
																											<label class="custom-control-label" for="BajoP">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioP" name="Planeacion" value="8">
																											<label class="custom-control-label" for="MedioP">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoP" name="Planeacion" value="9">
																											<label class="custom-control-label" for="AltoP">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoP" name="Planeacion" value="10">
																											<label class="custom-control-label" for="muyAltoP">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Organización: </b> Capacidad para estructurar anticipadamente procesos y tareas en general, con base en sus interrelaciones, disponiéndolos de acuerdo con criterios de efectividad.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoO" name="Organizacional" value="6">
																											<label class="custom-control-label" for="muyBajoO">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoO" name="Organizacional" value="7">
																											<label class="custom-control-label" for="BajoO">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioO" name="Organizacional" value="8">
																											<label class="custom-control-label" for="MedioO">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoO" name="Organizacional" value="9">
																											<label class="custom-control-label" for="AltoO">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoO" name="Organizacional" value="10">
																											<label class="custom-control-label" for="muyAltoO">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Seguimiento de instrucciones: </b> Capacidad de dar cumplimiento a las disposiciones operativas definidas por los superiores jerárquicos, con el fin de contribuir al cumplimiento de objetivos institucionales aunque éstos se opongan al  punto de vista personal.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoSi" name="SegInst" value="6">
																											<label class="custom-control-label" for="muyBajoSi">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoSi" name="SegInst" value="7">
																											<label class="custom-control-label" for="BajoSi">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioSi" name="SegInst" value="8">
																											<label class="custom-control-label" for="MedioSi">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoSi" name="SegInst" value="9">
																											<label class="custom-control-label" for="AltoSi">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoSi" name="SegInst" value="10">
																											<label class="custom-control-label" for="muyAltoSi">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Liderazgo: </b> Habilidad para integrar y orientar acciones y puntos de vista de los demás, favoreciendo la apropiación y cumplimiento grupal de objetivos institucionales.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoL" name="Liderazgo" value="6">
																											<label class="custom-control-label" for="muyBajoL">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoL" name="Liderazgo" value="7">
																											<label class="custom-control-label" for="BajoL">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioL" name="Liderazgo" value="8">
																											<label class="custom-control-label" for="MedioL">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoL" name="Liderazgo" value="9">
																											<label class="custom-control-label" for="AltoL">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoL" name="Liderazgo" value="10">
																											<label class="custom-control-label" for="muyAltoL">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Responsabilidad: </b> Capacidad para hacerse cargo de actividades y asumir las consecuencias positivas o negativas derivadas de las acciones ejecutadas.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoR" name="Responsabilidad" value="6">
																											<label class="custom-control-label" for="muyBajoR">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoR" name="Responsabilidad" value="7">
																											<label class="custom-control-label" for="BajoR">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioR" name="Responsabilidad" value="8">
																											<label class="custom-control-label" for="MedioR">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoR" name="Responsabilidad" value="9">
																											<label class="custom-control-label" for="AltoR">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoR" name="Responsabilidad" value="10">
																											<label class="custom-control-label" for="muyAltoR">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Ejecución simultánea: </b> Capacidad para desempeñarse efectivamente en diversas tareas y proyectos cumpliendo con los objetivos de todas ellas.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoEs" name="EjSim" value="6">
																											<label class="custom-control-label" for="muyBajoEs">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoEs" name="EjSim" value="7">
																											<label class="custom-control-label" for="BajoEs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioEs" name="EjSim" value="8">
																											<label class="custom-control-label" for="MedioEs">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoEs" name="EjSim" value="9">
																											<label class="custom-control-label" for="AltoEs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoEs" name="EjSim" value="10">
																											<label class="custom-control-label" for="muyAltoEs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Confiabilidad: </b> Grado de confianza que una persona muestra por su conducta y actuar en tareas desempeñadas.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoCon" name="Confiabilidad" value="6">
																											<label class="custom-control-label" for="muyBajoCon">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoCon" name="Confiabilidad" value="7">
																											<label class="custom-control-label" for="BajoCon">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioCon" name="Confiabilidad" value="8">
																											<label class="custom-control-label" for="MedioCon">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoCon" name="Confiabilidad" value="9">
																											<label class="custom-control-label" for="AltoCon">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoCon" name="Confiabilidad" value="10">
																											<label class="custom-control-label" for="muyAltoCon">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Responsabilidad social: </b> Capacidad para aceptar el impacto positivo y/o negativo de la propia conducta en la sociedad.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoRs" name="ResSocial" value="6">
																											<label class="custom-control-label" for="muyBajoRs">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoRs" name="ResSocial" value="7">
																											<label class="custom-control-label" for="BajoRs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioRs" name="ResSocial" value="8">
																											<label class="custom-control-label" for="MedioRs">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoRs" name="ResSocial" value="9">
																											<label class="custom-control-label" for="AltoRs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoRs" name="ResSocial" value="10">
																											<label class="custom-control-label" for="muyAltoRs">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Manejo de conflictos: </b> Capacidad para entender y resolver apropiadamente problemas vinculados con su ejercicio laboral o, en su caso, minimizar su impacto a efecto de dar cumplimiento a los objetivos institucionales.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoMc" name="ManCon" value="6">
																											<label class="custom-control-label" for="muyBajoMc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoMc" name="ManCon" value="7">
																											<label class="custom-control-label" for="BajoMc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioMc" name="ManCon" value="8">
																											<label class="custom-control-label" for="MedioMc">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoMc" name="ManCon" value="9">
																											<label class="custom-control-label" for="AltoMc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoMc" name="ManCon" value="10">
																											<label class="custom-control-label" for="muyAltoMc">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Rendimiento bajo presión: </b> Capacidad para cumplir con los objetivos institucionales pese a realizar sus tareas laborales en condiciones potencialmente estresantes.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoRbp" name="RenPre" value="6">
																											<label class="custom-control-label" for="muyBajoRbp">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoRbp" name="RenPre" value="7">
																											<label class="custom-control-label" for="BajoRbp">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioRbp" name="RenPre" value="8">
																											<label class="custom-control-label" for="MedioRbp">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoRbp" name="RenPre" value="9">
																											<label class="custom-control-label" for="AltoRbp">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoRbp" name="RenPre" value="10">
																											<label class="custom-control-label" for="muyAltoRbp">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Trabajo en equipo: </b> Capacidad para integrarse cordial y efectivamente en tareas conjuntas con sus compañeros de trabajo, a efecto de cumplir con objetivos institucionales.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoTe" name="TraEqui" value="6">
																											<label class="custom-control-label" for="muyBajoTe">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoTe" name="TraEqui" value="7">
																											<label class="custom-control-label" for="BajoTe">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioTe" name="TraEqui" value="8">
																											<label class="custom-control-label" for="MedioTe">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoTe" name="TraEqui" value="9">
																											<label class="custom-control-label" for="AltoTe">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoTe" name="TraEqui" value="10">
																											<label class="custom-control-label" for="muyAltoTe">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Asertividad: </b> Capacidad para expresar sus convicciones, necesidades y puntos de vista, sin agredir ni someterse, en virtud de las características del contexto en que se desempeña.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoAser" name="Asertividad" value="6">
																											<label class="custom-control-label" for="muyBajoAser">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoAser" name="Asertividad" value="7">
																											<label class="custom-control-label" for="BajoAser">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioAser" name="Asertividad" value="8">
																											<label class="custom-control-label" for="MedioAser">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoAser" name="Asertividad" value="9">
																											<label class="custom-control-label" for="AltoAser">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoAser" name="Asertividad" value="10">
																											<label class="custom-control-label" for="muyAltoAser">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																							<tr>
																				        <td>
																				        	<b> Empuje: </b> Capacidad para mantener en un nivel promedio el vigor y ritmo de trabajo para dar cumplimiento a criterios de logro institucionales.
																				        </td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyBajoEm" name="Empuje" value="6">
																											<label class="custom-control-label" for="muyBajoEm">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="BajoEm" name="Empuje" value="7">
																											<label class="custom-control-label" for="BajoEm">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																									<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="MedioEm" name="Empuje" value="8">
																											<label class="custom-control-label" for="MedioEm">  </label>
																								  	</div>
																									</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="AltoEm" name="Empuje" value="9">
																											<label class="custom-control-label" for="AltoEm">  </label>
																								  	</div>
																							  	</center>
																								</td>
																								<td>
																							  	<center>
																										<div class="custom-control custom-radio custom-control-inline">
																								    	<input type="radio" class="custom-control-input" id="muyAltoEm" name="Empuje" value="10">
																											<label class="custom-control-label" for="muyAltoEm">  </label>
																								  	</div>
																							  	</center>
																								</td>
																				      </tr>
																						</tbody>
																						<tr>
																							<td colspan="6">
																								<div class="form-group">
																									<label for="Comentarios"> Comentarios: </label>
																									<textarea name="Comentarios" id="Comentarios" class="form-control" rows="8" cols="80" required></textarea>
																								</div>
																							</td>
																						</tr>
																				  </table>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-evaluation-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer"></div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- visitas -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-v-down">
													<p> Visitas <img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-v-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-v">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-v">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Visita </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_visit()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/generate-visit" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-visit-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6">
																						<div class="form-group">
																					    <label for="visitante_vi"> Visitante(s) </label>
																							<input id="visitante_vi" type="text" class="form-control" name="visitante_vi" value="" required placeholder="nombre(s) completo">
																					  </div>
																				  </div>
																					<div class="ap-class-4" style="display: none;">
																						<div class="form-group">
																					    <label for="departamento_vi"> Departamento </label>
																							<input type="text" class="form-control" id="departamento_vi" name="departamento_vi" value="<?= $tbl_em -> id_em ?>"  readonly required>
																					  </div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="fecha_vi"> Fecha: </label>
																							<input type="date" class="form-control" id="fecha_vi" name="fecha_vi" value="" required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="hora_vi"> Hora: </label>
																							<input type="time" class="form-control" id="hora_vi" name="hora_vi" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="motivo_vi"> Motivo </label>
																							<center> <textarea name="motivo_vi" class="form-control" id="motivo_vi" rows="3" cols="80" required></textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<!-- <li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-exit-pass-of-my-team">
																<p> Ver los pases de mi equipo <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li> -->
													</ul>
												</div>
											</div>
										</div>
										<!-- pase de salida -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
													<p> Pase de salida <img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-ps">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-ps">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Pase de salida </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_exit_pass()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/generate-exit-pass" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-exit-pass-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-9">
																						<div class="form-group">
																					    <label for="empleado_p_s"> Empleado </label>
																							<select class="form-control" id="empleado_p_s" name="empleado_p_s" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="hora_p_s"> Hora: </label>
																							<input type="time" class="form-control" id="hora_p_s" name="hora_p_s" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="motivo_p_s"> Motivo </label>
																							<center> <textarea name="motivo_p_s" class="form-control" id="motivo_p_s" rows="3" cols="80" required></textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-exit-pass-of-my-team">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- permisos -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
													<p> Permisos <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
												</a>
											</div>
											<div id="ap-p-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-p">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-p">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Permiso </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_permission()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/add-permissions" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-permission-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																					    <label for="selectempleado"> Empleado </label>
																							<select class="form-control" id="selectempleadoper" name="selectempleado" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-3">
																						<div class="form-group">
																							<label for="horas"> Número de Horas </label>
																							<input type="number" class="form-control" id="horas" name="horas" value="" readonly required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="horastart"> De: </label>
																							<input type="time" class="form-control" id="horastart" name="horastart" value="" required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="horaend"> A: </label>
																							<input type="time" class="form-control" id="horaend" name="horaend" value="" required>
																						</div>
																				  </div>
																					<div class="ap-class-3">
																						<div class="form-group">
																							<label for="FPermiso"> Fecha de Permiso </label>
																							<input type="date" class="form-control" id="FPermiso" name="FPermiso" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="Motivo"> Motivo </label>
																							<center> <textarea name="Motivo" class="form-control" id="Motivo" rows="3" cols="80" required></textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-permissions-of-my-team">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- permisos urgentes -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
													<p>
														Permisos urgentes
														<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
													</p>
												</a>
											</div>
											<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-pu">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_AV.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
															<div class="modal fade" id="ap-modal-pu">
																<div class="modal-dialog modal-lg modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header ap-gral-modal-header">
																			<h4 class="modal-title"> Permiso urgente </h4>
																			<button type="button" class="close" data-dismiss="modal">
																				<i class='fas fa-times ap-gral-fa-times'></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form class="" onsubmit="return validate_urgent_permission()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/generate-urgent-permission" method="post">
																				<div class="row">
																				  <div class="ap-class-12">
																				    <span id="ap-urgent-permission-error">  </span>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-8">
																						<div class="form-group">
																					    <label for="selectempleadoperU"> Empleado </label>
																							<select class="form-control" id="selectempleadoperU" name="selectempleadoperU" required>
																								<option value="selecciona-un-empleado"> Selecciona un empleado </option>
																								<?php foreach ($tbl_e as $row){ ?>
																									<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?php print_r($row -> apellido_paterno_e.' '. $row -> apellido_materno_e.' '.$row -> nombre_e) ?> </option>
																								<?php } ?>
																							</select>
																					  </div>
																				  </div>
																					<div class="ap-class-4">
																						<div class="form-group">
																							<label for="horaPerU"> Hora: </label>
																							<input type="time" class="form-control" id="horaPerU" name="horaPerU" value="" required>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-12">
																						<div class="form-group">
																							<label for="MotivoPerU"> Motivo </label>
																							<center> <textarea name="MotivoPerU" class="form-control" id="MotivoPerU" rows="3" cols="80" required></textarea> </center>
																						</div>
																				  </div>
																				</div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																						<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer ap-gral-modal-footer">
																		</div>
																	</div>
																</div>
															</div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-urgent-permissions-of-my-team">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- vacaciones -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
													<p>
														Vacaciones
														<img src="<?= base_url()?>images/Icono/ERP_Icon_GenHD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														<input id="tautvacacion" type="hidden" name="tautvacacion" value="0">
													</p>
												</a>
											</div>
											<div id="ap-va-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-the-holidays-of-my-team">
																<p> Autorizar <img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- vacantes -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-vac-down">
													<p>
														Vacantes
														<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														<input id="tentrevista" type="hidden" name="tentrevista" value="0">
													</p>
												</a>
											</div>
											<div id="ap-vac-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-vac">
																<p> Generar <img src="<?= base_url()?>images/Icono/ERP_Icon_AV.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														  <div class="modal fade" id="ap-modal-vac">
														    <div class="modal-dialog modal-dialog-centered modal-xl">
														      <div class="modal-content">
														        <div class="modal-header ap-gral-modal-header">
														          <h4 class="modal-title"> Nueva Vacante </h4>
														          <button type="button" class="close" data-dismiss="modal">
														          	<i class='fas fa-times ap-gral-fa-times'></i>
														          </button>
														        </div>
														        <div class="modal-body">
														          <form class="" onsubmit="return validate_vacancy()" action="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/add-job-vacancy" method="post">
																				<div class="container-fluid">
																					<div class="row">
																					  <div class="ap-class-12">
																					    <span id="ap-vacant-error">  </span>
																					  </div>
																					</div>
															          	<div class="row">
															          	  <div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="Puesto"> Puesto: </label>
																								<select class="form-control" name="Puesto" id="Puesto" required>
																									<option value="selecciona-el-puesto"> Selecciona el puesto: </option>
																									<?php foreach ($tbl_pue as $row){ ?>
																										<option value="<?= $row -> id_pue ?>"> <?= $row -> puesto_pue ?> </option>
																									<?php } ?>
																								</select>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="empleados_va"> Numero de empleados: </label>
																								<input type="number" name="empleados_va" class="form-control" id="empleados_va" required>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="LTrabajo"> Lugar de Trabajo: </label>
																								<input type="text" name="LTrabajo" class="form-control" id="LTrabajo" required>
																							</div>
															          	  </div>
																						<div class="ap-class-3-3-6-12">
																							<div class="form-group">
																								<label for="Sueldo"> Sueldo: </label>
																								<input type="number" name="Sueldo" class="form-control" id="Sueldo" required>
																							</div>
															          	  </div>
															          	</div>
																					<div class="row">
																					  <div class="ap-class-4">
																							<div class="form-group">
																								<label for="aDesempenae"> Actividades a desempeñar: </label>
																								<textarea name="aDesempenae" rows="8" cols="80" class="form-control" id="aDesempenae" required></textarea>
																							</div>
																					  </div>
																						<div class="ap-class-4">
																							<div class="form-group">
																								<label for="Requisitos"> Requisitos: </label>
																								<textarea name="Requisitos" rows="8" cols="80" class="form-control" id="Requisitos" required></textarea>
																							</div>
																					  </div>
																						<div class="ap-class-4">
																							<div class="form-group">
																								<label for="FLimite"> Fecha limite: </label>
																								<input type="date" class="form-control" name="FLimite" id="FLimite" required>
																							</div>
																					  </div>
																					</div>
															          </div>
																				<div class="row">
																				  <div class="ap-class-6 offset-3">
																				    <input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
																				  </div>
																				</div>
														          </form>
														        </div>
														        <div class="modal-footer ap-gral-modal-footer">
														        </div>
														      </div>
														    </div>
														  </div>
														</li>
														<li class="list-group-item">
															<a class="collapsed card-link" href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-my-job-vacancies">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VMV.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- Entrevista -->
										<div class="card">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
													<p>
														Entrevistas
														<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
													</p>
												</a>
											</div>
											<div id="ap-en-down" class="collapse" data-parent="#ap-menu-gerente">
												<div class="card-body">
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<a href="<?= base_url()?>Gerentedearea/<?= $tbl_em_ruta ?>/view-interview">
																<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									<?php } ?>
							  </div>
						  </div>
						</div>
					</div>
