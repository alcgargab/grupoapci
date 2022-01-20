		<br><br><br>
		<div class="container-fluid">
			<div class="row">
			  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<center>
						<a href="<?= base_url()?>">
							<img src="<?= base_url()?>images/Usuario/<?php print_r($this -> session -> ImagenSesion); ?>" alt="<?php print_r($this -> session -> ImagenSesion); ?>" width="350px" height="350px">
							<br><br>
							<h3 style="color: black"> <?php print_r($this -> session -> UNameSesion); ?> </h3>
						</a>
					</center>
					<br><br><br>
					<a href="<?= base_url()?>Administrador/ver-llamadas" class="btn btn-outline-success btn-block"> <h2> Ver Llamadas </h2> </a>
					<br><br>
					<a href="<?= base_url()?>Administrador/ver-seguimiento-de-llamadas" class="btn btn-outline-info btn-block"> <h2> Ver Seguimiento de Llamadas </h2> </a>
					<br><br>
					<a href="<?= base_url()?>Administrador/reportes" class="btn btn-outline-dark btn-block"> <h2> Generar Reportes </h2> </a>
					<br><br>
					<form class="" action="<?= base_url()?>CallCenter/CerrarSesion" method="post">
						<button type="submit" name="button" class="btn btn-outline-danger btn-block">
							<h2> Cerrar Sesion </h2>
						</button>
						<input type="hidden" name="CallHoraCS" id="CallHoraCS" value="">
					</form>
			  </div>
