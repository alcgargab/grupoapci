					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3 offset-2">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_p ?> </a>
								</div>
								<div class="ap-class-7">
									<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
								</div>
							</div>
							<br><br>
							<?php if (!empty($empleados)){ ?>
								<div class="row">
								  <div class="Class-12">
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
													<?php foreach ($empleados as $row){
														$hoy = date('Y-m-d');?>
														<tr class="">
															<td>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp">
																		<a href="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/crear-archivo-de-renuncia/<?= $row -> NumEmpMd5?>" class="btn btn-outline-danger">
																			Renuncia
																			<i class="fas fa-sign-out-alt"></i>
																		</a>
																	</li>
																	<!-- <li class="list-group-item tablaBtnOp">
																		<a href="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/crear-archivo-de-finiquito/<?= $row -> NumEmpMd5?>" class="btn btn-outline-info">
																			Finiquito
																			<i class="fas fa-sign-out-alt">  </i>
																		</a>
																	</li> -->
																	<li class="list-group-item tablaBtnOp">
																		<a href="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/dar-de-baja-en-el-seguro-social/<?= $row -> NumEmpMd5?>" class="btn btn-outline-dark">
																			IMSS
																			<i class="fas fa-sign-out-alt"></i>
																		</a>
																	</li>
																</ul>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> FotoEmp)) {?>
																		<img class="" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?=$row -> FotoEmp?>" alt="AP-Consultoria-Integral-ERP" width="100px" height="100px">
																	<?php }else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> NumEmp)) {
																		print_r($row -> NumEmp);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> ApellidoPEmp) && isset($row -> ApellidoMEmp) && isset($row -> NomEmp)) {
																		print_r($row -> ApellidoPEmp." ".$row -> ApellidoMEmp." ".$row -> NomEmp);
																	}else {
																		print_r('Sin Registro');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if ($row -> FBajaEmp != "0000-00-00") {
																		print_r($row -> FBajaEmp);
																	}else {
																		print_r('Sin fecha de baja');
																	} ?>
																</center>
															</td>
															<td>
																<center>
																	<?php if ($row -> MotivoBajaEmp != "") {
																		print_r($row -> MotivoBajaEmp);
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
							<?php } else { ?>
								<div class="row">
									<div class="ap-class-12">
										<center>
											<h1> La empresa no cuenta con bajas. </h1>
											<br><br><br><br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php }?>
						</div>
					</div>
