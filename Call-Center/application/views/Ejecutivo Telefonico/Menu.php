		<br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-12 col-12">
					<center>
						<a href="<?= base_url()?>">
							<img src="<?= base_url()?>images/Usuario/<?php print_r($this -> session -> ImagenSesion); ?>" alt="<?php print_r($this -> session -> ImagenSesion); ?>" width="100px" class="rounded-circle">
							<br><br>
							<h5 style="color: black"> <?php print_r($this -> session -> UNameSesion); ?> </h5>
							<input type="hidden" name="UNameSesion" id="UNameSesion" value="<?php print_r($this -> session -> UNameSesion); ?>">
						</a>
					</center>
					<br><br><br>
					<a href="<?= base_url()?>Ejecutivo/ver-mis-seguimientos" class="btn btn-outline-dark btn-block"> <h5> Ver mis Seguimientos <span class="badge badge-light"> <?php if ($seguimiento != "") {
						print_r(count($seguimiento));
					}else {
						print_r(0);
					} ?> </span> </h5> </a>
					<br><br>
					<input class="form-control" type="hidden" id="validarSesion" name="validarSesion" value="<?= $this -> session -> validarSesion ?>">
					<input class="form-control" type="hidden" id="TUSesion" name="TUSesion" value="<?= $this -> session -> TUSesion ?>">
					<form class="" action="<?= base_url()?>CallCenter/cerrar-sesion" method="post">
						<button type="submit" name="button" class="btn btn-outline-danger btn-block">
							<h5> Cerrar Sesion </h5>
						</button>
						<?php $dia = date('Y-m-d'); $hora = date('H:i:s'); ?>
						<input type="hidden" name="CallHoraCS" id="CallHoraCS" value="">
					</form>
			</div>
