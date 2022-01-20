					<div class="col-lg-9 col-md-7 col-sm-12 col-xs-12 registroContainer">
						<div class="row">
							<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 registroContainerBtn">
								<?php if ($userseguimiento != "") {?>
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> -->
										<?php if (empty($totalUserSeguimiento)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Registros</a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($totalUserSeguimiento) ?>  Registros </a>
										<?php } ?>
									<!-- </div> -->
									<a href="#Insert" class="btn btn-outline-primary float-right" data-toggle="collapse"> Insertar </a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tablaFormRegistro">
								<div id="Insert" class="collapse">
									<form class="" action="<?= base_url()?>TelevialesAdm/Insert/seguimiento-del-usuario" method="post">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
												<div class="form-group">
												  <label for="Codigo"> Código de Usuario: </label>
												  <input type="text" class="form-control" id="Codigo" name="Codigo" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
												<div class="form-group">
													<label for="Password"> Password: </label>
													<input type="text" class="form-control" id="Password" name="Password" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
												<div class="form-group">
												  <label for="Usuario"> Usuario: </label>
												  <input type="text" class="form-control" id="Usuario" name="Usuario" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
												<div class="form-group">
												  <label for="Correo"> Correo Electrónico: </label>
												  <input type="email" class="form-control" id="Correo" name="Correo" required>
												</div>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-13">
												<input type="submit" class="btn btn-outline-danger tablaBtn" name="GenerarPass" id="GenerarPass" value="Generar Contraseña">
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
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
										<th> id Usuario </th>
										<th> Código </th>
										<th> Password </th>
										<th> Usuario </th>
										<th> Corrreo Electrónico </th>
										<th> Fecha de Registro </th>
										<th> Operaciónes </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($userseguimiento as $row){ ?>
											<tr>
												<td> <?php if (isset($row -> idUSeguimiento)) {
													print_r($row -> idUSeguimiento);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Codigo)) {
													print_r($row -> Codigo);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Password)) {
													print_r($row -> Password);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Usuario)) {
													print_r($row -> Usuario);
												}else {
													print_r('Sin Registro');
												} ?> </td>
												<td> <?php if (isset($row -> Correo)) {
													print_r($row -> Correo);
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
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Ver/seguimiento-del-usuario/<?= $row -> idUSeguimiento?>" class="btn btn-outline-success"> Ver </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Editar/seguimiento-del-usuario/<?= $row -> idUSeguimiento?>" class="btn btn-outline-warning"> Editar </a> </li>
														<li class="list-group-item tablaBtnOp"> <a href="<?= base_url()?>TelevialesAdm/Eliminar/seguimiento-del-usuario/<?= $row -> idUSeguimiento?>" class="btn btn-outline-danger"> Eliminar </a> </li>
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
									<?php if (count($totalUserSeguimiento) != 0) {
										$rows = 5;
										$pagRegistros = ceil(count($totalUserSeguimiento)/$rows);
										if ($pagRegistros <= 1) {
										}elseif ($pagRegistros <= 3) { ?>
											<ul class="pagination justify-content-center">
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
										  </ul>
										<?php }else { ?>
											<ul class="pagination justify-content-center">
										    <li class="page-item <?php echo ($pagina == 1) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario/<?= $pagina-1 ?>"> Previous </a> </li>
												<?php for ($i=1; $i <= $pagRegistros; $i++) { ?>
													<li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario/<?= $i ?>"> <?php print_r($i); ?> </a> </li>
												<?php } ?>
												<li class="page-item <?php echo ($pagina == $pagRegistros) ? 'disabled' : '' ?>"> <a class="page-link" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario/<?= $pagina+1 ?>"> Next </a> </li>
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
									url: '<?= base_url()?>TelevialesAdm/GenerarPass/',
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
