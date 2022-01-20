					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<div class="row">
										<div class="ap-class-3">
											<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
										</div>
										<div class="ap-class-9">
											<form action="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em?>/view-employee-activities-by-date/<?= $encrypt_numero_empleado_e?>" method="POST">
											  <div class="row">
											    <div class="ap-class-10">
														<div class="form-group">
													    <input type="date" class="form-control" name="fecha_mu" required>
													  </div>
											    </div>
													<div class="ap-class-2">
														<input type="submit" class="btn btn-block ap-gral-btn" value="Buscar">
													</div>
											  </div>
											</form>
										</div>
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
													<th> Movimiento </th>
													<th> Receptor </th>
													<th> Hora </th>
													<th> Fecha </th>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($tbl_e)){
													foreach ($tbl_e as $row){ ?>
														<tr>
															<td>
																<center>
																	<?php if (isset($row -> movimiento_m)) {
																		print_r($row -> movimiento_m);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> receptor_mu)) {
																		print_r($row -> receptor_mu);
																	}else {
																		print_r('');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> hora_mu)) {
																		print_r($row -> hora_mu);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> fecha_mu)) {
																		print_r($row -> fecha_mu);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
														</tr>
													<?php }
												} else { ?>
													<tr>
														<td colspan="4">
															<center>
																<h1> El usuario no realizo movimientos el <?php if (!empty($fecha_mu)) { print_r($fecha_mu); } ?>. </h1>
																<br>
																<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
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
