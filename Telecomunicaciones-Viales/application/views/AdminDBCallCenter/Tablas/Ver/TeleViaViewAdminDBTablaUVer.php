					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<?php if ($usuariocc != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
							<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
							<br><br><br><br><br>
							<div class="contanier">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php if($usuariocc -> FotoUser != ""){ ?>
											<img class="imgUser" src="<?= base_url().$usuariocc -> FotoUser?>" alt="<?= $usuariocc -> FotoUser?>">
										<?php }else { ?>
											<img class="imgUser" src="<?= base_url()?>images/Call Center/Usuario/TeleViales_Usuario.png" alt="TeleViales_Usuario">
										<?php } ?>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="ApellidoP"> Apellido paterno: </label>
													<input type="text" class="form-control" id="ApellidoP" name="ApellidoP" value="<?= $usuariocc -> ApellidoP ?>" disabled>
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="ApellioM"> Apellido Materno: </label>
													<input type="text" class="form-control" id="ApellioM" name="ApellioM" value="<?= $usuariocc -> ApellidoM ?>" disabled>
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="Nombre"> Nombre: </label>
													<input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $usuariocc -> Nombre ?>" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="NumeroCasa"> Teléfono de Casa: </label>
													<input type="tel" class="form-control" id="NumeroCasa" name="NumeroCasa" value="<?php
													if ($usuariocc -> NumeroCelular != "") {
														print_r($usuariocc -> NumeroCelular);
													}else {
														print_r('Sin teléfono');
													}
													?>" disabled>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="NumeroCelular"> Teléfono Celular: </label>
													<input type="tel" class="form-control" id="NumeroCelular" name="NumeroCelular" value="<?php
													if ($usuariocc -> NumeroCelular != "") {
														print_r($usuariocc -> NumeroCelular);
													}else {
														print_r('Sin teléfono');
													}
													?>" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="FNacimiento"> Fecha de Nacimiento: </label>
													<input type="text" class="form-control" id="FNacimiento" name="FNacimiento" value="<?= $usuariocc -> FNacimiento ?>" disabled>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="NumActa"> Número de Acta de Nacimiento: </label>
													<input type="text" class="form-control" id="NumActa" name="NumActa" value="<?= $usuariocc -> NumActa ?>" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="form-group">
													<label for="CURP"> CURP: </label>
													<input type="text" class="form-control" id="CURP" name="CURP" value="<?= $usuariocc -> CURP ?>" disabled>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="form-group">
													<label for="RFC"> RFC: </label>
													<input type="text" class="form-control" id="RFC" name="RFC" value="<?= $usuariocc -> RFC ?>" disabled>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="form-group">
													<label for="INE"> INE: </label>
													<input type="text" class="form-control" id="INE" name="INE" value="<?= $usuariocc -> INE ?>" disabled>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="form-group">
													<label for="IMSS"> Número del IMSS: </label>
													<input type="text" class="form-control" id="IMSS" name="IMSS" value="<?= $usuariocc -> IMSS ?>" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="FIngreso"> Fecha de Ingreso: </label>
													<input type="text" class="form-control" id="FIngreso" name="FIngreso" value="<?= $usuariocc -> FIngreso ?>" disabled>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="NumEmpleado"> Número de Empleado: </label>
													<input type="text" class="form-control" id="NumEmpleado" name="NumEmpleado" value="<?= $usuariocc -> NumEmpleado ?>" disabled>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="FBaja"> Fecha de Baja: </label>
													<input type="text" class="form-control" id="FBaja" name="FBaja" value="<?= $usuariocc -> FBaja ?>" disabled>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="MotivoBaja"> Motivo de la Baja: </label>
													<input type="text" class="form-control" id="MotivoBaja" name="MotivoBaja" value="<?= $usuariocc -> MotivoBaja ?>" disabled>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }else { ?>
							<center> <h1>No Existen registros</h1> </center>
						<?php } ?>
					</div>
