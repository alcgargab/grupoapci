					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php if ($empleado != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
									</div>
								</div>
								<br>
								<div class="row">
							  	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="contanier">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-3 col-12">
													<?php if($empleado -> FotoEmp != ""){ ?>
														<center>
															<img class="imgUser" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?= $empleado -> FotoEmp?>" alt="<?= $empleado -> FotoEmp?>" width="230px" height="300px">
														</center>
													<?php } ?>
												</div>
												<div class="col-lg-9 col-md-9 col-sm-9 col-12">
													<div id="accordionInfo">
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#InfoPersonal">
																	<h1> Información Personal
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoP.png" alt="ERP_Icon_Con_InfoP" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="InfoPersonal" class="collapse show" data-parent="#accordionInfo">
																<div class="card-body">
																	<div class="row">
																		<div class="col-lg-3 col-md-3 col-sm-6 col-12">
																			<div class="form-group">
																				<label for="NumEmp"> Número de Empleado: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NumEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-3 col-md-3 col-sm-6 col-12">
																			<div class="form-group">
																				<label for="ApellidoPEmp"> Apellido Paterno: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> ApellidoPEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-3 col-md-3 col-sm-6 col-12">
																			<div class="form-group">
																				<label for="ApellidoMEmp"> Apellido Materno: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> ApellidoMEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-3 col-md-3 col-sm-6 col-12">
																			<div class="form-group">
																				<label for="NomEmp"> Nombre: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NomEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="NumTelCEmp"> Teléfono de Casa: </label>
																				<input type="tel" class="form-control" value="<?php
																				if ($empleado -> NumTelCEmp != "") {
																					print_r($empleado -> NumTelCEmp);
																				}else {
																					print_r('Sin teléfono');
																				}
																				?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="NumTelCeEmp"> Teléfono Celular: </label>
																				<input type="tel" class="form-control" value="<?php
																				if ($empleado -> NumTelCeEmp != "") {
																					print_r($empleado -> NumTelCeEmp);
																				}else {
																					print_r('Sin teléfono');
																				}
																				?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="CorreoElecEmp"> Correo Electrónico: </label>
																				<input type="text" class="form-control" value="<?php echo mb_strtolower($empleado -> CorreoElecEmp, 'UTF-8'); ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="E_idGenero"> Genero: </label>
																				<input type="text" class="form-control" value="<?= $genero -> Genero ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="FNacimientoEmp"> Fecha de Nacimiento: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FNacimientoEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="EdadEmp"> Edad: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> EdadEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="RFCEmp"> RFC: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> RFCEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="CURPEmp"> CURP: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> CURPEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="IMSSEmp"> Número del IMSS: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> IMSSEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#InfoDomicilio">
																	<h1> Domicilio
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Dom.png" alt="ERP_Icon_Dom" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="InfoDomicilio" class="collapse" data-parent="#accordionInfo">
																<div class="card-body">
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="CalleEmp"> Calle: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> CalleEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="NumExtEmp"> Número Exterior: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NumExtEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="NumIntEmp"> Número Interior: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NumIntEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="ColoniaEmp"> Colonia: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> ColoniaEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="MunicipioEmp"> Municipio: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> MunicipioEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="CPEmp"> C.P.: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> CPEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#InfoEmp">
																	<h1> Información Empresarial
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoE.png" alt="ERP_Icon_Con_InfoE" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="InfoEmp" class="collapse" data-parent="#accordionInfo">
																<div class="card-body">
																	<div class="row">
																	  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
																			<div class="form-group">
																				<label for="AreaT"> Área de trabajo: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> AreaT ?>" disabled>
																			</div>
																	  </div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="Empresa"> Empresa: </label>
																				<input type="text" class="form-control" value="<?= $empresa -> Empresa ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="Area"> Área: </label>
																				<input type="text" class="form-control" value="<?= $area -> Area ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="E_idPuesto"> Puesto: </label>
																				<input type="text" class="form-control" value="<?= $puesto -> Puesto ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="NumCuentaEmp"> Número de Cuenta: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NumCuentaEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="SalMenBEmp"> Salario Mensual Bruto: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> SalMenBEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="SalMenNEmp"> Salario Mensual Neto: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> SalMenNEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="OtrIngEmp"> Otros Ingresos: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> OtrIngEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="SalDEmp"> Salario Diario: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> SalDEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="SalBaCEmp"> Salario Base de Cotización: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> SalBaCEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-5 col-md-5 col-sm-5 col-12">
																			<div class="form-group">
																				<label for="FIngresoEmp"> Fecha de Ingreso: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FIngresoEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-2 col-md-2 col-sm-2 col-12">
																			<div class="form-group">
																				<label for="Antiguedad"> Antiguedad: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> Antiguedad ?> años" disabled>
																			</div>
																		</div>
																		<div class="col-lg-5 col-md-5 col-sm-5 col-12">
																			<div class="form-group">
																				<label for="FProxFirmacontrato"> Fecha para la firma del siguiente contrato: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FProxFirmacontrato ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="E_idTEmp"> Turno: </label>
																				<input type="text" class="form-control" value="<?= $turno -> Turno ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="FBajaEmp"> Fecha de Baja: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FBajaEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="col-lg-4 col-md-4 col-sm-4 col-12">
																			<div class="form-group">
																				<label for="MotivoBajaEmp"> Motivo de la Baja: </label>
																				<textarea class="form-control" rows="8" cols="80" disabled> <?php echo mb_strtolower($empleado -> MotivoBajaEmp, 'UTF-8'); ?></textarea>
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
							  	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							   		<center> <h1> No Existen registros </h1> </center>
								 	</div>
								</div>
							<?php } ?>
						</div>
					</div>
