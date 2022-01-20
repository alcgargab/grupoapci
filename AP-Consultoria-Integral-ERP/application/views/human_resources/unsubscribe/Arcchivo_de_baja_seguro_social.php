					<div class="homeClass">
						<div class="container-fluid">
							<div class="row">
							  <div class="Class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/unsubscribe">
													Lista de empleados
												</a>
											</li>
									    <li class="breadcrumb-item active" aria-current="page">
												Empleado
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<div class="row">
								<div class="Class-12">
									<form class="" onsubmit="return bajaIMSS()" action="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/download-cancel-social-security/<?= $empleado -> NumEmpMd5?>" method="post">
										<div class="row">
											<div class="Class-12">
												<center> <h1> Baja de Seguro Social IMSS </h1> </center>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<center> <span id="errorBajaIMSS">  </span> </center>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<h3> Datos generales </h3>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="Class-6-6-6-12">
												<div class="form-group">
													<label for="empresacon"> Empresa contratante: </label>
													<input type="text" class="form-control" name="empresacon" id="empresacon" value="" required>
												</div>
											</div>
											<div class="Class-6-6-6-12">
												<div class="form-group">
													<label for="empresa"> Empresa: </label>
													<input type="text" class="form-control" name="empresa" id="empresa" value="<?= $empresa -> Empresa ?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="area"> Área: </label>
													<input type="text" class="form-control" name="area" id="area" value="<?= $area -> area ?>" readonly>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="departamento"> Departamento: </label>
													<input type="text" class="form-control" name="departamento" id="departamento" value="" value="" required>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="Puesto"> Puesto: </label>
													<input type="text" class="form-control" name="Puesto" id="Puesto" value="<?= $puesto -> Puesto ?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-2-2-2-12">
												<div class="form-group">
													<label for="NumEmp"> N° de empleado: </label>
													<input type="text" class="form-control" name="NumEmp" id="NumEmp" value="<?= $empleado -> NumEmp ?>" readonly>
												</div>
											</div>
											<div class="Class-5-5-5-12">
												<div class="form-group">
													<label for="nombre"> Nombre: </label>
													<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $empleado -> ApellidoPEmp." ".$empleado -> ApellidoMEmp." ".$empleado -> NomEmp?>" readonly>
												</div>
											</div>
											<div class="Class-5-5-5-12">
												<div class="form-group">
													<label for="jInmediato"> Jefe Inmediato: </label>
													<input type="text" class="form-control" name="jInmediato" id="jInmediato" value="<?= $empresa -> JInmediato?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<h3> Baja de personal </h3>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="FBaja"> Fecha de baja: </label>
													<input type="date" class="form-control" name="FBaja" id="FBaja" required>
												</div>
											</div>
											<div class="Class-8-8-8-12">
												<div class="form-group">
													<label> Motivo de la baja: </label>
													<br>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoR" name="motivoR">
														<label class="custom-control-label" for="motivoR"> Renuncia </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoD" name="motivoD">
														<label class="custom-control-label" for="motivoD"> Despido </label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
											  <center> <h4> Motivos </h4> </center>
											</div>
										</div>
										<hr>
										<div class="row">
										  <div class="Class-6-6-6-12">
												<div class="form-group">
													<label> Renuncia: </label>
													<br>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoROE" name="motivoROE">
														<label class="custom-control-label" for="motivoROE"> Otro Empleo </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoRMP" name="motivoRMP">
														<label class="custom-control-label" for="motivoRMP"> Mot. Personales </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoRE" name="motivoRE">
														<label class="custom-control-label" for="motivoRE"> Estudios </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoRD" name="motivoRD">
														<label class="custom-control-label" for="motivoRD"> Desacuerdo </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoRO" name="motivoRO">
														<label class="custom-control-label" for="motivoRO"> Otro* </label>
													</div>
												</div>
										  </div>
											<div class="Class-6-6-6-12">
												<div class="form-group">
													<label> Despido: </label>
													<br>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDI" name="motivoDI">
														<label class="custom-control-label" for="motivoDI"> Indisciplina </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDD" name="motivoDD">
														<label class="custom-control-label" for="motivoDD"> Deshonestidad </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDA" name="motivoDA">
														<label class="custom-control-label" for="motivoDA"> Ausentismo </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDN" name="motivoDN">
														<label class="custom-control-label" for="motivoDN"> Negligencia </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDIn" name="motivoDIn">
														<label class="custom-control-label" for="motivoDIn"> Incumplimiento </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="motivoDO" name="motivoDO">
														<label class="custom-control-label" for="motivoDO"> Otro* </label>
													</div>
												</div>
										  </div>
										</div>
										<br>
										<div class="row">
											<div class="Class-6 offset-3">
												<button type="submit" class="btn btn-block ap-gral-btn"> Generar </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
