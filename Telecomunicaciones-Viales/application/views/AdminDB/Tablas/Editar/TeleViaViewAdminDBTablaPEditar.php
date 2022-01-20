					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($paquete != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id Paquete </th>
												<th> Paquete </th>
												<th> Precio </th>
												<th> Descripción 1 </th>
												<th> Descripción 2 </th>
												<th> Descripción 3 </th>
												<th> Descripción 4 </th>
												<th> Descripción 5 </th>
												<th> Logo </th>
												<th> Ruta </th>
												<th> Fecha de Registro </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/paquete" method="post">
												<tr>
													<td> <?php if (isset($paquete -> idPaquete)) { ?>
														<input type="text" name="" value="<?php print_r($paquete -> idPaquete);?>" disabled>
														<input type="hidden" name="idPaquete" value="<?php print_r($paquete -> idPaquete);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Paquete)) { ?>
														<input type="text" name="Paquete" value="<?php print_r($paquete -> Paquete);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Precio)) { ?>
														<input type="text" name="Precio" value="<?php print_r($paquete -> Precio);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Descripcion1)) { ?>
														<input type="text" name="Descripcion1" value="<?php print_r($paquete -> Descripcion1);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Descripcion2)) { ?>
														<input type="text" name="Descripcion2" value="<?php print_r($paquete -> Descripcion2);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Descripcion3)) { ?>
														<input type="text" name="Descripcion3" value="<?php print_r($paquete -> Descripcion3);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Descripcion4)) { ?>
														<input type="text" name="Descripcion4" value="<?php print_r($paquete -> Descripcion4);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Descripcion5)) { ?>
														<input type="text" name="Descripcion5" value="<?php print_r($paquete -> Descripcion5);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Logo)) { ?>
														<input type="text" name="Logo" value="<?php print_r($paquete -> Logo);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> Ruta)) { ?>
														<input type="text" name="Ruta" value="<?php print_r($paquete -> Ruta);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($paquete -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($paquete -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($paquete -> FRegistro);?>">
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
