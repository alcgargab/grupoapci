					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php if (!empty($empleados)){ $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
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
											<?php if (empty($totalEmp)) { ?>
												<a href="#" class="btn btn-outline-primary float-left">Total : 0 Empleados </a>
											<?php }else{ ?>
												<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo $totalEmp ?>  Empleados </a>
												<input type="hidden" name="" id="totalRegistros" value="<?php echo $totalEmp ?>">
											<?php } ?>
										</div>
										<div class="col-lg-7 col-md-7 col-sm-7 col-7">
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
													<th> Foto </th>
													<th> Número de Empleado </th>
													<th> Apellido Paterno </th>
													<th> Apellido Materno </th>
													<th> Nombre </th>
													<th> Fecha de baja </th>
													<th> Motivo de baja </th>
												</tr>
											</thead>
											<tbody id="tablaUserBody">
												<?php foreach ($empleados as $row){ ?>
													<tr class="">
														<td>
															<?php if (isset($row -> FotoEmp)) {?>
																<img class="" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?=$row -> FotoEmp?>" alt="<?=$row -> FotoEmp?>" width="100px" height="100px">
															<?php }else {
																print_r('Sin Registro');
															} ?>
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
																	print_r('Sin télefono');
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
							<?php }else { ?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<center>
											<h1> La empresa no cuenta con bajas. </h1>
											<br><br><br><br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.png" alt="ERP_Icon_NER">
										</center>
									</div>
								</div>
							<?php	} ?>
						</div>
					</div>
