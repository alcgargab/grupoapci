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
											</tr>
										</thead>
										<tbody>
											<tr>
												<td> <?php if (isset($servicio -> id_ser)) {
													print_r($servicio -> id_ser);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($servicio -> servicio)) {
													print_r($servicio -> servicio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($servicio -> Ruta)) {
													print_r($servicio -> Ruta);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($servicio -> icono)) {
													print_r($servicio -> icono);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($categoria -> oportunidad)) {
													print_r($categoria -> oportunidad);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($servicio -> FRegistro)) {
													print_r($servicio -> FRegistro);
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
