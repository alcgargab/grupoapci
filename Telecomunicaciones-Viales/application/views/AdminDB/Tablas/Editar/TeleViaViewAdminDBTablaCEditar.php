					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($correo != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id Correo </th>
												<th> Usuario </th>
												<th> Correo Electrónico </th>
												<th> Asunto </th>
												<th> Número de Teléfono </th>
												<th> Comentarios </th>
												<th> Fecha de Envio </th>
												<th> Ubicación </th>
												<th> Direccion Ip </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/correo" method="post">
												<tr>
													<td> <?php if (isset($correo -> idCorreo)) { ?>
														<input type="text" name="" value="<?php print_r($correo -> idCorreo);?>" disabled>
														<input type="hidden" name="idCorreo" value="<?php print_r($correo -> idCorreo);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> Usuario)) { ?>
														<input type="text" name="Usuario" value="<?php print_r($correo -> Usuario);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> CorreoElectronico)) { ?>
														<input type="text" name="CorreoElectronico" value="<?php print_r($correo -> CorreoElectronico);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> Asunto)) { ?>
														<input type="text" name="Asunto" value="<?php print_r($correo -> Asunto);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> NumTelefonico)) { ?>
														<input type="tel" name="NumTelefonico" value="<?php print_r($correo -> NumTelefonico);?>" pattern="[0-9]{8}">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> Comentarios)) { ?>
														<input type="text" name="Comentarios" value="<?php print_r($correo -> Comentarios);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> FEnvio)) { ?>
														<input type="text" name="FEnvio" value="<?php print_r($correo -> FEnvio);?>" disabled>
														<input type="hidden" name="FEnvio" value="<?php print_r($correo -> FEnvio);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> Ubicacion)) { ?>
														<input type="text" name="Ubicacion" value="<?php print_r($correo -> Ubicacion);?>" disabled>
														<input type="hidden" name="Ubicacion" value="<?php print_r($correo -> Ubicacion);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($correo -> DireccionIp)) { ?>
														<input type="text" name="DireccionIp" value="<?php print_r($correo -> DireccionIp);?>" disabled>
														<input type="hidden" name="DireccionIp" value="<?php print_r($correo -> DireccionIp);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td>
														<!-- <ul class="list-group list-group-horizontal"> -->
														<!-- <li class="list-group-item ddd"> <input type="submit" class="btn btn-outline-warning" value="Editar"> </li> -->
															<input type="submit" class="btn btn-outline-warning" value="Editar">
														<!-- </ul> -->
													</td>
												</tr>
											</form>
											<?php }else { ?>
												<center> <h1>No Existen registros</h1> </center>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
