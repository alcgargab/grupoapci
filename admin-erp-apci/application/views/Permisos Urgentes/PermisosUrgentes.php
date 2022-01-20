<div class="col-lg-9 col-md-9 col-sm-6 col-12">
	<div class="container-fluid">
		<?php if (!empty($empper)){ $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
					<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
				</div>
			</div>
			<br>
			<div class="row">
				<?php foreach ($empper as $row){ ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						<div class="card">
							<br>
							<center>
								<img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $ruta?>/<?= $row -> FotoEmp?>" alt="Card image" style="width:50%" class="rounded-circle">
							</center>
							<div class="card-body">
								<h5 class="card-title"> <center> <?= $row -> ApellidoPEmp. " ". $row -> ApellidoMEmp . " ". $row -> NomEmp ?> </center> </h5>
								<hr>
								<h5> <span class="fas fa-calendar-alt"> </span> <b> Fecha del permiso: </b> <small> <?= $row -> start ?> </small> </h5>
								<h5> <span class="fas fa-clock"> </span> <small> <?= $row -> hora ?> </small> </h5>
								<br>
								<center>
									<div class="row">
										<?php if ($row -> statusJefe == 1){ ?>
											<div class="col-lg-12 col-md-12 col-sm-12 col-12">
												<a id="btnEnvVaca" href="<?= base_url()?>Admin/<?= $ruta?>/generar-documento-de-permiso-urgente/<?= $row -> IdPerU ?>" class="btn btn-outline-dark btn-block"> Generar </a>
											</div>
										<?php } else { ?>
											<div class="col-lg-12 col-md-12 col-sm-12 col-12">
												<center>
													<h5 class="text-danger"> Permiso no autorizadó por el gerente de área. </h5>
												</center>
											</div>
										<?php } ?>
									</div>
								</center>
							</div>
						</div>
						<br>
					</div>
				<?php }
			} else { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<center>
						<h1> Tu equipo no cuenta con permisos. </h1>
						<br><br><br><br>
						<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.png" alt="ERP_Icon_NER">
					</center>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
