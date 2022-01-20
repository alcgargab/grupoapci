		<div id="telvia_container_subseritem" class="container">
		<?php if (!$paquete) { ?>
				<div id="telvia_container_subseritem_item" class="row">
					<h1> Mantenimiento </h1>
				</div>
			<?php }else { ?>
					<div id="telvia_container_subseritem_item" class="row">
						<div class="col-lg-3 col-md-3 col-sm-5 col-xs-6">
							<center> <img id="telvia_container_subseritem_item_img" src="<?= base_url()?>images/Iconos/Paquetes/<?= $paquete -> Logo ?>" alt=""> </center>
						</div>
							<div class="col-lg-9 col-md-9 col-sm-7 col-xs-6">
								<form class="" action="<?= base_url()?>Contacto" method="post">
									<input id="servicio_item" name="servicio_item" type="hidden" value="<?= $paquete -> Paquete ?>">
									<p id="televia_tittle4"> <?= $paquete -> Paquete ?></p>
									<!-- <p id="televia_tittle4"> $<?= $paquete -> Precio ?></p> -->
									<!-- <ul>
										<?php if ($paquete -> Descripcion1 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion1?> </li>
										<?php } ?>
										<?php if ($paquete -> Descripcion2 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion2?> </li>
										<?php } ?>
										<?php if ($paquete -> Descripcion3 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion3?> </li>
										<?php } ?>
										<?php if ($paquete -> Descripcion4 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion4?> </li>
										<?php } ?>
										<?php if ($paquete -> Descripcion5 == "") {?>
										<?php }else{ ?>
											<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion5?> </li>
										<?php } ?>
									</ul> -->
									<!-- <center> <a href="<?= base_url()?>Contacto" id="televia_btn_DW" class="btn" name=""> Lo quiero <i id="televia_DW_icon" class="fas fa-paper-plane"> </i> </a> </center> -->
									<center> <input id="televia_btn_DW" class="btn" type="submit" name="" value="Lo quiero"> </center>
								</form>
							</div>
					</div>
					<div id="telvia_container_subseritem_item" class="row">
						<div class="col-lg 12 col-md-12 col-sm-12 col-xs-12">
							<div class="container">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a id="telvia_container_subseritem_item_opc" class="nav-link active" data-toggle="tab" href="#Descripcion">Descripción</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="Descripcion" class="container tab-pane active"><br>
										<ul>
											<?php if ($paquete -> Descripcion1 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion1?> </li>
											<?php } ?>
											<?php if ($paquete -> Descripcion2 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion2?> </li>
											<?php } ?>
											<?php if ($paquete -> Descripcion3 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion3?> </li>
											<?php } ?>
											<?php if ($paquete -> Descripcion4 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion4?> </li>
											<?php } ?>
											<?php if ($paquete -> Descripcion5 == "") {?>
											<?php }else{ ?>
												<li id="televia_txt4" class="telvia_container_subseritem_li">  <?= $paquete -> Descripcion5?> </li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
		</div>
