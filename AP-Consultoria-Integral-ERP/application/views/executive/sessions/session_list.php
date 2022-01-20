					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<div class="row">
										<div class="ap-class-3">
											<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
										</div>
										<!-- <div class="ap-class-9">
											<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
										</div> -->
									</div>
								</div>
							</div>
							<br>
							<div class="row">
							  <div class="ap-class-12">
									<div class="table-responsive tablaRegistros">
										<table class="table table-bordered">
											<thead>
												<tr class="text-center">
													<th> Status </th>
													<th> Foto </th>
													<th> Número de Empleado </th>
													<th> Nombre </th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($tbl_e as $row){ ?>
													<tr>
														<td>
															<center>
																<?php if (isset($row -> status_usuario_u)) {
																	if ($row -> status_usuario_u == 1) { ?>
																		<img class="" src="<?= base_url()?>images/Icono/ERP_Icon_List.webp" alt="AP-Consultoria-Integral-ERP" width="20px" height="20px">
																	<?php } else { ?>
																		<img class="" src="<?= base_url()?>images/Icono/ERP_Icon_Err.webp" alt="AP-Consultoria-Integral-ERP" width="20px" height="20px">
																	<?php }
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> foto_empleado_e)) {?>
																	<a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/view-employee-activities/<?= $row -> encrypt_numero_empleado_e ?>"> <img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?=$row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="30px" height="30px"> </a>
																<?php }else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> numero_empleado_e)) {
																	print_r($row -> numero_empleado_e);
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> apellido_paterno_e) && isset($row -> apellido_materno_e) && isset($row -> nombre_e)) {
																	print_r($row -> apellido_paterno_e." ".$row -> apellido_materno_e." ".$row -> nombre_e);
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
													</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
							  </div>
							</div>
						</div>
					</div>
