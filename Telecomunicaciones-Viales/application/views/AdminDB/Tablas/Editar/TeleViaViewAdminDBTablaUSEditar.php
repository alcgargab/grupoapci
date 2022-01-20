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
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/seguimiento-del-usuario" method="post">
												<tr>
													<td> <?php if (isset($userseguimiento -> idUSeguimiento)) { ?>
														<input type="text" name="" value="<?php print_r($userseguimiento -> idUSeguimiento);?>" disabled>
														<input type="hidden" name="idUSeguimiento" value="<?php print_r($userseguimiento -> idUSeguimiento);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($userseguimiento -> Codigo)) { ?>
														<input type="text" name="Codigo" value="<?php print_r($userseguimiento -> Codigo);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($userseguimiento -> Password)) { ?>
														<input type="text" name="Password" value="<?php print_r($userseguimiento -> Password);?>" disabled>
														<input type="hidden" name="Password" value="<?php print_r($userseguimiento -> Password);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($userseguimiento -> Usuario)) { ?>
														<input type="text" name="Usuario" value="<?php print_r($userseguimiento -> Usuario);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($userseguimiento -> Correo)) { ?>
														<input type="email" name="Correo" value="<?php print_r($userseguimiento -> Correo);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($userseguimiento -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($userseguimiento -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($userseguimiento -> FRegistro);?>">
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
