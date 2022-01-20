					<div class="homeClass">
						<div class="container-fluid">
							<?php if ($empleado != "") { ?>
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
													      <div class="card-body">
																	<div class="row">
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="Empresa"> Empresa: </label>
																				<input type="text" class="form-control" value="<?= $empresa -> Empresa ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="Area"> Área: </label>
																				<input type="text" class="form-control" value="<?= $area -> area ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="E_idPuesto"> Puesto: </label>
																				<input type="text" class="form-control" value="<?= $puesto -> Puesto ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="NumCuentaEmp"> Número de Cuenta: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> NumCuentaEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="SalMenBEmp"> Salario Mensual Bruto: </label>
																				<input type="text" class="form-control" value="$<?= $empleado -> SalMenBEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="SalMenNEmp"> Salario Mensual Neto: </label>
																				<input type="text" class="form-control" value="$<?= $empleado -> SalMenNEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="OtrIngEmp"> Otros Ingresos: </label>
																				<input type="text" class="form-control" value="$<?= $empleado -> OtrIngEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="SalDEmp"> Salario Diario: </label>
																				<input type="text" class="form-control" value="$<?= $empleado -> SalDEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-2-2-2-12">
																			<div class="form-group">
																				<label for="SalBaCEmp"> Salario Base de Cotización: </label>
																				<input type="text" class="form-control" value="$<?= $empleado -> SalBaCEmp ?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="FIngresoEmp"> Fecha de Ingreso: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FIngresoEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="FBajaEmp"> Fecha de Baja: </label>
																				<input type="text" class="form-control" value="<?= $empleado -> FBajaEmp ?>" disabled>
																			</div>
																		</div>
																		<div class="Class-4-4-4-12">
																			<div class="form-group">
																				<label for="MotivoBajaEmp"> Motivo de la Baja: </label>
																				<textarea class="form-control" rows="8" cols="80" disabled><?php echo mb_strtolower($empleado -> MotivoBajaEmp, 'UTF-8');?> </textarea>
																			</div>
																		</div>
																	</div>
													      </div>
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
																				<input type="text" class="form-control" id="NacEstadoCodigo" value="<?php print_r($noestados)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-6">
																			<div class="form-group">
																				<label for="EmpresaCodigo"> Código de la empresa: </label>
																				<input type="text" class="form-control" id="EmpresaCodigo" name="EmpresaCodigo" value="<?php print_r($EmpresaCodigo)?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="RegPatronCodigo"> Registro patronal de la empresa: </label>
																				<input type="text" class="form-control" id="RegPatronCodigo" name="RegPatronCodigo" value="<?php print_r($RegPatronCodigo)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="PuestoCodigo"> Código del puesto: </label>
																				<input type="text" class="form-control" id="PuestoCodigo" name="PuestoCodigo" value="<?php print_r($nopuestos)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="Nivel1Codigo"> Código del departamento: </label>
																				<input type="text" class="form-control" id="Nivel1Codigo" name="Nivel1Codigo" value="<?php print_r($nodepartamento)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="UbicacionCodigo"> Código de la ubicación: </label>
																				<input type="text" class="form-control" id="UbicacionCodigo" name="UbicacionCodigo" value="<?php print_r($noubicaciones)?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="TipoNominaCodigo"> Código de tipo de nómina: </label>
																				<input type="text" class="form-control" id="TipoNominaCodigo" name="TipoNominaCodigo" value="<?php print_r($nonomina)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="TurnoCodigo"> Código de turno: </label>
																				<input type="text" class="form-control" id="TurnoCodigo" name="TurnoCodigo" value="<?php print_r($noturnos)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="PaqueteCodigo"> Código del paquete de prestaciones: </label>
																				<input type="text" class="form-control" id="PaqueteCodigo" name="PaqueteCodigo" value="<?php print_r($PaqueteCodigo)?>" disabled>
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
																				<input type="text" class="form-control" id="SalPerVar" name="SalPerVar" value="<?php print_r($SalPerVar)?>" disabled>

																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="SalInt"> Salario diario integrado: </label>
																				<input type="text" class="form-control" id="SalInt" name="SalInt" value="<?php print_r($SalInt)?>" disabled>
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
																				<input type="text" class="form-control" id="TurnoCodigo" name="TurnoCodigo" value="<?php print_r($nopago)?>" disabled>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="BancoID"> ID del banco: </label>
																				<input type="text" class="form-control" id="TurnoCodigo" name="TurnoCodigo" value="<?php print_r($nobancos)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="PrestaLeyCodigo"> Código de prestaciones de ley: </label>
																				<input type="text" class="form-control" id="TurnoCodigo" name="TurnoCodigo" value="<?php print_r($noprestaciones)?>" disabled>
																			</div>
																		</div>
																		<div class="Class-3">
																			<div class="form-group">
																				<label for="EmpCheca"> EmpCheca: </label>
																				<input type="text" class="form-control" id="EmpCheca" name="EmpCheca" value="<?php print_r($EmpCheca)?>" disabled>
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
