					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($user != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id Usuario </th>
												<th> Usuario </th>
												<th> Password </th>
												<th> Fecha de Registro </th>
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($user -> idUser)) {
															print_r($user -> idUser);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($user -> Usuario)) {
															print_r($user -> Usuario);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($user -> Password)) {
															print_r($user -> Password);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($user -> FRegistro)) {
															print_r($user -> FRegistro);
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
