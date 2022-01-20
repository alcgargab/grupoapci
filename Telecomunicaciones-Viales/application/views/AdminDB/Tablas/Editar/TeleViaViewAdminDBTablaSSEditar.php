					<div class="col-lg-9 col-md-9 col-sm-7 col-xs-12 registroContainer">
						<div class="">
							<div class="table-responsive tablaRegistros">
								<?php if ($serseguimiento != "") { $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Back.png" alt="Televia_Icon_Back"> </a>
									<br><br><br><br><br>
									<table class="table table-bordered">
										<thead>
											<tr class="text-center tablaHeader">
												<th> id del Seguimiento </th>
												<th> id del SubServicio </th>
												<th> id del Ususario </th>
												<th> Status del Proceso </th>
												<th> Status del Servicio </th>
												<th> Fecha de Termino </th>
												<th> Fecha de Registro </th>
												<th> Operación </th>
											</tr>
										</thead>
										<tbody>
											<form class="" action="<?= base_url()?>TelevialesAdm/EditarRegistro/seguimiento-del-servicio" method="post">
												<tr>
													<td> <?php if (isset($serseguimiento -> idSerSeguimiento)) { ?>
														<input type="text" name="" value="<?php print_r($serseguimiento -> idSerSeguimiento);?>" disabled>
														<input type="hidden" name="idSerSeguimiento" value="<?php print_r($serseguimiento -> idSerSeguimiento);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> SS_id_subser)) { ?>
														<input type="text" name="SS_id_subser" value="<?php print_r($serseguimiento -> SS_id_subser);?>" disabled>
														<input type="hidden" name="SS_id_subser" value="<?php print_r($serseguimiento -> SS_id_subser);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> SS_idUSeguimiento)) { ?>
														<input type="text" name="SS_idUSeguimiento" value="<?php print_r($serseguimiento -> SS_idUSeguimiento);?>" disabled>
														<input type="hidden" name="SS_idUSeguimiento" value="<?php print_r($serseguimiento -> SS_idUSeguimiento);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> StatusProceso)) { ?>
														<input type="text" name="StatusProceso" value="<?php print_r($serseguimiento -> StatusProceso);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> StatusServicio)) { ?>
														<input type="text" name="StatusServicio" value="<?php print_r($serseguimiento -> StatusServicio);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> FTermino)) { ?>
														<input type="text" name="FTermino" value="<?php print_r($serseguimiento -> FTermino);?>">
													<?php }else {
														print_r('Sin Registro');
													} ?> </td>
													<td> <?php if (isset($serseguimiento -> FRegistro)) { ?>
														<input type="text" name="FRegistro" value="<?php print_r($serseguimiento -> FRegistro);?>" disabled>
														<input type="hidden" name="FRegistro" value="<?php print_r($serseguimiento -> FRegistro);?>">
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
