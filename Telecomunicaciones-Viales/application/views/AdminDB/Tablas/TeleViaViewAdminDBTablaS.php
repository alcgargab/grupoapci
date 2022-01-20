					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($servicio != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalServicios)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalServicios) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/servicio" method="post">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="servicio"> Nombre del Servicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre debe de ir en MAYUSCULAS"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="servicio" name="servicio">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="Ruta"> Ruta del Servicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="La ruta debe de ir en MINUSCULAS y sin espacios. Los espacios llenalos con (-)"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="Ruta" name="Ruta">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="icono"> Imagen del Servicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre de la imagen debe de tener la extención (png, jpeg, etc) y debe de estar en alguna carpeta del Servidor"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="icono" name="icono">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="id_ser_oportunidad"> Categoría: </label>
													<select class="form-control" name="id_ser_oportunidad" id="id_ser_oportunidad">
														<?php foreach ($categoria as $row){ ?>
															<option value="<?= $row -> id_oportunidad ?>"> <?= $row -> oportunidad ?> </option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
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
										<th> id del Servicio </th>
										<th> Servicio </th>
										<th> Ruta </th>
										<th> Imagen </th>
										<th> id de la Categoría </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($servicio as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> id_ser)) {
													print_r($row -> id_ser);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> servicio)) {
													print_r($row -> servicio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Ruta)) {
													print_r($row -> Ruta);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> icono)) {
													print_r($row -> icono);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> id_ser_oportunidad)) {
													print_r($row -> id_ser_oportunidad);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/servicio/<?= $row -> id_ser?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/servicio/<?= $row -> id_ser?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/servicio/<?= $row -> id_ser?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalServicios) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalServicios)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/servicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/servicio/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/servicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/servicio/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
