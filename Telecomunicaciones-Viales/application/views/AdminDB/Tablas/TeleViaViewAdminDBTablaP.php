					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($paquete != "") {?>
									<!-- <div class="row"> -->
									<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> -->
										<?php if (empty($totalPaquetes)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalPaquetes) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> -->
										<!-- <h2> <a href="#" data-toggle="tooltip" data-placement="right" title="Todos los campos de las descripciones NO son obligatorios, puedes dejar alguno en blanco."> Nota. </a> </h2> -->
									<!-- </div> -->
									<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> -->
										<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
									<!-- </div> -->
								<!-- </div> -->
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/paquete" method="post">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Paquete"> Paquete: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre debe de ir en MAYUSCULAS"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
												  <input type="text" class="form-control" id="Paquete" name="Paquete" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Precio"> Precio: </label>
												  <input type="text" class="form-control" id="Precio" name="Precio" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Descripcion1"> Descripción 1: </label>
												  <input type="text" class="form-control" id="Descripcion1" name="Descripcion1">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Descripcion2"> Descripción 2: </label>
												  <input type="text" class="form-control" id="Descripcion2" name="Descripcion2">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Descripcion3"> Descripción 3: </label>
												  <input type="text" class="form-control" id="Descripcion3" name="Descripcion3">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Descripcion4"> Descripción 4: </label>
												  <input type="text" class="form-control" id="Descripcion4" name="Descripcion4">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Descripcion5"> Descripción 5: </label>
												  <input type="text" class="form-control" id="Descripcion5" name="Descripcion5">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Logo"> Logo: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre del logo debe de tener la extención (png, jpeg, etc) y debe de estar en la carpeta de Iconos/Paquetes"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
												  <input type="text" class="form-control" id="Logo" name="Logo" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="Ruta"> Ruta: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="La ruta debe de ir en MINUSCULAS y sin espacios. Los espacios llenalos con (-)"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
												  <input type="text" class="form-control" id="Ruta" name="Ruta" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
												<input type="submit" class="btn btn-outline-primary tablaBtn" name="" value="Aceptar">
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<h3> <a href="#" data-toggle="tooltip" data-placement="right" title="Todos los campos de las descripciones NO son obligatorios, puedes dejar alguno en blanco."> Nota. </a> </h3>
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
										<th> id Paquete </th>
										<th> Paquete </th>
										<th> Precio </th>
										<th> Descripción 1 </th>
										<th> Descripción 2 </th>
										<th> Descripción 3 </th>
										<th> Descripción 4 </th>
										<th> Descripción 5 </th>
										<th> Logo </th>
										<th> Ruta </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($paquete as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> idPaquete)) {
													print_r($row -> idPaquete);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Paquete)) {
													print_r($row -> Paquete);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Precio)) {
													print_r($row -> Precio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Descripcion1)) {
													print_r($row -> Descripcion1);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Descripcion2)) {
													print_r($row -> Descripcion2);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Descripcion3)) {
													print_r($row -> Descripcion3);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Descripcion4)) {
													print_r($row -> Descripcion4);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Descripcion5)) {
													print_r($row -> Descripcion5);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Logo)) {
													print_r($row -> Logo);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Ruta)) {
													print_r($row -> Ruta);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/paquete/<?= $row -> idPaquete?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/paquete/<?= $row -> idPaquete?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/paquete/<?= $row -> idPaquete?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalPaquetes) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalPaquetes)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/paquete/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/paquete/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/paquete/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/paquete/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
