					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($servicio != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id del Servicio </th>
												<th> Servicio </th>
												<th> Ruta </th>
												<th> Imagen </th>
												<th> id de la Categoría </th>
												<th> Fecha de Registro </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/servicio" method="post">
												<tr>
													<td> <?php if (isset($servicio -> id_ser)) { ?>
														<input type="text" name="" value="<?php print_r($servicio -> id_ser);?>" disabled>
														<input type="hidden" name="id_ser" value="<?php print_r($servicio -> id_ser);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($servicio -> servicio)) { ?>
														<input type="text" name="servicio" value="<?php print_r($servicio -> servicio);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($servicio -> Ruta)) { ?>
														<input type="text" name="Ruta" value="<?php print_r($servicio -> Ruta);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($servicio -> icono)) { ?>
														<input type="text" name="icono" value="<?php print_r($servicio -> icono);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($servicio -> id_ser_oportunidad)) { ?>
														<input type="text" name="id_ser_oportunidad" value="<?php print_r($servicio -> id_ser_oportunidad);?>" disabled>
														<input type="hidden" name="id_ser_oportunidad" value="<?php print_r($servicio -> id_ser_oportunidad);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($servicio -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($servicio -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($servicio -> FRegistro);?>">
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
