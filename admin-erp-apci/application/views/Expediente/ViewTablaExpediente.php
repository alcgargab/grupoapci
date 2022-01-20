					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-3">
												<?php if (empty($expediente)) { ?>
													<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
												<?php }else{ ?>
													<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo $totalExp ?>  Registros </a>
													<input type="hidden" name="" id="totalRegistros" value="<?php echo $totalExp ?>">
												<?php } ?>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-6">
												<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
											</div>
										</div>
									</div>
								</div>
								<br><br>
								<div class="row">
							  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="table-responsive tablaRegistros" style="display: none">
										<table class="table table-bordered">
											<thead>
												<tr class="text-center">
													<th> Operación </th>
													<th> Foto </th>
													<th> Número de Empleado </th>
													<th> Apellido Paterno </th>
													<th> Apellido Materno </th>
													<th> Nombre </th>
												</tr>
											</thead>
											<tbody id="tablaUserBody">
												<?php foreach ($empleadoExp as $row){ ?>
													<tr>
														<td>
															<ul class="list-group list-group-horizontal">
																<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Admin/<?= $ruta ?>/descargar-el-expediente-de-un-empleado/<?= $row -> NumEmpMd5?>" class="btn btn-outline-success"> Descargar Expediente <i class="fas fa-file"></i> </a> </li>
															</ul>
														</td>
														<td>
															<center>
																<?php if (isset($row -> FotoEmp)) {?>
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
																<?php if (isset($row -> ApellidoPEmp)) {
																	print_r($row -> ApellidoPEmp);
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> ApellidoMEmp)) {
																	print_r($row -> ApellidoMEmp);
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
														<td>
															<center>
																<?php if (isset($row -> NomEmp)) {
																	print_r($row -> NomEmp);
																}else {
																	print_r('Sin Registro');
																} ?>
															</center>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
							  </div>
							</div>
						</div>
					</div>
