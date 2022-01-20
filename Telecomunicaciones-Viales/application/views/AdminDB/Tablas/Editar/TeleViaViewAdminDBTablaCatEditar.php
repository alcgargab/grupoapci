					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($categoria != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id de la Categoría </th>
												<th> Categoría </th>
												<th> Ruta </th>
												<th> Imagen </th>
												<th> Fecha de Registro </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/categoria" method="post">
												<tr>
													<td> <?php if (isset($categoria -> id_oportunidad)) { ?>
														<input type="text" name="" value="<?php print_r($categoria -> id_oportunidad);?>" disabled>
														<input type="hidden" name="id_oportunidad" value="<?php print_r($categoria -> id_oportunidad);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($categoria -> oportunidad)) { ?>
														<input type="text" name="oportunidad" value="<?php print_r($categoria -> oportunidad);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($categoria -> Ruta)) { ?>
														<input type="text" name="Ruta" value="<?php print_r($categoria -> Ruta);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($categoria -> banner_imagen)) { ?>
														<input type="text" name="banner_imagen" value="<?php print_r($categoria -> banner_imagen);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($categoria -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($categoria -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($categoria -> FRegistro);?>">
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
