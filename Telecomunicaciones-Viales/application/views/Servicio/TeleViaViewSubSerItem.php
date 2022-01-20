		<div id="telvia_container_subseritem" class="container">
		<?php if (!$SubservicioItem) { ?>
				<div id="telvia_container_subseritem_item" class="row">
					<h1> Mantenimiento </h1>
				</div>
			<?php }else {
				if ($oportunidad -> id_oportunidad == 1) { ?>
					<div id="telvia_container_subseritem_item" class="row">
						<div class="col-lg-3 col-md-3 col-sm-5 col-xs-6">
							<center> <img id="telvia_container_subseritem_item_img" src="<?= base_url()?>images/Iconos/<?= $SubservicioItem -> logo ?>" alt=""> </center>
						</div>
							<div class="col-lg-9 col-md-9 col-sm-7 col-xs-6">
								<form class="" action="<?= base_url()?>Contacto" method="post">
									<input id="servicio_item" name="servicio_item" type="hidden" value="<?= $SubservicioItem -> subser ?>">
									<p id="televia_tittle4"> <?= $SubservicioItem -> subser ?></p>
									<input type="hidden" name="" class="VistasSubServicio" value="<?= $SubservicioItem -> Vistas ?>">
									<input type="hidden" name="" class="SolicitudSubServicio" value="<?= $SubservicioItem -> Solicitud ?>">
									<input type="hidden" name="" class="VentasSubServicio" value="<?= $SubservicioItem -> Ventas ?>">
									<input type="hidden" name="" id="base" value="http://127.0.0.1/TELEVIA/">
									<!-- <p id="televia_tittle4"> $<?= $SubservicioItem -> precio ?></p> -->
									<ul>
										<?php if ($SubservicioItem -> descripcion == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion?> </li>
										<?php } ?>
										<?php if ($SubservicioItem -> descripcion2 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion2?> </li>
										<?php } ?>
										<?php if ($SubservicioItem -> descripcion3 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion3?> </li>
										<?php } ?>
									</ul>
									<!-- <center> <a href="<?= base_url()?>Contacto" id="televia_btn_DW" class="btn" name=""> Lo quiero <i id="televia_DW_icon" class="fas fa-paper-plane"> </i> </a> </center> -->
									<center> <input id="televia_btn_DW" class="btn" type="submit" name="" value="Lo quiero"> </center>
								</form>
							</div>
					</div>
				<?php }elseif ($oportunidad -> id_oportunidad == 2) { ?>

				<?php }elseif ($oportunidad -> id_oportunidad == 3) { ?>

				<?php }else { ?>
					<div id="telvia_container_subseritem_item" class="row">
						<div class="col-lg-3 col-md-3 col-sm-5 col-xs-6">
							<center> <img id="telvia_container_subseritem_item_img" src="<?= base_url()?>images/Iconos/<?= $SubservicioItem -> logo ?>" alt=""> </center>
						</div>
							<div class="col-lg-9 col-md-9 col-sm-7 col-xs-6">
								<form class="" action="<?= base_url()?>Contacto" method="post">
									<input id="servicio_item" name="servicio_item" type="hidden" value="<?= $SubservicioItem -> subser ?>">
									<p id="televia_tittle6"> <?= $SubservicioItem -> subser ?></p>
									<!-- <p id="televia_tittle4"> $<?= $SubservicioItem -> precio ?></p> -->
									<ul>
										<?php if ($SubservicioItem -> descripcion == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion?> </li>
										<?php } ?>
										<?php if ($SubservicioItem -> descripcion2 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion2?> </li>
										<?php } ?>
										<?php if ($SubservicioItem -> descripcion3 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion3?> </li>
										<?php } ?>
									</ul>
									<!-- <center> <a href="<?= base_url()?>Contacto" id="televia_btn_DW" class="btn" name=""> Lo quiero <i id="televia_DW_icon" class="fas fa-paper-plane"> </i> </a> </center> -->
									<center> <input id="televia_btn_CC" class="btn" type="submit" name="" value="Lo quiero"> </center>
								</form>
							</div>
					</div>
				<?php } ?>

					<div id="telvia_container_subseritem_item" class="row">
						<div class="col-lg 12 col-md-12 col-sm-12 col-xs-12">
							<div class="container">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a id="telvia_container_subseritem_item_opc" class="nav-link active" data-toggle="tab" href="#Descripcion">Descripción</a>
									</li>
									<li class="nav-item">
										<a id="telvia_container_subseritem_item_opc" class="nav-link" data-toggle="tab" href="#Requisitos">Requisitos</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="Descripcion" class="container tab-pane active"><br>
										<ul>
											<?php if ($SubservicioItem -> descripcion == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion?> </li>
											<?php } ?>
											<?php if ($SubservicioItem -> descripcion2 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion2?> </li>
											<?php } ?>
											<?php if ($SubservicioItem -> descripcion3 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> descripcion3?> </li>
											<?php } ?>
										</ul>
									</div>
									<div id="Requisitos" class="container tab-pane fade"><br>
										<ul>
											<?php if ($SubservicioItem -> requisitos == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> requisitos?> </li>
											<?php } ?>
											<?php if ($SubservicioItem -> requisitos2 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> requisitos2?> </li>
											<?php } ?>
											<?php if ($SubservicioItem -> requisitos3 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> requisitos3?> </li>
											<?php } ?>
											<?php if ($SubservicioItem -> requisitos4 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt8" class="telvia_container_subseritem_li">  <?= $SubservicioItem -> requisitos4?> </li>
											<?php } ?>
										</ul>
										<?php if ($SubservicioItem -> id_ser == 1 || $SubservicioItem -> id_ser == 2 || $SubservicioItem -> id_ser == 3 || $SubservicioItem -> id_ser == 5 || $SubservicioItem -> id_ser == 6){ ?>
											<h4> ¿Te falta algún requisito? Tal vez te interese alguno de nuestros <a href="<?= base_url()?>Paquetes"> paquetes.</a> </h4>
										<?php }else { ?>

										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
		</div>
