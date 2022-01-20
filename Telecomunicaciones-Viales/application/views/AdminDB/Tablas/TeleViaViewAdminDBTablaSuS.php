					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($subservicio != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalSubServicios)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalSubServicios) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/subservicio" method="post">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="subser"> Nombre del SubServicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre debe de ir en MAYUSCULAS"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="subser" name="subser">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="Ruta"> Ruta del SubServicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="La ruta debe de ir en MINUSCULAS y sin espacios. Los espacios llenalos con (-)"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="Ruta" name="Ruta">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="precio"> Precio del SubServicio: </label>
													<input type="text" class="form-control" id="precio" name="precio">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="descripcion"> Descripción 1: </label>
												  <input type="text" class="form-control" id="descripcion" name="descripcion">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="descripcion2"> Descripción 2: </label>
												  <input type="text" class="form-control" id="descripcion2" name="descripcion2">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="descripcion3"> Descripción 3: </label>
												  <input type="text" class="form-control" id="descripcion3" name="descripcion3">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="logo"> Imagen del SubServicio: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre de la imagen debe de tener la extención (png, jpeg, etc) y debe de estar en alguna carpeta del Servidor"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
												  <input type="text" class="form-control" id="logo" name="logo">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="requisitos"> Requisitos 1: </label>
												  <input type="text" class="form-control" id="requisitos" name="requisitos">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="requisitos2"> Requisitos 2: </label>
												  <input type="text" class="form-control" id="requisitos2" name="requisitos2">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="requisitos3"> Requisitos 3: </label>
												  <input type="text" class="form-control" id="requisitos3" name="requisitos3">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="requisitos4"> Requisitos 4: </label>
												  <input type="text" class="form-control" id="requisitos4" name="requisitos4">
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<div class="form-group">
												  <label for="id_ser"> Servicio: </label>
													<select class="form-control" name="id_ser" id="id_ser">
														<?php foreach ($servicio as $row){ ?>
															<option value="<?= $row -> id_ser ?>"> <?= $row -> servicio ?> </option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
												<input type="submit" class="btn btn-outline-primary tablaBtn" name="" value="Aceptar">
											</div>
											<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
												<h3> <a href="#" data-toggle="tooltip" data-placement="right" title="Todos los campos de las descripciones y los requisitos NO son obligatorios, puedes dejar alguno en blanco."> Nota. </a> </h3>
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
										<th> id del SubServicio </th>
										<th> SubServicio </th>
										<th> Ruta </th>
										<th> Precio </th>
										<th> Descripción 1 </th>
										<th> Descripción 2 </th>
										<th> Descripción 3 </th>
										<th> Logo </th>
										<th> Requisitos 1 </th>
										<th> Requisitos 2 </th>
										<th> Requisitos 3 </th>
										<th> Requisitos 4 </th>
										<th> id del Servicio </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($subservicio as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> id_subser)) {
													print_r($row -> id_subser);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> subser)) {
													print_r($row -> subser);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Ruta)) {
													print_r($row -> Ruta);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> precio)) {
													print_r($row -> precio);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> descripcion)) {
													print_r($row -> descripcion);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> descripcion2)) {
													print_r($row -> descripcion2);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> descripcion3)) {
													print_r($row -> descripcion3);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> logo)) {
													print_r($row -> logo);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> requisitos)) {
													print_r($row -> requisitos);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> requisitos2)) {
													print_r($row -> requisitos2);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> requisitos3)) {
													print_r($row -> requisitos3);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> requisitos4)) {
													print_r($row -> requisitos4);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> id_ser)) {
													print_r($row -> id_ser);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/subservicio/<?= $row -> id_subser?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/subservicio/<?= $row -> id_subser?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/subservicio/<?= $row -> id_subser?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalSubServicios) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalSubServicios)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/subservicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/subservicio/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/subservicio/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/subservicio/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
