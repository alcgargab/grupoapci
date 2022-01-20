					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<?php if ($usuariocc != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
							<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
							<br><br><br><br><br>
								<form class="" action="<?= base_url()?>CallCenterAdm/EditarRegistro/usuario" method="post" enctype="multipart/form-data">
									<div class="contanier">
										<input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?= $usuariocc -> idUsuario ?>">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<img class="imgUser" src="<?= base_url().$usuariocc -> FotoUser?>" alt="<?= $usuariocc -> FotoUser?>">
												<input type="hidden" class="form-control" id="FotoUser" name="FotoUser" value="<?= $usuariocc -> FotoUser ?>">
												<br><br>
												<div class="form-group">
													<label for="NewFotoUser"> Si desea actualizar la imagen: </label>
													<input type="file" class="form-control" id="NewFotoUser" name="NewFotoUser">
												</div>
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
														<div class="form-group">
															<label for="ApellidoP"> Apellido paterno: </label>
															<input type="text" class="form-control" id="ApellidoP" name="ApellidoP" value="<?= $usuariocc -> ApellidoP ?>">
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
														<div class="form-group">
															<label for="ApellidoM"> Apellido Materno: </label>
															<input type="text" class="form-control" id="ApellidoM" name="ApellidoM" value="<?= $usuariocc -> ApellidoM ?>">
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
														<div class="form-group">
															<label for="Nombre"> Nombre: </label>
															<input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $usuariocc -> Nombre ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="NumeroCasa"> Teléfono de casa: </label>
															<input type="tel" class="form-control" id="NumeroCasa" name="NumeroCasa" value="<?= $usuariocc -> NumeroCasa ?>" pattern="[0-9]{8}">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="NumeroCelular"> Teléfono Celular: </label>
															<input type="tel" class="form-control" id="NumeroCelular" name="NumeroCelular" value="<?= $usuariocc -> NumActa ?>" pattern="[0-9]{10}">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="FNacimiento"> Fecha de Nacimiento: </label>
															<input type="date" class="form-control" id="FNacimiento" name="FNacimiento" value="<?= $usuariocc -> FNacimiento ?>">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="NumActa"> Número de Acta de Nacimiento: </label>
															<input type="text" class="form-control" id="NumActa" name="NumActa" value="<?= $usuariocc -> NumActa ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
															<label for="CURP"> CURP: </label>
															<input type="text" class="form-control" id="CURP" name="CURP" value="<?= $usuariocc -> CURP ?>">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
															<label for="RFC"> RFC: </label>
															<input type="text" class="form-control" id="RFC" name="RFC" value="<?= $usuariocc -> RFC ?>">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
															<label for="INE"> INE: </label>
															<input type="text" class="form-control" id="INE" name="INE" value="<?= $usuariocc -> INE ?>">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
															<label for="IMSS"> Número del IMSS: </label>
															<input type="text" class="form-control" id="IMSS" name="IMSS" value="<?= $usuariocc -> IMSS ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="FIngreso"> Fecha de Ingreso: </label>
															<input type="date" class="form-control" id="FIngreso" name="FIngreso" value="<?= $usuariocc -> FIngreso ?>">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="NumEmpleado"> Número de Empleado: </label>
															<input type="text" class="form-control" id="NumEmpleado" name="NumEmpleado" value="<?= $usuariocc -> NumEmpleado ?>" disabled>
															<input type="hidden" class="form-control" id="NumEmpleado" name="NumEmpleado" value="<?= $usuariocc -> NumEmpleado ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="FBaja"> Fecha de Baja: </label>
															<input type="date" class="form-control" id="FBaja" name="FBaja" value="<?= $usuariocc -> FBaja ?>">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="form-group">
															<label for="MotivoBaja"> Motivo de la Baja: </label>
															<input type="text" class="form-control" id="MotivoBaja" name="MotivoBaja" value="<?= $usuariocc -> MotivoBaja ?>">
														</div>
													</div>
												</div>
												<input type="hidden" class="form-control" id="FRegistro" name="FRegistro" value="<?= $usuariocc -> FRegistro ?>">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 float-right">
														<input type="submit" class="btn btn-outline-warning" value="Editar">
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							<?php }else { ?>
								<center> <h1>No Existen registros</h1> </center>
							<?php } ?>
						</div>
