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
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($paquete -> idPaquete)) {
															print_r($paquete -> idPaquete);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Paquete)) {
															print_r($paquete -> Paquete);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Precio)) {
															print_r($paquete -> Precio);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Descripcion1)) {
															print_r($paquete -> Descripcion1);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Descripcion2)) {
															print_r($paquete -> Descripcion2);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Descripcion3)) {
															print_r($paquete -> Descripcion3);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Descripcion4)) {
															print_r($paquete -> Descripcion4);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Descripcion5)) {
															print_r($paquete -> Descripcion5);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Logo)) {
															print_r($paquete -> Logo);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> Ruta)) {
															print_r($paquete -> Ruta);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($paquete -> FRegistro)) {
															print_r($paquete -> FRegistro);
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
