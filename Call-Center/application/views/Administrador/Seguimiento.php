<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	<div class="container">
		<br><br>
		<center> <h1> Seguimientos </h1> </center>
		<br><br>
		<?php if ($seguimiento != ""){ ?>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<?php if (empty($seguimiento)) { ?>
						<a href="#" class="btn btn-outline-primary float-left">Total : 0 Seguimientos </a>
					<?php }else{ ?>
						<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($seguimiento) ?>  Seguimientos </a>
						<input type="hidden" name="" id="totalRegistros" value="<?php echo count($seguimiento) ?>">
					<?php } ?>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<button class="btn btn-outline-dark" data-toggle="collapse" data-target="#SerachE"> Buscar por Ejecutivo </button>
					<br><br>
					<div id="SerachE" class="collapse">
						<form class="" onsubmit="return ValidarBusquedaE()" action="<?= base_url()?>Administrador/ver-seguimiento-de-llamadas/buscar-por-ejecutivo" method="post">
							<span id="errorFormBE">  </span>
							<label for="Ejecutivo"> Ejecutivo Teléfonico </label>
							<select class="form-control" id="Ejecutivo" name="Ejecutivo" required>
								<option value="Selecciona-una-opcion"> Selecciona una opción </option>
								<?php foreach ($usuarioE as $row){ ?>
									<option value="<?= $row -> IdUsuario ?>"> <?= $row -> CallNombre ?> </option>
								<?php } ?>
							</select>
							<br>
							<input type="submit" class="btn btn-outline-success float-right" name="" value="buscar">
						</form>
					</div>
					<!-- <input class="form-control" id="SearchSeg" type="search" placeholder="Search.."> -->
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<button class="btn btn-outline-dark" data-toggle="collapse" data-target="#SerachEF"> Buscar por Ejecutivo y Fecha </button>
					<br><br>
					<div id="SerachEF" class="collapse">
						<form class="" onsubmit="return ValidarBusquedaET()" action="<?= base_url()?>Administrador/ver-seguimiento-de-llamadas/buscar-por-ejecutivo-y-fecha" method="post">
							<span id="errorFormBEF">  </span>
							<div class="row">
						  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="EjecutivoTF"> Ejecutivo Teléfonico </label>
									<select class="form-control" id="EjecutivoTF" name="EjecutivoTF" required>
										<option value="Selecciona-una-opcion"> Selecciona una opción </option>
										<?php foreach ($usuarioE as $row){ ?>
											<option value="<?= $row -> IdUsuario ?>"> <?= $row -> CallNombre ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="EjecutivoTFe"> Fecha </label>
									<input class="form-control" type="date" name="EjecutivoTFe" id="EjecutivoTFe" required>
								</div>
						  </div>
							<br>
							<input type="submit" class="btn btn-outline-success float-right" name="" value="buscar">
						</form>
					</div>
					<!-- <input class="form-control" id="SearchSeg" type="search" placeholder="Search.."> -->
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr class="text-center">
								<th> Ejecutivo </th>
								<th> Paquete </th>
								<th> Apellido Paterno del Prospecto </th>
								<th> Apellido Materno del Prospecto </th>
								<th> Nombre del Prospecto </th>
								<th> Fecha de proxima llamada </th>
								<th> Hora de proxima Llamada </th>
							</tr>
						</thead>
						<tbody id="tablaSeguimientos">
							<?php foreach ($seguimiento as $row){ ?>
								<tr>
									<td>
										<center>
											<?php if (isset($row -> CallUsuario)) {
												foreach ($usuario as $rowp) {
													if ($rowp -> IdUsuario == $row -> CallUsuario) {
														print_r($rowp -> CallUsuario);
													}
												}
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallPaquete)) {
												foreach ($paquete as $rowp) {
													if ($rowp -> idPaquete == $row -> CallPaquete) {
														print_r($rowp -> CallPaquete);
													}
												}
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallApPaterno)) {
												print_r($row -> CallApPaterno);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallApMaterno)) {
												print_r($row -> CallApMaterno);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallNombres)) {
												print_r($row -> CallNombres);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallFSeguimiento)) {
												print_r($row -> CallFSeguimiento);
											}else {
												print_r('Sin Fecha de Seguimiento');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if ($row -> CallHSeguimiento != "") {
												print_r($row -> CallHSeguimiento);
											}else {
												print_r('Sin Hora de Seguimiento');
											} ?>
										</center>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		<?php }else { ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<center> <h1> Buen trabajo. No cuentas con Seguimientos </h1> <img src="<?= base_url()?>images/Icono/Call_Icon_S.png" alt="Call_Icon_S">	</center>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>
</div>
