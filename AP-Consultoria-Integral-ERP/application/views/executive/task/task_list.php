					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<div class="row">
										<div class="ap-class-3">
											<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
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
													<th> Operaciones </th>
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
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/view-the-tasks-of-an-employee/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> Ver </a> </li>
																	<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/add-task/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> Agregar </a> </li>
																	<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/task-report/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> Reporte </a> </li>
																</ul>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> foto_empleado_e)) {?>
																	<img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?=$row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="30px" height="30px">
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
