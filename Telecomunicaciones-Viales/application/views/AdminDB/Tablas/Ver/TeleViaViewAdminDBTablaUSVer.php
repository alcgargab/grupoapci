					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($userseguimiento != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id Usuario </th>
												<th> Código </th>
												<th> Password </th>
												<th> Usuario </th>
												<th> Corrreo Electrónico </th>
												<th> Fecha de Registro </th>
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($userseguimiento -> idUSeguimiento)) {
															print_r($userseguimiento -> idUSeguimiento);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($userseguimiento -> Codigo)) {
															print_r($userseguimiento -> Codigo);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($userseguimiento -> Password)) {
															print_r($userseguimiento -> Password);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($userseguimiento -> Usuario)) {
															print_r($userseguimiento -> Usuario);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($userseguimiento -> Correo)) {
															print_r($userseguimiento -> Correo);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($userseguimiento -> FRegistro)) {
															print_r($userseguimiento -> FRegistro);
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
