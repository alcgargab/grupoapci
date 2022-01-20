					<div class="homeClass">
						<div class="container-fluid">
							<?php if ($empleado != "") {?>
								<div class="row">
								  <div class="Class-12">
										<div class="contanier">
											<div class="row">
												<div class="Class-3-3-3-12">
													<?php if($empleado -> FotoEmp != ""){ ?>
														<center>
															<img class="imgUser" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?= $empleado -> FotoEmp?>" alt="<?= $empleado -> FotoEmp?>" width="230px" height="300px">
														</center>
													<?php } ?>
												</div>
												<div class="Class-9-9-9-12">
													<div id="accordionInfo">
														<div class="card">
													    <div class="card-header">
													      <a class="card-link" data-toggle="collapse" href="#InfoEmp">
																	<h1> Información Empresarial
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_Con_InfoE.webp" alt="ERP_Icon_Con_InfoE" class="float-right">
																	</h1>
													      </a>
													    </div>
													    <div id="InfoEmp" class="collapse show" data-parent="#accordionInfo">
																<form class="" onsubmit="return EditarInfoEF()" action="<?= base_url()?>Finanzas/<?= $ruta ?>/edit-job-information-of-an-employee/<?= $empleado -> NumEmpMd5 ?>" method="post">
																	<input type="hidden" class="form-control" name="NumEmp" value="<?= $empleado -> NumEmp ?>">
														      <div class="card-body">
																		<div class="row">
																		  <div class="Class-12">
																		    <span id="errorEditE">  </span>
																		  </div>
																		</div>
																		<div class="row">
																			<div class="Class-12">
																				<div class="form-group">
																					<label for="E_idPuesto"> Puesto: </label>
																					<input type="text" class="form-control" value="<?= $puesto -> Puesto ?>" disabled>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="NumCuentaEmp"> Número de cuenta: </label>
																					<input type="text" class="form-control" id="NumCuentaEmp" name="NumCuentaEmp" value="<?= $empleado -> NumCuentaEmp ?>">
																				</div>
																			</div>
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="SalMenBEmp"> Salario mensual bruto: </label>
																					<input type="text" class="form-control" id="SalMenBEmp" name="SalMenBEmp" value="<?= $empleado -> SalMenBEmp ?>" disabled>
																				</div>
																			</div>
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="SalMenNEmp"> Salario mensual neto: </label>
																					<input type="text" class="form-control" id="SalMenNEmp" name="SalMenNEmp" value="<?= $empleado -> SalMenNEmp ?>">
																				</div>
																			</div>
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="OtrIngEmp"> Otros ingresos: </label>
																					<input type="text" class="form-control" id="OtrIngEmp" name="OtrIngEmp" value="<?= $empleado -> OtrIngEmp ?>">
																				</div>
																			</div>
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="SalDEmp"> Salario diario: </label>
																					<input type="text" class="form-control" id="SalDEmp" name="SalDEmp" value="<?= $empleado -> SalDEmp ?>">
																				</div>
																			</div>
																			<div class="Class-2-2-2-12">
																				<div class="form-group">
																					<label for="SalBaCEmp"> Salario base de cotización: </label>
																					<input type="text" class="form-control" id="SalBaCEmp" name="SalBaCEmp" value="<?= $empleado -> SalBaCEmp ?>">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-4-4-4-12">
																				<div class="form-group">
																					<label for="FIngresoEmp"> Fecha de ingreso: </label>
																					<input type="text" class="form-control" value="<?= $empleado -> FIngresoEmp ?>" disabled>
																				</div>
																			</div>
																			<div class="Class-4-4-4-12">
																				<div class="form-group">
																					<label for="FBajaEmp"> Fecha de baja: </label>
																					<input type="text" class="form-control" value="<?= $empleado -> FBajaEmp ?>" disabled>
																				</div>
																			</div>
																			<div class="Class-4-4-4-12">
																				<div class="form-group">
																					<label for="MotivoBajaEmp"> Motivo de la baja: </label>
																					<textarea class="form-control" rows="8" cols="80" disabled> <?php echo mb_strtolower($empleado -> MotivoBajaEmp, 'UTF-8');?></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-6 offset-3">
																				<button type="submit"  class="btn btn-block ap-gral-btn" name="btnEditInfoE" id="btnEditInfoE"> Editar </button>
																			</div>
																		</div>
														      </div>
																</form>
													    </div>
													  </div>
														<hr>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="#INfoNomina">
																	<h1> Información de Nómina
																		<img src="<?= base_url()?>images/Icono/ERP_Icon_InfNo.webp" alt="ERP_Icon_InfNo" class="float-right">
																	</h1>
																</a>
															</div>
															<div id="INfoNomina" class="collapse" data-parent="#accordionInfo">
																<form class="" onsubmit="return EditarInfoNo()" action="<?= base_url()?>Finanzas/<?= $ruta ?>/edit-payroll/<?= $empleado -> NumEmpMd5 ?>" method="post">
																	<input type="hidden" class="form-control" name="N_IdE" value="<?= $empleado -> NumEmp ?>">
																	<div class="card-body">
																		<div class="row">
																			<div class="Class-12">
																				<span id="errorNo">  </span>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-6">
																				<div class="form-group">
																					<label for="NacEstadoCodigo"> Código de estado de nacimiento: </label>
																						<select class="form-control" name="NacEstadoCodigo" id="NacEstadoCodigo">
																							<option value="selecciona-una-opcion"> Selecciona una opción </option>
																							<?php if ($noempleado != ""){
																								foreach ($noestados as $row){ ?>
																									<option value="<?= $row -> IdNE ?>" <?php if ($noempleado -> NacEstadoCodigo == $row -> IdNE){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																								<?php }
																							}
																							else {
																								foreach ($noestados as $row){ ?>
																									<option value="<?= $row -> IdNE ?>"> <?= $row -> Nombre ?> </option>
																								<?php }
																							} ?>
																						</select>
																				</div>
																			</div>
																			<div class="Class-6">
																				<div class="form-group">
																					<label for="EmpresaCodigo"> Código de la empresa: </label>
																					<input type="text" class="form-control" id="EmpresaCodigo" name="EmpresaCodigo" value="<?php if ($noempleado != "") {
																						print_r($noempleado -> EmpresaCodigo);
																					}else {
																						print_r('Sin Registro');
																					} ?>">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="RegPatronCodigo"> Registro patronal de la empresa: </label>
																					<input type="text" class="form-control" id="RegPatronCodigo" name="RegPatronCodigo" value="<?php if ($noempleado != "") {
																						print_r($noempleado -> RegPatronCodigo);
																					}else {
																						print_r('Sin Registro');
																					} ?>">
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="PuestoCodigo"> Código del puesto: </label>
																					<select class="form-control" id="PuestoCodigo" name="PuestoCodigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($nopuestos as $row){ ?>
																								<option value="<?= $row -> IdNP ?>" <?php if ($noempleado -> PuestoCodigo == $row -> IdNP){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($nopuestos as $row){ ?>
																								<option value="<?= $row -> IdNP ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="Nivel1Codigo"> Código del departamento: </label>
																					<select class="form-control" id="Nivel1Codigo" name="Nivel1Codigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($nodepartamento as $row){ ?>
																								<option value="<?= $row -> IdND ?>" <?php if ($noempleado -> Nivel1Codigo == $row -> IdND){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($nodepartamento as $row){ ?>
																								<option value="<?= $row -> IdND ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="UbicacionCodigo"> Código de la ubicación: </label>
																					<select class="form-control" id="UbicacionCodigo" name="UbicacionCodigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($noubicaciones as $row){ ?>
																								<option value="<?= $row -> IdNU ?>" <?php if ($noempleado -> UbicacionCodigo == $row -> IdNU){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($noubicaciones as $row){ ?>
																								<option value="<?= $row -> IdNU ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="TipoNominaCodigo"> Código de tipo de nómina: </label>
																					<select class="form-control" id="TipoNominaCodigo" name="TipoNominaCodigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($nonomina as $row){ ?>
																								<option value="<?= $row -> IdNN ?>" <?php if ($noempleado -> TipoNominaCodigo == $row -> IdNN){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($nonomina as $row){ ?>
																								<option value="<?= $row -> IdNN ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="TurnoCodigo"> Código de turno: </label>
																					<select class="form-control" id="TurnoCodigo" name="TurnoCodigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($noturnos as $row){ ?>
																								<option value="<?= $row -> IdNT ?>" <?php if ($noempleado -> TurnoCodigo == $row -> IdNT){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($noturnos as $row){ ?>
																								<option value="<?= $row -> IdNT ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="PaqueteCodigo"> Código del paquete de prestaciones: </label>
																					<input type="text" class="form-control" id="PaqueteCodigo" name="PaqueteCodigo" value="<?php if ($noempleado != "") {
																						print_r($noempleado -> PaqueteCodigo);
																					}else {
																						print_r('Sin Registro');
																					} ?>">
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="Salario"> Salario: </label>
																					<input type="text" class="form-control" id="Salario" value="<?php print_r($empleado -> SalDEmp)?>" disabled>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="SalPerVar"> Último promedio de variables calculado: </label>
																					<input type="text" class="form-control" id="SalPerVar" name="SalPerVar" value="<?php if ($noempleado != "") {
																						print_r($noempleado -> SalPerVar);
																					}else {
																						print_r('Sin Registro');
																					} ?>">
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="SalInt"> Salario diario integrado: </label>
																					<input type="text" class="form-control" id="SalInt" name="SalInt" value="<?php if ($noempleado != "") {
																						print_r($noempleado -> SalInt);
																					}else {
																						print_r('Sin Registro');
																					} ?>">
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="EmpCuenta"> Número de cuenta bancaria: </label>
																					<input type="text" class="form-control" id="EmpCuenta" value="<?= print_r($empleado -> NumCuentaEmp)?>" disabled>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="EmpPago"> Forma en que se hace el pago: </label>
																					<select class="form-control" id="EmpPago" name="EmpPago">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($nopago as $row){ ?>
																								<option value="<?= $row -> IdNPa ?>" <?php if ($noempleado -> EmpPago == $row -> IdNPa){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($nopago as $row){ ?>
																								<option value="<?= $row -> IdNPa ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="BancoID"> ID del banco: </label>
																					<select class="form-control" id="BancoID" name="BancoID">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($nobancos as $row){ ?>
																								<option value="<?= $row -> IdNB ?>" <?php if ($noempleado -> BancoID == $row -> IdNB){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($nobancos as $row){ ?>
																								<option value="<?= $row -> IdNB ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="PrestaLeyCodigo"> Código de prestaciones de ley: </label>
																					<select class="form-control" id="PrestaLeyCodigo" name="PrestaLeyCodigo">
																						<option value="selecciona-una-opcion"> Selecciona una opción </option>
																						<?php if ($noempleado != ""){
																							foreach ($noprestaciones as $row){ ?>
																								<option value="<?= $row -> IdNPr ?>" <?php if ($noempleado -> PrestaLeyCodigo == $row -> IdNPr){ print_r('selected'); } else { print_r(''); } ?>> <?= $row -> Nombre ?> </option>
																							<?php }
																						}
																						else {
																							foreach ($noprestaciones as $row){ ?>
																								<option value="<?= $row -> IdNPr ?>"> <?= $row -> Nombre ?> </option>
																							<?php }
																						} ?>
																					</select>
																				</div>
																			</div>
																			<div class="Class-3">
																				<div class="form-group">
																					<label for="EmpCheca"> EmpCheca: </label>
																					<input type="text" class="form-control" id="EmpCheca" name="EmpCheca" value="2" disabled>
																					<input type="hidden" class="form-control" id="EmpCheca" name="EmpCheca" value="2">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="Class-6 offset-3">
																				<button type="submit"  class="btn btn-block ap-gral-btn" name="btnEditInfoNo" id="btnEditInfoNo"> Editar </button>
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
									<div class="Class-12">
										<center>
											<h1> No existen registros. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="ERP_Icon_NER">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
