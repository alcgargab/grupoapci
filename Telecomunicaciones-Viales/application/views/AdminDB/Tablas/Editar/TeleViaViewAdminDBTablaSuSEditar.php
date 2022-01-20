					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($subservicio != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id del SubServicio </th>
												<th> SubServicio </th>
												<th> Ruta </th>
												<th> Precio </th>
												<th> Descripción 1 </th>
												<th> Descripción 2 </th>
												<th> Descripción 3 </th>
												<th> Logo </th>
												<th> Requisitos 1 </th>
												<th> Requisitos 2 </th>
												<th> Requisitos 3 </th>
												<th> Requisitos 4 </th>
												<th> id del Servicio </th>
												<th> Fecha de Registro </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/subservicio" method="post">
												<tr>
													<td> <?php if (isset($subservicio -> id_subser)) { ?>
														<input type="text" name="" value="<?php print_r($subservicio -> id_subser);?>" disabled>
														<input type="hidden" name="id_subser" value="<?php print_r($subservicio -> id_subser);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> subser)) { ?>
														<input type="text" name="subser" value="<?php print_r($subservicio -> subser);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> Ruta)) { ?>
														<input type="text" name="Ruta" value="<?php print_r($subservicio -> Ruta);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> precio)) { ?>
														<input type="text" name="precio" value="<?php print_r($subservicio -> precio);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> descripcion)) { ?>
														<input type="text" name="descripcion" value="<?php print_r($subservicio -> descripcion);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> descripcion2)) { ?>
														<input type="text" name="descripcion2" value="<?php print_r($subservicio -> descripcion2);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> descripcion3)) { ?>
														<input type="text" name="descripcion3" value="<?php print_r($subservicio -> descripcion3);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> logo)) { ?>
														<input type="text" name="logo" value="<?php print_r($subservicio -> logo);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> requisitos)) { ?>
														<input type="text" name="requisitos" value="<?php print_r($subservicio -> requisitos);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> requisitos2)) { ?>
														<input type="text" name="requisitos2" value="<?php print_r($subservicio -> requisitos2);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> requisitos3)) { ?>
														<input type="text" name="requisitos3" value="<?php print_r($subservicio -> requisitos3);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> requisitos4)) { ?>
														<input type="text" name="requisitos4" value="<?php print_r($subservicio -> requisitos4);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> id_ser)) { ?>
														<input type="text" name="id_ser" value="<?php print_r($subservicio -> id_ser);?>" disabled>
														<input type="hidden" name="id_ser" value="<?php print_r($subservicio -> id_ser);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($subservicio -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($subservicio -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($subservicio -> FRegistro);?>">
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
