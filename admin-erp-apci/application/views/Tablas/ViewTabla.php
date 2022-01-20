					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
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
										<div class="col-lg-3 col-md-3 col-sm-3 col-3">
											<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<div class="row">
							  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<?php for ($i=0; $i < $totalEmp; $i++) { ?>
										<input type="hidden" name="" id="proximaFecha<?php echo $i;?>" value="<?= $empleados[$i] -> FProxFirmacontrato ?>">
									<?php } ?>
									<br><br>
									<div class="table-responsive tablaRegistros" style="display: none">
										<table class="table table-bordered">
											<thead>
												<tr class="text-center">
													<th> Operaciones </th>
													<th> Foto </th>
													<th> Número de Empleado </th>
													<th> Apellido Paterno </th>
													<th> Apellido Materno </th>
													<th> Nombre </th>
													<th> Firmar Contrato </th>
												</tr>
											</thead>
											<tbody id="tablaUserBody">
												<?php foreach ($empleados as $row){
													$hoy = date('Y-m-d');?>
													<tr class="<?php if ($row -> FProxFirmacontrato == $hoy){ print_r('table-warning'); }else { print_r(''); }?>">
														<td>
															<ul class="list-group list-group-horizontal">
																<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Admin/<?= $ruta ?>/ver-perfil-de-un-empleado/<?= $row -> NumEmpMd5?>" class="btn btn-outline-success"> Ver <i class="fas fa-eye"> </i> </a> </li>
															</ul>
														</td>
														<td>
															<?php if (isset($row -> FotoEmp)) {?>
																<img class="" src="<?= base_url()?>images/Empleado/<?= $ruta ?>/<?=$row -> FotoEmp?>" alt="<?=$row -> FotoEmp?>" width="100px" height="100px">
															<?php }else {
																print_r('Sin Registro');
															} ?>
														</td>
														<td>
															<?php if (isset($row -> NumEmp)) {
																print_r($row -> NumEmp);
															}else {
																print_r('Sin Registro');
															} ?>
														</td>
														<td>
															<?php if (isset($row -> ApellidoPEmp)) {
																print_r($row -> ApellidoPEmp);
															}else {
																print_r('Sin Registro');
															} ?>
														</td>
														<td>
															<?php if (isset($row -> ApellidoMEmp)) {
																print_r($row -> ApellidoMEmp);
															}else {
																print_r('Sin Registro');
															} ?>
														</td>
														<td>
															<?php if ($row -> NomEmp != "") {
																print_r($row -> NomEmp);
															}else {
																print_r('Sin télefono');
															} ?>
														</td>
														<td>
															<?php if ($row -> FProxFirmacontrato != "") {
																print_r($row -> FProxFirmacontrato);
															}else {
																print_r('Sin télefono');
															} ?>
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
