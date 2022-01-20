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
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($subservicio -> id_subser)) {
															print_r($subservicio -> id_subser);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> subser)) {
															print_r($subservicio -> subser);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> Ruta)) {
															print_r($subservicio -> Ruta);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> precio)) {
															print_r($subservicio -> precio);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> descripcion)) {
															print_r($subservicio -> descripcion);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> descripcion2)) {
															print_r($subservicio -> descripcion2);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> descripcion3)) {
															print_r($subservicio -> descripcion3);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> logo)) {
															print_r($subservicio -> logo);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> requisitos)) {
															print_r($subservicio -> requisitos);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> requisitos2)) {
															print_r($subservicio -> requisitos2);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> requisitos3)) {
															print_r($subservicio -> requisitos3);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> requisitos4)) {
															print_r($subservicio -> requisitos4);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($servicio -> servicio)) {
															print_r($servicio -> servicio);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($subservicio -> FRegistro)) {
															print_r($subservicio -> FRegistro);
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
