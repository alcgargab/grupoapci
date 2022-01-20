					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($serseguimiento != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalSeguimiento)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalSeguimiento) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/seguimiento-del-servicio" method="post">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="SS_id_subser"> SubServicio: </label>
													<select class="form-control" id="SS_id_subser" name="SS_id_subser" required>
														<?php foreach ($totalSubServicios as $row){ ?>
															<option value="<?= $row -> id_subser?>"> <?= $row -> subser?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="SS_idUSeguimiento"> Usuario: </label>
													<select class="form-control" id="SS_idUSeguimiento" name="SS_idUSeguimiento" required>
														<?php foreach ($totalUser as $row){ ?>
															<option value="<?= $row -> idUSeguimiento?>"> <?= $row -> Usuario?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="StatusProceso"> Status del Proceso: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="Porcentaje en número del Proceso"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="StatusProceso" name="StatusProceso">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="StatusServicio"> Status del Servicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="0 si el servicio esta en proceso y 1 si ya se termino el proceso"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
												  <input type="text" class="form-control" id="StatusServicio" name="StatusServicio">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="FTermino"> Fecha de Termino: </label>
												  <input type="date" class="form-control" id="FTermino" name="FTermino">
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
										<th> id del Seguimiento </th>
										<th> id del SubServicio </th>
										<th> id del Ususario </th>
										<th> Status del Proceso </th>
										<th> Status del Servicio </th>
										<th> Fecha de Termino </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($serseguimiento as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> idSerSeguimiento)) {
													print_r($row -> idSerSeguimiento);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> SS_id_subser)) {
													print_r($row -> SS_id_subser);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> SS_idUSeguimiento)) {
													print_r($row -> SS_idUSeguimiento);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> StatusProceso)) {
													print_r($row -> StatusProceso);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> StatusServicio)) {
													print_r($row -> StatusServicio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> FTermino)) {
													print_r($row -> FTermino);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/seguimiento-del-servicio/<?= $row -> idSerSeguimiento?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/seguimiento-del-servicio/<?= $row -> idSerSeguimiento?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/seguimiento-del-servicio/<?= $row -> idSerSeguimiento?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalSeguimiento) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalSeguimiento)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
