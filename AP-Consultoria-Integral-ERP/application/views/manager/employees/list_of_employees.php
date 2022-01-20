					<div class="ap-home-class">
						<div class="container-fluid">
								<div class="row">
									<div class="ap-class-12">
										<div class="row">
											<div class="ap-class-2">
												<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
											</div>
											<div class="ap-class-9">
												<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
								  <div class="ap-class-12">
										<br><br>
										<div class="table-responsive tablaRegistros" style="display: none">
											<table class="table table-bordered">
												<thead>
													<tr class="text-center">
														<th> Operaciones </th>
														<th> Foto </th>
														<th> Número de Empleado </th>
														<th> Nombre </th>
														<th> Firmar Contrato </th>
													</tr>
												</thead>
												<tbody id="tablaUserBody">
													<?php foreach ($tbl_e as $row){ ?>
														<tr class="">
															<td>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-an-employee-s-profile/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn btnRuta"> Ver </a> </li>
																</ul>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> foto_empleado_e)) {?>
																		<img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em_ruta ?>/<?=$row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="100px" height="100px">
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
															<td>
																<center>
																	<?php if (isset($row -> fecha_proximo_contrato_e)) {
																		print_r($row -> fecha_proximo_contrato_e);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
														<?php }?>
														</tr>
												</tbody>
											</table>
										</div>
								  </div>
								</div>
						</div>
					</div>
