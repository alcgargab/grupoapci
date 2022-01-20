					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($usuariocc != "") {?>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<?php if (empty($totalUser)) { ?>
												<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
											<?php }else{ ?>
												<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalUser) ?>  Registros </a>
											<?php } ?>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<input class="form-control" id="SearchUser" type="search" placeholder="Search..">
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#ModalRegistro"> Insertar Registro </button>
										</div>
									</div>
							</div>
						</div>
					  <div class="modal fade" id="ModalRegistro">
					    <div class="modal-dialog modal-dialog-centered modal-xl">
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title"> Registrar Usuario </h4>
					          <button type="button" class="close" data-dismiss="modal"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Close.png" alt="Televia_Icon_Close"> </button>
					        </div>
					        <div class="modal-body">
										<form class="" action="<?= base_url()?>CallCenterAdm/Insert/usuario" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="FotoUser"> Foto: </label>
													  <input type="file" class="form-control" id="FotoUser" name="FotoUser">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="ApellidoP"> Apellido Paterno: </label>
													  <input type="text" class="form-control" id="ApellidoP" name="ApellidoP" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="ApellidoM"> Apellido Materno: </label>
														<input type="text" class="form-control" id="ApellidoM" name="ApellidoM" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="Nombre"> Nombre: </label>
														<input type="text" class="form-control" id="Nombre" name="Nombre" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="NumeroCasa"> Teléfono de casa: </label>
														<input type="tel" class="form-control" id="NumeroCasa" name="NumeroCasa" required pattern="[0-9]{8}">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="NumeroCelular"> Teléfono celular: </label>
														<input type="tel" class="form-control" id="NumeroCelular" name="NumeroCelular" pattern="[0-9]{10}">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="FNacimiento"> Fecha de Nacimiento: </label>
														<input type="date" class="form-control" id="FNacimiento" name="FNacimiento" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="NumActa"> Número de Acta de Nacimiento: </label>
														<input type="text" class="form-control" id="NumActa" name="NumActa" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="CURP"> CURP: </label>
														<input type="text" class="form-control" id="CURP" name="CURP" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="RFC"> RFC: </label>
														<input type="text" class="form-control" id="RFC" name="RFC" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="INE"> INE: </label>
														<input type="text" class="form-control" id="INE" name="INE" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="IMSS"> Número del IMSS: </label>
														<input type="text" class="form-control" id="IMSS" name="IMSS" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="FIngreso"> Fecha de Ingreso: </label>
														<input type="date" class="form-control" id="FIngreso" name="FIngreso" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="FBaja"> Fecha de Baja: </label>
														<input type="date" class="form-control" id="FBaja" name="FBaja">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="MotivoBaja"> Motivo de la Baja: </label>
														<input type="text" class="form-control" id="MotivoBaja" name="MotivoBaja">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
													<div class="form-group">
													  <label for="NumEmpleado"> Número de Empleado: </label>
														<input type="text" class="form-control" id="NumEmpleado" name="NumEmpleado" required>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
													<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
												</div>
											</div>
					        </div>
					        <div class="modal-footer">
					          <input type="submit" class="btn btn-outline-danger" data-dismiss="modal" value="Cancelar">
										<input type="submit" class="btn btn-outline-success" name="" value="Insertar">
					        </div>
								</form>
					      </div>
					    </div>
					  </div>
						<div class="table-responsive tablaRegistros">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center tablaHeader">
										<th> id Usuario </th>
										<th> Foto </th>
										<th> Apellido Paterno </th>
										<th> Apellido Materno </th>
										<th> Nombre </th>
										<th> Teléfono de Casa </th>
										<th> Teléfono Celular </th>
										<th> Fecha de Nacimiento </th>
										<th> Número de Acta de Nacimiento </th>
										<th> CURP </th>
										<th> RFC </th>
										<th> INE </th>
										<th> Número de IMSS </th>
										<th> Fecha de Ingreso </th>
										<th> Fecha de Baja </th>
										<th> Motivo de la Baja </th>
										<th> Número de Empleado </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody id="tablaUserBody">
									<?php foreach ($usuariocc as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> idUsuario)) {
													print_r($row -> idUsuario);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FotoUser)) {?>
													<img class="" src="<?= base_url().$row -> FotoUser?>" alt="">
												<?php }else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> ApellidoP)) {
													print_r($row -> ApellidoP);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> ApellidoM)) {
													print_r($row -> ApellidoM);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Nombre)) {
													print_r($row -> Nombre);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if ($row -> NumeroCasa != "") {
													print_r($row -> NumeroCasa);
												}else {
													print_r('Sin télefono');
												} ?> </td>
												<td> <?php if ($row -> NumeroCelular != "") {
													print_r($row -> NumeroCelular);
												}else {
													print_r('Sin télefono');
												} ?> </td>
												<td> <?php if (isset($row -> FNacimiento)) {
													print_r($row -> FNacimiento);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> NumActa)) {
													print_r($row -> NumActa);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> CURP)) {
													print_r($row -> CURP);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> RFC)) {
													print_r($row -> RFC);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> INE)) {
													print_r($row -> INE);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> IMSS)) {
													print_r($row -> IMSS);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FIngreso)) {
													print_r($row -> FIngreso);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FBaja)) {
													print_r($row -> FBaja);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> MotivoBaja)) {
													print_r($row -> MotivoBaja);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> NumEmpleado)) {
													print_r($row -> NumEmpleado);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FRegistro)) {
													print_r($row -> FRegistro);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td>
													<ul class="list-group list-group-horizontal">
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>CallCenterAdm/Ver/usuario/<?= $row -> idUsuario?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>CallCenterAdm/Editar/usuario/<?= $row -> idUsuario?>" class="btn btn-outline-warning"> Editar </a> </li>
														<!-- <li class="list-group-item tablaBtnOp"> <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalConfirmacion"> Eliminar </a> </li> -->
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>CallCenterAdm/Eliminar/usuario/<?= $row -> idUsuario?>" class="btn btn-outline-danger"> Eliminar </a> </li>
														<div class="modal fade" id="ModalConfirmacion">
													    <div class="modal-dialog modal-dialog-centered">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Confirmación</h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
													          <h1> ¿Estas seguro de eliminar este registro? </h1>
													        </div>
													        <div class="modal-footer">
													          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
																		<a href="<?= base_url()?>CallCenterAdm/Eliminar/usuario/<?= $row -> idUsuario?>" class="btn btn-outline-success"> Eliminar </a>
													        </div>
													      </div>
													    </div>
													  </div>
													</ul>
												</td>
												<?php }?>
											</tr>
										<?php }else { ?>
											<div class="container ErrorRegistros">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<center> <h1>No Existen registros</h1> </center>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#ModalRegistro"> Agregar Registro </button>
													</div>
												</div>
											</div>
											<div class="modal fade" id="ModalRegistro">
										    <div class="modal-dialog modal-dialog-centered modal-xl">
										      <div class="modal-content">
										        <div class="modal-header">
										          <h4 class="modal-title"> Registrar Usuario </h4>
										          <button type="button" class="close" data-dismiss="modal"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Close.png" alt="Televia_Icon_Close"> </button>
										        </div>
										        <div class="modal-body">
															<form class="" action="<?= base_url()?>CallCenterAdm/Insert/usuario" method="post" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="FotoUser"> Foto: </label>
																		  <input type="file" class="form-control" id="FotoUser" name="FotoUser" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="ApellidoP"> Apellido Paterno: </label>
																		  <input type="text" class="form-control" id="ApellidoP" name="ApellidoP" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="ApellidoM"> Apellido Materno: </label>
																			<input type="text" class="form-control" id="ApellidoM" name="ApellidoM" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="Nombre"> Nombre: </label>
																			<input type="text" class="form-control" id="Nombre" name="Nombre" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="NumeroCasa"> Teléfono de casa: </label>
																			<input type="tel" class="form-control" id="NumeroCasa" name="NumeroCasa" required pattern="[0-9]{8}">
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="NumeroCelular"> Teléfono celular: </label>
																			<input type="tel" class="form-control" id="NumeroCelular" name="NumeroCelular" pattern="[0-9]{10}">
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="FNacimiento"> Fecha de Nacimiento: </label>
																			<input type="date" class="form-control" id="FNacimiento" name="FNacimiento" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="NumActa"> Número de Acta de Nacimiento: </label>
																			<input type="text" class="form-control" id="NumActa" name="NumActa" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="CURP"> CURP: </label>
																			<input type="text" class="form-control" id="CURP" name="CURP" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="RFC"> RFC: </label>
																			<input type="text" class="form-control" id="RFC" name="RFC" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="INE"> INE: </label>
																			<input type="text" class="form-control" id="INE" name="INE" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="IMSS"> Número del IMSS: </label>
																			<input type="text" class="form-control" id="IMSS" name="IMSS" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="FIngreso"> Fecha de Ingreso: </label>
																			<input type="date" class="form-control" id="FIngreso" name="FIngreso" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="FBaja"> Fecha de Baja: </label>
																			<input type="date" class="form-control" id="FBaja" name="FBaja">
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="MotivoBaja"> Motivo de la Baja: </label>
																			<input type="text" class="form-control" id="MotivoBaja" name="MotivoBaja">
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-13">
																		<div class="form-group">
																		  <label for="NumEmpleado"> Número de Empleado: </label>
																			<input type="text" class="form-control" id="NumEmpleado" name="NumEmpleado" required>
																		</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																		<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
																	</div>
																</div>
										        </div>
										        <div class="modal-footer">
										          <input type="submit" class="btn btn-outline-danger" data-dismiss="modal" value="Cancelar">
															<input type="submit" class="btn btn-outline-success" name="" value="Insertar">
										        </div>
													</form>
										      </div>
										    </div>
										  </div>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<?php //if (count($totalUser) != 0) {?>
									<?php if ($totalUser != "") {
										$rows = 5;
										$pagRegistros = ceil(count($totalUser)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>CallCenterAdm/Tabla/usuario/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>CallCenterAdm/Tabla/usuario/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>CallCenterAdm/Tabla/usuario/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>CallCenterAdm/Tabla/usuario/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$("#GenerarPass").click(function(event) {
								$.ajax({
									data: "",
									url: '<?= base_url()?>CallCenterAdm/GenerarPass/',
									type: 'post',
									beforeSend: function() {
										$("#GenerarPass").val("Procesando");
									},
									success: function(respuesta) {
										$("#Password").val(respuesta);
										$("#GenerarPass").val("Generar Contraseña");
									}
								});
							});
						</script>
