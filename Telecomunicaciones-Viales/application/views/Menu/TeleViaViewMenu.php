			<nav id="televia_menu_down_Emp" class="navbar navbar-expand-md">
				<div class="" id="">
					<ul class="navbar-nav">
						<?php foreach ($servicio as $row) {
							if ($row -> id_ser_oportunidad == 1) { ?>
								<li class="nav-item">
									<a id="televia_items_down_DW" class="nav-link" href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>" ><?= $row -> servicio ?>
										<center> <img src="<?= base_url()?>images/Iconos/<?= $row -> icono?>" alt="<?= $row -> icono?>"> </center>
									</a>
								</li>
							<?php }elseif ($row -> id_ser_oportunidad == 2) { ?>
								<li class="nav-item">
									<a id="televia_items_down_Emp" class="nav-link" href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>" ><?= $row -> servicio ?>
										<center> <img src="<?= base_url()?>images/Iconos/<?= $row -> icono?>" alt="<?= $row -> icono?>"> </center>
									</a>
								</li>
							<?php }else{ ?>
								<li class="nav-item">
									<a id="televia_items_down_Emp" class="nav-link" href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>" ><?= $row -> servicio ?>
										<center> <img src="<?= base_url()?>images/Iconos/<?= $row -> icono?>" alt="<?= $row -> icono?>"> </center>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</nav>
			<div id="televia_contenedor_contacto">
				<a href="<?= base_url()?>TelVia/Contacto" id="televia_contenedor_contacto_a">
				  <i id="televia_contenedor_contacto_a_icon" class="fas fa-envelope"></i>
				</a>
			</div>
