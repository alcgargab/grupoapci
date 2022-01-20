					<div class="ap-home-class">
						<div class="container-fluid">
							<?php if (!empty($tbl_e)){ ?>
								<div class="row">
									<div class="ap-class-12">
										<div class="row">
											<div class="ap-class-3">
												<?php if (empty($total_tbl_e)) { ?>
													<a href="#" class="btn btn-block ap-gral-btn">Total : 0 </a>
												<?php }else{ ?>
													<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
													<input type="hidden" name="" id="totalRegistros" value="<?php echo $total_tbl_e ?>">
												<?php } ?>
											</div>
											<div class="ap-class-8">
												<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
											</div>
										</div>
									</div>
								</div>
								<br><br>
								<div class="row">
								  <div class="ap-class-12">
										<div class="table-responsive tablaRegistros" style="display: none">
											<table class="table table-bordered">
												<thead>
													<tr class="text-center">
														<th> Operaciones </th>
														<th> Foto </th>
														<th> Número de Empleado </th>
														<th> Nombre </th>
													</tr>
												</thead>
												<tbody id="tablaUserBody">
													<?php foreach ($tbl_e as $row){ ?>
														<tr>
															<td>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp">
																		<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-employee-holidays/<?= $row -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn btnRuta">
																			Vacaciones
																		</a>
																	</li>
																</ul>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> foto_empleado_e)) {?>
																		<img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?=$row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="100px" height="100px">
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
							<?php }else { ?>
								<div class="row">
									<div class="ap-class-12">
										<center>
											<h1> La empresa no cuenta con empleados, comunicate con reclutamiento para dar de alta al personal. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php	} ?>
						</div>
					</div>
