<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	<div class="container">
		<br><br>
		<center> <h1> Sesiones </h1> </center>
		<br><br>
		<?php if ($sesiones != ""){ ?>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<?php if (empty($sesiones)) { ?>
						<a href="#" class="btn btn-outline-primary float-left">Total : 0 Sesiones </a>
					<?php }else{ ?>
						<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo count($sesiones) ?>  Sesiones </a>
						<input type="hidden" name="" id="totalRegistros" value="<?php echo count($sesiones) ?>">
					<?php } ?>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<button class="btn btn-outline-dark" data-toggle="collapse" data-target="#SerachE"> Buscar por Empleado </button>
					<br><br>
					<div id="SerachE" class="collapse">
						<form class="" onsubmit="return ValidarBusquedaE()" action="<?= base_url()?>Administrador/reportes/sesiones/buscar-por-empleado" method="post">
							<span id="errorFormBEm">  </span>
							<label for="CallUsuario"> Empleado </label>
							<select class="form-control" id="CallUsuario" name="CallUsuario" required>
								<option value="Selecciona-una-opcion"> Selecciona una opción </option>
								<?php foreach ($usuario as $row){ ?>
									<option value="<?= $row -> IdUsuario ?>"> <?= $row -> CallNombre ?> </option>
								<?php } ?>
							</select>
							<br>
							<input type="submit" class="btn btn-outline-success float-right" name="" value="buscar">
						</form>
					</div>
					<!-- <input class="form-control" id="SearchSeg" type="search" placeholder="Search.."> -->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<button class="btn btn-outline-dark" data-toggle="collapse" data-target="#SerachED"> Buscar por Empleado y Día </button>
					<br><br>
					<div id="SerachED" class="collapse">
						<form class="" onsubmit="return ValidarBusquedaET()" action="<?= base_url()?>Administrador/reportes/sesiones/buscar-por-empleado-y-dia" method="post">
							<span id="errorFormBEmF">  </span>
							<div class="row">
						  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="CallUsuarioF"> Empleado </label>
									<select class="form-control" id="CallUsuarioF" name="CallUsuarioF" required>
										<option value="Selecciona-una-opcion"> Selecciona una opción </option>
										<?php foreach ($usuario as $row){ ?>
											<option value="<?= $row -> IdUsuario ?>"> <?= $row -> CallNombre ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="CallFSesionF"> Día </label>
									<input class="form-control" type="date" name="CallFSesionF" id="CallFSesionF" required>
								</div>
						  </div>
							<br>
							<input type="submit" class="btn btn-outline-success float-right" name="" value="buscar">
						</form>
					</div>
					<!-- <input class="form-control" id="SearchSeg" type="search" placeholder="Search.."> -->
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<button class="btn btn-outline-dark" data-toggle="collapse" data-target="#SerachEF"> Buscar por Mes y Empleado </button>
					<br><br>
					<div id="SerachEF" class="collapse">
						<form class="" onsubmit="return ValidarBusquedaEmT()" action="<?= base_url()?>Administrador/reportes/sesiones/buscar-por-empleado-y-mes" method="post">
							<span id="errorFormBEmSF">  </span>
							<div class="row">
						  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="CallUsuarioEF"> Empleado </label>
									<select class="form-control" id="CallUsuarioEF" name="CallUsuarioEF" required>
										<option value="Selecciona-una-opcion"> Selecciona una opción </option>
										<?php foreach ($usuario as $row){ ?>
											<option value="<?= $row -> IdUsuario ?>"> <?= $row -> CallNombre ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label for="CallFSesionM"> Mes </label>
									<input class="form-control" type="month" name="CallFSesionM" id="CallFSesionM" required>
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
								<th> Empleado </th>
								<th> Hora de inicio de sesión </th>
								<th> Hora fin de sesión </th>
								<th> Fecha de la sesión </th>
								<th> Tiempo en Horas de Sesión </th>
								<th> Tiempo en Minutos de Sesión </th>
								<th> Tiempo en Segundos de Sesión </th>
							</tr>
						</thead>
						<tbody id="tablaSeguimientos">
							<?php foreach ($sesiones as $row){
								// calculamos el tiempo de sesión
								$tiempoSesionS = strtotime($row -> CallHCSesion)-strtotime($row -> CallHSesion);
								$tiempoSesionM = round($tiempoSesionS/60);
								$tiempoSesionH = round($tiempoSesionM/60);
								// print_r($tiempoSesionH);
								// echo "<br>";
								// print_r($tiempoSesionM);
								// echo "<br>";
								// print_r($tiempoSesionS);
								?>
								<tr>
									<td>
										<center>
											<?php if (isset($row -> CallUsuario)) {
												foreach ($usuario as $rowp) {
													if ($rowp -> IdUsuario == $row -> CallUsuario) {
														print_r($rowp -> CallNombre);
													}
												}
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallHSesion)) {
												print_r($row -> CallHSesion);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallHCSesion)) {
												print_r($row -> CallHCSesion);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (isset($row -> CallFCSesion)) {
												print_r($row -> CallFCSesion);
											}else {
												print_r('Sin Registro');
											} ?>
										</center>
									</td>
									<td>
										<center>
											<?php print_r($tiempoSesionH." ". "Horas"); ?>
										</center>
									</td>
									<td>
										<center>
											<?php print_r($tiempoSesionM." ". "Minutos"); ?>
										</center>
									</td>
									<td>
										<center>
											<?php print_r($tiempoSesionS." ". "Segundos"); ?>
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
					<center> <h1> Lo sentimos no existen registros de las sesiones de los usuarios </h1> <img src="<?= base_url()?>images/Icono/Call_Icon_B.png" alt="Call_Icon_B">	</center>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>
</div>
