					<div class="ap-home-class">
						<div class="container-fluid">
							<?php if ($tbl_e != "") { ?>
								<div class="row">
								  <div class="ap-class-12">
										<nav aria-label="breadcrumb">
										  <ol class="breadcrumb ap-bread">
										    <li class="breadcrumb-item">
													<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-employee">
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
									<div class="ap-class-12">
										<div class="contanier">
											<div class="row">
												<div class="ap-class-3-3-3-12">
													<?php if($tbl_e -> foto_empleado_e != ""){ ?>
														<img class="imgUser" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?= $tbl_e -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="230px" height="300px">
													<?php } ?>
												</div>
												<div class="ap-class-9-9-9-12">
													<div id="accordionInfo">
														<?php if ($this -> session -> user == "DTrheo"){ ?>
															<!-- información personal -->
															<div class="card">
																<div class="card-header">
																	<a class="card-link" data-toggle="collapse" href="#ap-información-personal-down">
																		<h1> Información Personal
																			<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																		</h1>
																	</a>
																</div>
																<div id="ap-información-personal-down" class="collapse show" data-parent="#accordionInfo">
																	<form class="" onsubmit="return validate_personal_data()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/edit-personal-information-of-an-employee/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
																		<div class="card-body">
																			<div class="row">
																				<div class="ap-class-3-3-6-12">
																					<div class="form-group">
																						<label for=""> Número de empleado: </label>
																						<input type="text" class="form-control" value="<?= $tbl_e -> numero_empleado_e ?>" readonly>
																					</div>
																				</div>
																				<div class="ap-class-3-3-6-12">
																					<div class="form-group">
																						<label for="apellido_paterno"> Apellido paterno: </label>
																						<input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?= $tbl_e -> apellido_paterno_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-3-3-6-12">
																					<div class="form-group">
																						<label for="apellido_materno"> Apellido materno: </label>
																						<input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?= $tbl_e -> apellido_materno_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-3-3-6-12">
																					<div class="form-group">
																						<label for="nombre"> Nombre: </label>
																						<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tbl_e -> nombre_e ?>" required>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="numero_casa"> Teléfono de casa: </label>
																						<input type="tel" class="form-control" id="numero_casa" name="numero_casa" value="<?php
																						if (isset($tbl_e -> numero_casa_e)) {
																							print_r($tbl_e -> numero_casa_e);
																						}else {
																							print_r('Sin teléfono');
																						}
																						?>" pattern="[0-9]{10}" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="numero_celular"> Teléfono celular: </label>
																						<input type="tel" class="form-control" id="numero_celular" name="numero_celular" value="<?php
																						if (isset($tbl_e -> numero_celular_e)) {
																							print_r($tbl_e -> numero_celular_e);
																						}else {
																							print_r('Sin teléfono');
																						}
																						?>" pattern="[0-9]{10}">
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="email"> Correo electrónico: </label>
																						<input type="email" class="form-control" id="email" name="email" value="<?= $tbl_e -> email_e ?>" required>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="genero"> Genero: </label>
																						<input type="text" class="form-control" id="genero" name="genero" value="<?= $tbl_e -> genero_g ?>" readonly>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="fecha_nacimiento"> Fecha de nacimiento: </label>
																						<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $tbl_e -> fecha_nacimiento_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="edad"> Edad: </label>
																						<input type="number" class="form-control" id="edad" name="edad" value="<?= $tbl_e -> edad_e ?>" readonly>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="rfc"> RFC: </label>
																						<input type="text" class="form-control" id="rfc" name="rfc" value="<?= $tbl_e -> rfc_e ?>" pattern="[0-9a-zA-Z]{13}" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="curp"> CURP: </label>
																						<input type="text" class="form-control" id="curp" name="curp" value="<?= $tbl_e -> curp_e ?>" pattern="[0-9a-zA-Z]{18}" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="imss"> Número del IMSS: </label>
																						<input type="text" class="form-control" id="imss" name="imss" value="<?= $tbl_e -> imss_e ?>" pattern="[0-9]{11}" required>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-12">
																					<span id="error_personal_data"> </span>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-6 offset-3">
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																						<button type="submit"  class="btn btn-block ap-gral-btn btnRuta" name="btnEditInfoP"> Editar </button>
																					<?php } ?>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<hr>
															<!-- domicilio -->
															<div class="card">
																<div class="card-header">
																	<a class="card-link" data-toggle="collapse" href="#ap-informacion-del-domicilio-down">
																		<h1> Domicilio
																			<img src="<?= base_url()?>images/Icono/ERP_Icon_Dom.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																		</h1>
																	</a>
																</div>
																<div id="ap-informacion-del-domicilio-down" class="collapse" data-parent="#accordionInfo">
																	<form class="" onsubmit="return validate_address_information()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/edit-address-information-of-an-employee/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
																		<div class="card-body">
																			<div class="row">
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="calle"> Calle: </label>
																						<input type="text" class="form-control" id="calle" name="calle" value="<?= $tbl_e -> calle_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="numero_exterior"> Número exterior: </label>
																						<input type="text" class="form-control" id="numero_exterior" name="numero_exterior" value="<?= $tbl_e -> numero_exterior_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="numero_interior"> Número interior: </label>
																						<input type="text" class="form-control" id="numero_interior" name="numero_interior" value="<?= $tbl_e -> numero_interior_e ?>" required>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="colonia"> Colonia: </label>
																						<input type="text" class="form-control" id="colonia" name="colonia" value="<?= $tbl_e -> colonia_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="municipio"> Delegación o municipio: </label>
																						<input type="text" class="form-control" id="municipio" name="municipio" value="<?= $tbl_e -> municipio_e ?>" required>
																					</div>
																				</div>
																				<div class="ap-class-4-4-6-12">
																					<div class="form-group">
																						<label for="cp"> C.P.: </label>
																						<input type="number" class="form-control" id="cp" name="cp" value="<?= $tbl_e -> cp_e ?>" required>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-12">
																					<span id="error_address_information">  </span>
																				</div>
																			</div>
																			<div class="row">
																				<div class="ap-class-6 offset-3">
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																						<button type="submit" class="btn btn-block ap-gral-btn btnRuta" name="btnEditInfoD"> Editar </button>
																					<?php } ?>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<hr>
														<?php } ?>
														<!-- información empresarial -->
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#ap-informacion-empresarial-down">
																	<h1> Información empresarial
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoE.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="ap-informacion-empresarial-down" class="collapse" data-parent="#accordionInfo">
																<form class="" onsubmit="return validate_company_data()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/edit-job-information-of-an-employee/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
																	<div class="card-body">
																		<div class="row">
																		  <div class="ap-class-6">
																				<div class="form-group">
																					<label for="lugar_trabajo"> Área de trabajo: </label>
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																					<input type="text" class="form-control" name="lugar_trabajo" id="lugar_trabajo" value="<?= $tbl_e -> lugar_trabajo_e ?>" required>
																				<?php } else { ?>
																					<input type="text" class="form-control" name="lugar_trabajo" id="lugar_trabajo" value="<?= $tbl_e -> lugar_trabajo_e ?>" readonly>
																				<?php } ?>
																				</div>
																		  </div>
																			<div class="ap-class-6">
																				<div class="form-group">
																					<label for=""> Puesto: </label>
																					<input type="text" class="form-control" value="<?= $tbl_e -> puesto_pue ?>" readonly>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-6">
																				<div class="form-group">
																					<label for="numero_cuenta"> Número de cuenta: </label>
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																						<input type="number" class="form-control" name="numero_cuenta" id="numero_cuenta" value="<?= $tbl_e -> numero_cuenta_e ?>" required>
																					<?php } else { ?>
																						<input type="number" class="form-control" name="numero_cuenta" id="numero_cuenta" value="<?= $tbl_e -> numero_cuenta_e ?>" readonly>
																					<?php } ?>
																				</div>
																			</div>
																			<div class="ap-class-6">
																				<div class="form-group">
																					<label for="salario_mensual_neto"> Salario mensual neto: </label>
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																					<input type="number" class="form-control" value="<?= $tbl_e -> salario_mensual_neto_e ?>" name="salario_mensual_neto" id="salario_mensual_neto" required>
																				<?php } else { ?>
																					<input type="number" class="form-control" value="<?= $tbl_e -> salario_mensual_neto_e ?>" name="salario_mensual_neto" id="salario_mensual_neto" readonly>
																				<?php } ?>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-5-5-5-12">
																				<div class="form-group">
																					<label for="fecha_ingreso"> Fecha de ingreso: </label>
																						<input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?= $tbl_e -> fecha_ingreso_e ?>" readonly>
																				</div>
																			</div>
																			<div class="ap-class-2-2-2-12">
																				<div class="form-group">
																					<label for=""> Antigedad: </label>
																					<input type="text" class="form-control" name="antiguedad" value="<?= $tbl_e -> antiguedad_e ?> años" readonly>
																				</div>
																			</div>
																			<div class="ap-class-5-5-5-12">
																				<div class="form-group">
																					<label for="fecha_proximo_contrato"> Fecha para renovar contrato: </label>
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																						<input type="date" class="form-control" id="fecha_proximo_contrato" name="fecha_proximo_contrato" value="<?= $tbl_e -> fecha_proximo_contrato_e ?>" required>
																					<?php } else { ?>
																						<input type="date" class="form-control" id="fecha_proximo_contrato" name="fecha_proximo_contrato" value="<?= $tbl_e -> fecha_proximo_contrato_e ?>" readonly>
																					<?php } ?>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-4-4-6-12">
																				<div class="form-group">
																					<label for="turno"> Turno: </label>
																					<?php if ($this -> session -> user == "DTrheo"){ ?>
																						<select class="form-control" id="turno" name="turno" required>
																							<?php foreach ($tbl_st as $row){ ?>
																								<option value="<?= $row -> id_st ?>" <?php echo ($tbl_e -> id_st == $row -> id_st ) ? 'selected' : '' ?>> <?= $row -> turno_st ?> </option>
																							<?php } ?>
																						</select>
																					<?php } else { ?>
																						<input type="hidden" class="form-control" id="turno" name="turno" value="<?php foreach ($tbl_st as $row){
																							if ($tbl_e -> id_st == $row -> id_st) {
																								print_r($row -> id_st);
																							}
																						} ?>" readonly>
																						<input type="text" class="form-control" value="<?php foreach ($tbl_st as $row){
																							if ($tbl_e -> id_st == $row -> id_st) {
																								print_r($row -> turno_st);
																							}
																						} ?>" readonly>
																					<?php } ?>
																				</div>
																			</div>
																			<div class="ap-class-4-4-6-12">
																				<div class="form-group">
																					<label for="fecha_baja"> Fecha de Baja: </label>
																					<input type="date" class="form-control" id="fecha_baja" name="fecha_baja" value="<?= $tbl_e -> fecha_baja_e ?>">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-12">
																				<div class="form-group">
																					<label for="motivo_baja"> Motivo de la Baja: </label>
																					<textarea class="form-control" id="motivo_baja" name="motivo_baja" rows="8" cols="80"><?= $tbl_e -> motivo_baja_e ?></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-12">
																				<span id="error_company_data">  </span>
																			</div>
																		</div>
																		<div class="row">
																			<div class="ap-class-6 offset-3">
																				<button type="submit"  class="btn btn-block ap-gral-btn btnRuta" name="btnEditInfoE"> Editar </button>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php }else { ?>
								<div class="row">
									<div class="ap-class-12">
										<center>
											<h1> No existe el registro </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
