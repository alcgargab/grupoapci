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
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($correo -> idCorreo)) {
															print_r($correo -> idCorreo);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> Usuario)) {
															print_r($correo -> Usuario);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> CorreoElectronico)) {
															print_r($correo -> CorreoElectronico);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> Asunto)) {
															print_r($correo -> Asunto);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> NumTelefonico)) {
															print_r($correo -> NumTelefonico);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> Comentarios)) {
															print_r($correo -> Comentarios);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> FEnvio)) {
															print_r($correo -> FEnvio);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> Ubicacion)) {
															print_r($correo -> Ubicacion);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($correo -> DireccionIp)) {
															print_r($correo -> DireccionIp);
														}else {
															print_r('Sin Registro');
														} ?> </td>
												</tr>
											<?php }else { ?>
												<center> <h1>No Existen registros</h1> </center>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
