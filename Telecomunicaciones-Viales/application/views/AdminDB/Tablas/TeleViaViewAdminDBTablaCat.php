					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($categoria != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalCategorias)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalCategorias) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/categoria" method="post">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="oportunidad"> Nombre de la Categoría: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre debe de ir en MAYUSCULAS"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="oportunidad" name="oportunidad">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="Ruta"> Ruta de la Categoría: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="La ruta debe de ir en MINUSCULAS y sin espacios. Los espacios llenalos con (-)"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="Ruta" name="Ruta">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<div class="form-group">
													<label for="banner_imagen"> Imagen d ela Categoría: <a class="float-right" href="#" data-toggle="tooltip" data-placement="right" title="El nombre de la imagen debe de tener la extención (png, jpeg, etc) y debe de estar en la carpeta de Banner"> <img src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Q.png" alt="Televia_Icon_Q"> </a> </label>
													<input type="text" class="form-control" id="banner_imagen" name="banner_imagen">
												</div>
											</div>
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
										<th> id de la Categoría </th>
										<th> Categoría </th>
										<th> Ruta </th>
										<th> Imagen </th>
										<th> Fecha de Registro </th>
										<th> Operaciones </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($categoria as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> id_oportunidad)) {
													print_r($row -> id_oportunidad);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> oportunidad)) {
													print_r($row -> oportunidad);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Ruta)) {
													print_r($row -> Ruta);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> banner_imagen)) {
													print_r($row -> banner_imagen);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/categoria/<?= $row -> id_oportunidad?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/categoria/<?= $row -> id_oportunidad?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/categoria/<?= $row -> id_oportunidad?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalCategorias) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalCategorias)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/categoria/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/categoria/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/categoria/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/categoria/<?= $pagina+1 ?>"> Next </a> </li>
										  </ul>
										<?php }
									}else {
									} ?>
								</div>
							</div>
						</div>
