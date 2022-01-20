					<div class="homeClass">
						<div class="container-fluid">
							<?php if (!empty($empleados)){ ?>
								<div class="row">
									<div class="Class-12">
										<div class="row">
											<div class="Class-3">
												<?php if (empty($totalEmp)) { ?>
													<a href="#" class="btn btn-block ap-gral-btn">Total : 0 </a>
												<?php }else{ ?>
													<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $totalEmp ?> </a>
													<input type="hidden" name="" id="totalRegistros" value="<?php echo $totalEmp ?>">
												<?php } ?>
											</div>
											<div class="Class-4">
												<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
											</div>
											<div class="Class-5">
												<button type="submit" id="btnValidarCuentas" class="btn btn-block ap-gral-btn"> Validar Cuentas y Sueldos </button>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
								  <div class="Class-12">
										<?php for ($i=0; $i < count($empleados); $i++) { ?>
											<input type="hidden" name="" id="NumCuentaEmp<?php echo $i;?>" value="<?= $empleados[$i] -> NumCuentaEmp ?>">
											<input type="hidden" name="" id="SalMenBEmp<?php echo $i;?>" value="<?= $empleados[$i] -> SalMenBEmp ?>">
											<input type="hidden" name="" id="SalMenNEmp<?php echo $i;?>" value="<?= $empleados[$i] -> SalMenNEmp ?>">
											<input type="hidden" name="" id="OtrIngEmp<?php echo $i;?>" value="<?= $empleados[$i] -> OtrIngEmp ?>">
											<input type="hidden" name="" id="SalDEmp<?php echo $i;?>" value="<?= $empleados[$i] -> SalDEmp ?>">
											<input type="hidden" name="" id="SalBaCEmp<?php echo $i;?>" value="<?= $empleados[$i] -> SalBaCEmp ?>">
										<?php } ?>
										<br><br>
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
													<?php foreach ($empleados as $row){ ?>
														<tr class="<?php echo ($row -> NumCuentaEmp == "") ? 'table-danger' : '' ?>">
															<td>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Finanzas/<?= $ruta ?>/view-an-employee-s-profile/<?= $row -> NumEmpMd5?>" class="btn btn-block ap-gral-btn"> Ver </a> </li>
																	<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Finanzas/<?= $ruta ?>/edit-employee-profile/<?= $row -> NumEmpMd5?>" class="btn btn-block ap-gral-btn"> Editar </a> </li>
																</ul>
															</td>
															<td>
																<center>
																	<?php if (isset($row -> FotoEmp)) { ?>
																		<img class="" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?=$row -> FotoEmp?>" alt="<?=$row -> FotoEmp?>" width="100px" height="100px">
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
														</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
								  </div>
								</div>
							<?php }
							else { ?>
								<div class="row">
									<div class="Class-12">
										<center>
											<h1> La empresa no cuenta con empleados, comunicate con Recursos Humanos para dar de alta al personal. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="ERP_Icon_NER">
										</center>
									</div>
								</div>
							<?php	} ?>
						</div>
					</div>
