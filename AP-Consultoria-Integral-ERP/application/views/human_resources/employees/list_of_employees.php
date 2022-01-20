					<div class="ap-home-class">
						<div class="container-fluid">
								<div class="row">
									<div class="ap-class-12">
										<div class="row">
											<div class="ap-class-2">
												<a href="#" class="btn btn-block ap-gral-btn">Total : <?php echo $total_tbl_e ?> </a>
											</div>
											<div class="ap-class-2">
												<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
											</div>
											<?php if ($this -> session -> user != 'EMapci'){ ?>
												<div class="ap-class-3">
													<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/generate-reports-of-active-employees" class="btn btn-block ap-gral-btn"> Generar reporte </a>
												</div>
												<div class="ap-class-3">
													<button type="submit" id="btnValidarContratos" class="btn btn-block ap-gral-btn"> Validar Contratos </button>
												</div>
												<div class="ap-class-2">
													<button type="button" class="btn btn-block ap-gral-btn btnRuta" data-toggle="modal" data-target="#ap-modal-add-employee"> Agregar </button>
												</div>
											<?php } ?>
											<div class="modal fade" id="ap-modal-add-employee">
												<div class="modal-dialog modal-dialog-centered modal-xl">
													<div class="modal-content">
														<div class="modal-header ap-gral-modal-header">
															<h4 class="modal-title"> Registrar Personal </h4>
															<button type="button" class="close" data-dismiss="modal">
																<i class='fas fa-times ap-gral-fa-times'></i>
															</button>
														</div>
														<div class="modal-body">
															<form class="" onsubmit="return validate_add_employee()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-employee" method="post" enctype="multipart/form-data">
																<div class="container-fluid">
																	<div class="row">
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="foto"> Foto del Empleado: </label>
																				<input type="file" class="form-control" id="foto" name="foto" required accept="image/*">
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="apellido_paterno"> Apellido Paterno: </label>
																				<input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="apellido_materno"> Apellido Materno: </label>
																				<input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="nombre"> Nombre: </label>
																				<input type="text" class="form-control" id="nombre" name="nombre" required>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-4-4-6-12">
																			<div class="form-group">
																				<label for="numero_casa"> Teléfono de Casa: </label>
																				<input type="tel" class="form-control" id="numero_casa" name="numero_casa" pattern="[0-9]{10}" required>
																			</div>
																		</div>
																		<div class="ap-class-4-4-6-12">
																			<div class="form-group">
																				<label for="numero_celular"> Teléfono Celular: </label>
																				<input type="tel" class="form-control" id="numero_celular" name="numero_celular" pattern="[0-9]{10}">
																			</div>
																		</div>
																		<div class="ap-class-4-4-6-12">
																			<div class="form-group">
																				<label for="email"> Correo Electrónico: </label>
																				<input type="email" class="form-control" id="email" name="email" required>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="sexo"> Genero: </label>
																				<select class="form-control" id="sexo" name="sexo" required>
																					<option value="Selecciona-una-opcion"> Selecciona una opción </option>
																					<?php foreach ($tbl_g as $row){ ?>
																						<option value="<?= $row -> id_g ?>"> <?= $row -> genero_g ?> </option>
																					<?php } ?>
																				</select>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="fecha_nacimiento"> Fecha de Nacimiento: </label>
																				<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
																			</div>
																		</div>
																		<!-- <div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="edad"> Edad: </label>
																				<input type="number" class="form-control" id="edad" name="edad" required>
																			</div>
																		</div> -->
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="rfc"> RFC: </label>
																				<input type="text" class="form-control" id="rfc" name="rfc" pattern="[0-9a-zA-Z]{13}" required>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="curp"> CURP: </label>
																				<input type="text" class="form-control" id="curp" name="curp" pattern="[0-9a-zA-Z]{18}" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="imss"> Número del IMSS: </label>
																				<input type="text" class="form-control" id="imss" name="imss" pattern="[0-9]{11}" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="calle"> Calle: </label>
																				<input type="text" class="form-control" id="calle" name="calle" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="numero_exterior"> Número Exterior: </label>
																				<input type="text" class="form-control" id="numero_exterior" name="numero_exterior" required>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="numero_interior"> Número Interior: </label>
																				<input type="text" class="form-control" id="numero_interior" name="numero_interior" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="colonia"> Colonia: </label>
																				<input type="text" class="form-control" id="colonia" name="colonia" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="municipio"> Municipio o Delegación: </label>
																				<input type="text" class="form-control" id="municipio" name="municipio" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="cp"> C.P.: </label>
																				<input type="number" class="form-control" id="cp" name="cp" required>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="fecha_ingreso"> Fecha de Ingreso: </label>
																				<input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="fecha_proximo_contrato"> Fecha para la firma del siguiente contrato: </label>
																				<input type="date" class="form-control" id="fecha_proximo_contrato" name="fecha_proximo_contrato" required>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="turno"> Turno: </label>
																					<select class="form-control" id="turno" name="turno" required>
																						<option value="Selecciona-una-opcion"> Selecciona una opción </option>
																						<?php foreach ($tbl_st as $row){ ?>
																							<option value="<?= $row -> id_st ?>"> <?= $row -> turno_st ?> </option>
																						<?php } ?>
																					</select>
																			</div>
																		</div>
																		<div class="ap-class-3-3-6-12">
																			<div class="form-group">
																				<label for="puesto"> Puesto: </label>
																					<select class="form-control" id="puesto" name="puesto" required>
																						<option value="Selecciona-una-opcion"> Selecciona una opción </option>
																						<?php foreach ($tbl_pue as $rowp) { ?>
																							<option value="<?= $rowp -> id_pue ?>"> <?= $rowp -> puesto_pue ?> </option>
																						<?php } ?>
																					</select>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="ap-class-3">
																			<div class="form-group">
																				<label for="salario_mensual_bruto"> Sueldo: </label>
																				<input type="number" class="form-control" id="salario_mensual_bruto" name="salario_mensual_bruto" required>
																			</div>
																	  </div>
																	  <div class="ap-class-6">
																			<div class="form-group">
																				<label for="lugar_trabajo"> Área de trabajo: </label>
																				<input type="text" class="form-control" id="lugar_trabajo" name="lugar_trabajo" required>
																			</div>
																	  </div>
																	</div>
																	<div class="row">
																	  <div class="ap-class-12">
																			<span id="ap-error-add-employee"></span>
																	  </div>
																	</div>
																	<div class="row">
																	  <div class="ap-class-6 offset-3">
																	  	<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Agregar">
																	  </div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
															</div>
														</form>
														<div class="modal-footer ap-gral-modal-footer">
										        </div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
								  <div class="ap-class-12">
										<?php for ($i = 0; $i < $total_tbl_e; $i++) { ?>
											<input type="hidden" class="form-control" name="" id="proximaFecha<?php echo $i;?>" value="<?= $tbl_e[$i] -> fecha_proximo_contrato_e ?>">
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
														<th> Firmar Contrato </th>
													</tr>
												</thead>
												<tbody id="tablaUserBody">
													<?php foreach ($tbl_e as $row){
														$hoy = date('Y-m-d');?>
														<tr class="<?php if ($row -> fecha_proximo_contrato_e == $hoy){ print_r('table-warning'); }else { print_r(''); }?>">
															<td>
																<ul class="list-group list-group-horizontal">
																	<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-an-employee-s-profile/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> Ver </a> </li>
																	<?php if ($this -> session -> user != "EMapci"){ ?>
																		<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/edit-employee-profile/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> Editar </a> </li>
																		<li class="list-group-item tablaBtnOp btnRuta"> <a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/edit-employee-profile/<?= $row -> encrypt_numero_empleado_e?>" class="btn ap-gral-btn"> IMSS </a> </li>
																	<?php } ?>
																	<!-- <li class="list-group-item tablaBtnOp"> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#ModalConfirmacion"> Eliminar </a> </li> -->
																	<!-- <li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>Recursoshumanos/delete-an-employee/<?= $row -> encrypt_numero_empleado_e?>" class="btn btn-danger"> Eliminar <i class="fas fa-times"></i> </a> </li> -->
																	<!-- <div class="modal fade" id="ModalConfirmacion">
																		<div class="modal-dialog modal-dialog-centered">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title">Confirmación</h4>
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																				</div>
																				<div class="modal-body">
																					<h1> ¿Estas seguro de eliminar este Empleado? </h1>
																				</div>
																				<div class="modal-footer">
																					<a href="<?= base_url()?>RHEO/Eliminar/<?= $row -> idEmp?>" class="btn btn-success"> Eliminar </a>
																				</div>
																			</div>
																		</div>
																	</div> -->
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
															<td>
																<center>
																	<?php if (isset($row -> fecha_proximo_contrato_e)) {
																		print_r($row -> fecha_proximo_contrato_e);
																	}else {
																		print_r('Sin télefono');
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
