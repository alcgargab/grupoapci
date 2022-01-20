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
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($serseguimiento -> idSerSeguimiento)) {
															print_r($serseguimiento -> idSerSeguimiento);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subServicio -> subser)) {
															print_r($subServicio -> subser);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($User -> Usuario)) {
															print_r($User -> Usuario);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($serseguimiento -> StatusProceso)) {
															print_r($serseguimiento -> StatusProceso);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($serseguimiento -> StatusServicio)) {
															print_r($serseguimiento -> StatusServicio);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($serseguimiento -> FTermino)) {
															print_r($serseguimiento -> FTermino);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($serseguimiento -> FRegistro)) {
															print_r($serseguimiento -> FRegistro);
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
