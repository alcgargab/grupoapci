		<div id="Televia_fototer" style="margin-bottom:0">
			<div class="Televia_fototer_Container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p id="Televia_footer_tittle">Telecomunicaciones Viales
							<span id="Televia_footer_redes">
								<a id="Televia_footer_redes_liga" href="<?=base_url()?>"> <img id="Televia_footer_redes_icon" src="<?= base_url()?>images/Iconos/Redes Sociales/Televia_Icon_Face.png" alt="IconosTelevia_Icon_Face"> </a>
								<a id="Televia_footer_redes_liga" href="<?=base_url()?>"> <img id="Televia_footer_redes_icon" src="<?= base_url()?>images/Iconos/Redes Sociales/Televia_Icon_Ins.png" alt="Televia_Icon_Ins"> </a>
								<a id="Televia_footer_redes_liga" href="<?=base_url()?>"> <img id="Televia_footer_redes_icon" src="<?= base_url()?>images/Iconos/Redes Sociales/Televia_Icon_LiK.png" alt="Televia_Icon_LiK"> </a>
							</span>
						</p>
					</div>
				</div>
				<div id="Televia_footer_down" class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
								<p id="Televia_footer_tittle1">Servicios Empresa</p>
								<ul id="Televia_footer_down_ul">
									<?php foreach ($emp as $row){ ?>
										<li> <a id="Televia_footer_txt" href="<?=base_url()?>Servicio/<?= $row -> Ruta?>"> <?= $row -> servicio ?> </a> </li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
								<p id="Televia_footer_tittle1">Servicios Sector público</p>
								<ul id="Televia_footer_down_ul">
									<?php foreach ($sp as $row){ ?>
										<li> <a id="Televia_footer_txt" href="<?=base_url()?>Servicio/<?= $row -> Ruta?>"> <?= $row -> servicio ?> </a> </li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
								<p id="Televia_footer_tittle1">Desarrollo Web</p>
								<ul id="Televia_footer_down_ul">
									<?php foreach ($dw as $row){ ?>
										<li> <a id="Televia_footer_txt" href="<?=base_url()?>Servicio/<?= $row -> Ruta?>"> <?= $row -> servicio ?> </a> </li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
								<p id="Televia_footer_tittle1">Call Center</p>
								<ul id="Televia_footer_down_ul">
									<?php foreach ($cc as $row){ ?>
										<li> <a id="Televia_footer_txt" href="<?=base_url()?>Servicio/<?= $row -> Ruta?>"> <?= $row -> servicio ?> </a> </li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
								<p id="Televia_footer_tittle1">Información</p>
								<ul id="Televia_footer_down_ul">
									<li> <a id="Televia_footer_txt" href="<?= base_url()?>QuienesSomos"> QUIÉNES SOMOS </a> </li>
									<?php foreach ($op as $row){ ?>
										<li> <a id="Televia_footer_txt" href="<?=base_url()?>Servicio/<?= $row -> Ruta?>"> <?= $row -> oportunidad ?> </a> </li>
									<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
