					<div class="ap-home-class">
						<div class="container-fluid">
							<?php if (!empty($tbl_e)){ ?>
							<div class="row">
								<div class="ap-class-12">
									<div class="row">
										<div class="ap-class-3">
											<?php if (empty($total_tbl_e)) { ?>
												<a href="#" class="btn btn-block ap-gral-btn">Total : 0 Empleados </a>
											<?php }else{ ?>
												<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $total_tbl_e ?>  Empleados </a>
												<input type="hidden" name="" id="totalRegistros" value="<?php echo $total_tbl_e ?>">
											<?php } ?>
										</div>
										<div class="ap-class-4">
											<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
										</div>
										<?php if ($total_tbl_e != 0 && $this -> session -> user != 'EMapci'){ ?>
											<div class="ap-class-3">
												<a href="<?= base_url()?>/Recursoshumanos/<?= $tbl_em -> ruta_em ?>/generate-report-of-unemployed" class="btn btn-block ap-gral-btn"> Generar reporte </a>
											</div>
										<?php } ?>
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
													<th> Fecha de baja </th>
													<th> Motivo de baja </th>
												</tr>
											</thead>
											<tbody id="tablaUserBody">
												<?php foreach ($tbl_e as $row){
													$hoy = date('Y-m-d');?>
													<tr class="">
														<td>
															<?php if ($this -> session -> user != "EMapci"){ ?>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp">
																		<!-- <a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/create-file-give-up-work/<?= $row -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn"> -->
																		<a href="#" class="btn btn-block ap-gral-btn">
																			Renuncia
																			<!-- <i class="fas fa-sign-out-alt"></i> -->
																		</a>
																	</li>
																	<!-- <li class="list-group-item tablaBtnOp">
																		<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/create-settlement-file/<?= $row -> encrypt_numero_empleado_e ?>" class="btn btn-info btn-block">
																			Finiquito
																			<i class="fas fa-sign-out-alt">  </i>
																		</a>
																	</li> -->
																	<li class="list-group-item tablaBtnOp">
																		<a href="#" class="btn btn-block ap-gral-btn">
																			IMSS
																			<!-- <i class="fas fa-sign-out-alt"></i> -->
																		</a>
																	</li>
																</ul>
															<?php } ?>
														</td>
														<td>
															<center>
																<?php if (isset($row -> foto_empleado_e)) {?>
																	<img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?=$row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="100px" height="100px">
																<?php }else {
																	print_r('sin registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> numero_empleado_e)) {
																	print_r($row -> numero_empleado_e);
																}else {
																	print_r('sin registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> apellido_paterno_e) && isset($row -> apellido_materno_e) && isset($row -> nombre_e)) {
																	print_r($row -> apellido_paterno_e." ".$row -> apellido_materno_e." ".$row -> nombre_e);
																}else {
																	print_r('sin registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if ($row -> fecha_baja_e != "0000-00-00") {
																	print_r($row -> fecha_baja_e);
																}else {
																	print_r('Sin fecha de baja');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if ($row -> motivo_baja_e != "") {
																	print_r($row -> motivo_baja_e);
																}else {
																	print_r('Sin motivo de baja');
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
											<h1> La empresa no cuenta con bajas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php	} ?>
						</div>
					</div>
