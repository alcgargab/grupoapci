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
											</tr>
										</thead>
										<tbody>
													<tr>
														<td> <?php if (isset($categoria -> id_oportunidad)) {
															print_r($categoria -> id_oportunidad);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($categoria -> oportunidad)) {
															print_r($categoria -> oportunidad);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($categoria -> Ruta)) {
															print_r($categoria -> Ruta);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($categoria -> banner_imagen)) {
															print_r($categoria -> banner_imagen);
														}else {
															print_r('Sin Registro');
														} ?> </td>
														<td> <?php if (isset($categoria -> FRegistro)) {
															print_r($categoria -> FRegistro);
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
