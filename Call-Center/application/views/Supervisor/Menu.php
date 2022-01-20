		<br><br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-12">
					<center>
						<a href="<?= base_url()?>">
							<img src="<?= base_url()?>images/Usuario/<?php print_r($this -> session -> ImagenSesion); ?>" alt="<?php print_r($this -> session -> ImagenSesion); ?>" width="100px" class="rounded-circle">
							<br><br>
							<h3 style="color: black"> <?php print_r($this -> session -> UNameSesion); ?> </h3>
						</a>
					</center>
					<br><br><br>
					<a href="<?= base_url()?>Supervisor/historial-de-llamadas" class="btn btn-outline-secondary btn-block"> <h2> Historial de llamadas </h2> </a>
					<br><br>
					<!-- <a href="<?= base_url()?>Supervisor/ver-llamadas" class="btn btn-outline-success btn-block"> <h2> Ver Llamadas </h2> </a>
					<br><br> -->
					<a href="<?= base_url()?>Supervisor/ver-seguimiento-de-llamadas" class="btn btn-outline-info btn-block"> <h2> Ver seguimientos </h2> </a>
					<br><br>
					<a href="<?= base_url()?>Supervisor/reportes" class="btn btn-outline-dark btn-block"> <h2> Generar reportes </h2> </a>
					<br><br>
					<form class="" action="<?= base_url()?>CallCenter/cerrar-sesion" method="post">
						<button type="submit" name="button" class="btn btn-outline-danger btn-block">
							<h2> Cerrar Sesion </h2>
						</button>
						<input type="hidden" name="CallHoraCS" id="CallHoraCS" value="">
					</form>
			  </div>
