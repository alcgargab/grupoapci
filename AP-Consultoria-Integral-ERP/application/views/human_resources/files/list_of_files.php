					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<div class="row">
										<div class="ap-class-3">
											<?php if (empty($tbl_e)) { ?>
												<a href="#" class="btn btn-block ap-gral-btn">Total : 0 </a>
											<?php }else{ ?>
												<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
												<input type="hidden" name="" id="totalRegistros" value="<?php echo $total_tbl_e ?>">
											<?php } ?>
										</div>
										<div class="ap-class-6">
											<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
										</div>
										<?php if ($this -> session -> user != "EMapci"){ ?>
											<div class="ap-class-3">
												<button type="button" class="btn btn-block ap-gral-btn" data-toggle="modal" data-target="#ModalExpediente"> Generar </button>
												<div class="modal fade" id="ModalExpediente">
											    <div class="modal-dialog modal-dialog-centered modal-xl">
											      <div class="modal-content">
											        <div class="modal-header ap-gral-modal-header">
											          <h4 class="modal-title"> Expediente </h4>
											          <button type="button" class="close" data-dismiss="modal">
											          	<i class='fas fa-times ap-gral-fa-times'></i>
											          </button>
											        </div>
											        <div class="modal-body">
																<form class="" onsubmit="return validate_files()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/generate-the-case-files" method="post" enctype="multipart/form-data">
																	<div class="container-fluid">
																		<div class="row">
																			<div class="ap-class-6-6-6-12">
																				<div class="form-group">
																					<label for="empleado"> Empleado: </label>
																					<select class="form-control" id="empleado" name="empleado" required>
																						<option value="Seleccionar_empleado" selected> Seleccionar empleado </option>
																						<?php foreach ($tbl_e as $row){ ?>
																							<option value="<?= $row -> encrypt_numero_empleado_e ?>"> <?= $row -> apellido_paterno_e ?> <?= $row -> apellido_materno_e ?> <?= $row -> nombre_e ?>  </option>
																						<?php } ?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																				<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="curriculum"> Currículum (actualizado, con fotografia): </label>
																					<input type="file" class="form-control" id="curriculum" name="curriculum" required accept="image/*">
																				</div>
																			</div>
																				<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="acta"> Acta de Nacimiento: </label>
																					<input type="file" class="form-control" id="acta" name="acta" required accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="ine"> Identificación oficial (INE, Pasaporte): </label>
																					<input type="file" class="form-control" id="ine" name="ine" required accept="image/*">
																				</div>
																			</div>
																		</div>
																		<br><br>
																		<div class="row">
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="comprobante"> Comprobante último grado de estudios: </label>
																					<input type="file" class="form-control" id="comprobante" name="comprobante" required accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="domicilio"> Comprobante de domicilio: </label>
																					<input type="file" class="form-control" id="domicilio" name="domicilio" required accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="curp"> CURP: </label>
																					<input type="file" class="form-control" id="curp" name="curp" required accept="image/*">
																				</div>
																			</div>
																		</div>
																		<br><br>
																		<div class="row">
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="nss"> Número de Seguridad Social: </label>
																					<input type="file" class="form-control" id="nss" name="nss" required accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="carta1"> Primera Carta de Recomendación: </label>
																					<input type="file" class="form-control" id="carta1" name="carta1" accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="carta2"> Segunda Carta de Recomendación: </label>
																					<input type="file" class="form-control" id="carta2" name="carta2" accept="image/*">
																				</div>
																			</div>
																		</div>
																		<br><br>
																		<div class="row">
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="rfc_homoclave"> RFc con homoclave: </label>
																					<input type="file" class="form-control" id="rfc_homoclave" name="rfc_homoclave" accept="image/*" required>
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="fotos"> 2 fotografías tamaño infantil  blanco y negro: </label>
																					<input type="file" class="form-control" id="fotos" name="fotos" accept="image/*">
																				</div>
																			</div>
																			<div class="ap-class-4-4-4-12">
																				<div class="form-group">
																					<label for="cuenta"> Estado de cuenta bancario con cuenta CLABE para pago de nómina: </label>
																					<input type="file" class="form-control" id="cuenta" name="cuenta" required accept="image/*">
																				</div>
																			</div>
																		</div>
																		<br>
																		<div class="row">
																			<div class="ap-class-12">
																				<span id="error_validate_files"></span>
																			</div>
																		</div>
																		<br>
																		<div class="row">
																			<div class="ap-class-6 offset-3">
																				<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Agregar">
																			</div>
																		</div>
																	</div>
																</form>
											        </div>
											        <div class="modal-footer ap-gral-modal-footer">
											        </div>
											      </div>
											    </div>
											  </div>
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
													<th> Operación </th>
													<th> Foto </th>
													<th> Número de Empleado </th>
													<th> Nombre </th>
												</tr>
											</thead>
											<tbody id="tablaUserBody">
												<?php foreach ($tbl_ex as $row){ ?>
													<tr>
														<td>
															<ul class="list-group list-group-horizontal">
																<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/download-the-case-files/<?= $row -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn btnRuta"> Descargar </a> </li>
																<!-- <li class="list-group-item tablaBtnOp"> <a href="#" class="btn btn-block ap-gral-btn"> Descargar </a> </li> -->
															</ul>
														</td>
														<td>
															<center>
																<?php if (isset($row -> foto_empleado_e)) { ?>
																	<img class="" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?=$row -> foto_empleado_e ?>" alt="AP-Consultoria-Integral-ERP" width="100px" height="100px">
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
												<?php } ?>
											</tbody>
										</table>
									</div>
							  </div>
							</div>
						</div>
					</div>
