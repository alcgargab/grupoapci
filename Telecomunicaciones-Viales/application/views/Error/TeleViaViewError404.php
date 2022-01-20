		<div class="error404 container">
			<p class="error404txt text-center"> Error 404 </p>
			<p class="error404txt1 text-center"> ¡Oops! algo salio mal. </p>
			<p class="error404txt2"> No contamos con el siguiente Servicio <span> "<?php echo $ruta; ?>" </span> </p>
			<p class="error404txt2"> Por favor intenta con uno de estos servicios. </p>
			<br>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<?php foreach ($servicio as $row){ ?>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
							<div class="error404Card card">
						    <a href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>"> <img class="card-img-top" src="<?= base_url()?>images/Iconos/<?= $row -> Logo ?>" alt="<?= $row -> Logo ?>"> </a>
						    <div class="card-body">
						      <p class="card-title"> <a href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>"> <?= $row -> subser ?> </a> </p>
						    </div>
						  </div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
