					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($correo != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalCorreos)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalCorreos) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/correo" method="post">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Usuario"> Nombre: </label>
												  <input type="text" class="form-control" id="Usuario" name="Usuario" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="CorreoElectronico"> Correo Electrónico: </label>
												  <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Asunto"> Asunto: </label>
												  <input type="text" class="form-control" id="Asunto" name="Asunto" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="NumTelefonico"> Número de Teléfono: </label>
												  <input type="tel" class="form-control" id="NumTelefonico" name="NumTelefonico" required pattern="[0-9]{8}">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Comentarios"> Comentarios: </label>
												  <input type="text" class="form-control" id="Comentarios" name="Comentarios" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
												<input type="submit" class="btn btn-outline-primary tablaBtn" name="" value="Aceptar">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="table-responsive tablaRegistros">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center tablaHeader">
										<th> id Correo </th>
										<th> Usuario </th>
										<th> Correo Electrónico </th>
										<th> Asunto </th>
										<th> Número de Teléfono </th>
										<th> Comentarios </th>
										<th> Fecha de Envio </th>
										<th> Ubicación </th>
										<th> Direccion Ip </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($correo as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> idCorreo)) {
													print_r($row -> idCorreo);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Usuario)) {
													print_r($row -> Usuario);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> CorreoElectronico)) {
													print_r($row -> CorreoElectronico);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Asunto)) {
													print_r($row -> Asunto);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> NumTelefonico)) {
													print_r($row -> NumTelefonico);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Comentarios)) {
													print_r($row -> Comentarios);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FEnvio)) {
													print_r($row -> FEnvio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Ubicacion)) {
													print_r($row -> Ubicacion);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> DireccionIp)) {
													print_r($row -> DireccionIp);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td>
													<ul class="list-group list-group-horizontal">
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/correo/<?= $row -> idCorreo?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/correo/<?= $row -> idCorreo?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/correo/<?= $row -> idCorreo?>" class="btn btn-outline-danger"> Eliminar </a> </li>
													</ul>
												</td>
											<?php }?>
										</tr>
										<?php }else { ?>
											<center> <h1>No Existen registros</h1> </center>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<?php if (count($totalCorreos) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalCorreos)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/correo/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/correo/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/correo/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/correo/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
