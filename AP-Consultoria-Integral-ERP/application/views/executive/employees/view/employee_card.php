					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb ap-bread">
											<li class="breadcrumb-item">
												<a href="<?= base_url()?>directivo/<?= $tbl_em -> ruta_em ?>/view-employee">
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
							<?php if ($tbl_e != "") { ?>
								<div class="row">
									<div class="ap-class-12">
										<div class="contanier">
											<div class="row">
												<div class="ap-class-3-3-3-12">
													<?php if($tbl_e -> foto_empleado_e != ""){ ?>
														<center>
															<img class="imgUser" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?= $tbl_e -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="230px" height="300px">
														</center>
													<?php } ?>
												</div>
												<div class="ap-class-9-9-9-12">
													<div id="accordionInfo">
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#ap-información-personal-down">
																	<h1> Información personal
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="ap-información-personal-down" class="collapse show" data-parent="#accordionInfo">
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
																				<label for=""> Apellido paterno: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> apellido_paterno_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for=""> Apellido materno: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> apellido_materno_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for=""> Nombre: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> nombre_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Teléfono de Casa: </label>
																				<input type="tel" class="form-control" value="<?php
																				if ($tbl_e -> numero_casa_e != "") {
																					print_r($tbl_e -> numero_casa_e);
																				}else {
																					print_r('Sin teléfono');
																				}
																				?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Teléfono celular: </label>
																				<input type="tel" class="form-control" value="<?php
																				if ($tbl_e -> numero_celular_e != "") {
																					print_r($tbl_e -> numero_celular_e);
																				}else {
																					print_r('Sin teléfono');
																				}
																				?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Correo electrónico: </label>
																				<input type="text" class="form-control" value="<?php echo mb_strtolower($tbl_e -> email_e, 'UTF-8'); ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Genero: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> genero_g ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Fecha de nacimiento: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> fecha_nacimiento_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Edad: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> edad_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> RFC: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> rfc_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> CURP: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> curp_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Número del IMSS: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> imss_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#ap-informacion-del-domicilio-down">
																	<h1> Domicilio
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Dom.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="ap-informacion-del-domicilio-down" class="collapse" data-parent="#accordionInfo">
																<div class="card-body">
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Calle: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> calle_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Número exterior: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> numero_exterior_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Número interior: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> numero_interior_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Colonia: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> colonia_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Delegación o municipio: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> municipio_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> C.P.: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> cp_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#ap-informacion-empresarial-down">
																	<h1> Información Empresarial
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoE.webp" alt="AP-Consultoria-Integral-ERP" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="ap-informacion-empresarial-down" class="collapse" data-parent="#accordionInfo">
																<div class="card-body">
																	<div class="row">
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for=""> Área de trabajo: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> lugar_trabajo_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for="Empresa"> Empresa: </label>
																				<input type="text" class="form-control" value="<?= $tbl_em -> empresa_em ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for="Area"> Área: </label>
																				<input type="text" class="form-control" value="<?= $tbl_a -> area_a ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for="E_idPuesto"> Puesto: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> puesto_pue ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for=""> Número de Cuenta: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> numero_cuenta_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-6">
																			<div class="form-group">
																				<label for=""> Salario mensual neto: </label>
																				<input type="text" class="form-control" value="$<?= $tbl_e -> salario_mensual_neto_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-5-5-5-12">
																			<div class="form-group">
																				<label for=""> Fecha de ingreso: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> fecha_ingreso_e ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-2-2-2-12">
																			<div class="form-group">
																				<label for=""> Antiguedad: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> antiguedad_e ?> años" readonly>
																			</div>
																		</div>
																		<div class="ap-class-5-5-5-12">
																			<div class="form-group">
																				<label for=""> Fecha para renovar contrato: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> fecha_proximo_contrato_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for="E_idTEmp"> Turno: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> turno_st ?>" readonly>
																			</div>
																		</div>
																		<div class="ap-class-4-4-4-12">
																			<div class="form-group">
																				<label for=""> Fecha de Baja: </label>
																				<input type="text" class="form-control" value="<?= $tbl_e -> fecha_baja_e ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-12">
																			<div class="form-group">
																				<label for=""> Motivo de la Baja: </label>
																				<textarea class="form-control" rows="8" cols="80" readonly> <?php echo mb_strtolower($tbl_e -> motivo_baja_e, 'UTF-8'); ?></textarea>
																			</div>
																		</div>
																	</div>
																</div>
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
