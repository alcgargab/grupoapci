		<div id="Televia_banner" class="">
			<img id="Televia_banner_img" src="<?=base_url()?>images/Banner/<?= $ser_op -> banner_imagen ?>" alt="Televia_banner_img" class="">
			<input id="id_oportunidad" type="hidden" name="id_oportunidad" value="<?= $ser_op -> id_oportunidad?>">
		</div>
		<div id="televia_container_Emp" class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div id="televia_Emp_container" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php foreach ($servicio as $row) { ?>
							<input type="hidden" name="" value="<?= $row -> id_ser?>">
							<p>
								<a id="televia_Emp_Servi" href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>"> <?= $row -> servicio ?> <img id="televia_Emp_Serv_img" class="float-right" src="<?=base_url()?>images/Iconos/<?= $row -> icono?>" alt="<?= $row -> icono?>"> </a>								
							</p>
						<?php } ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<?php if ($ser_op -> id_oportunidad == 1) {?>
							<p id="televia_tittle4"> <?= $ser_op -> oportunidad?> </p>
							<ul id="televia_ul_DW">
								<li> <img id="televia_ul_DW_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Desarrollo Web/Televia_Icont_WB_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt4">  Contamos con un equipo de especialistas multidisciplinarios, una metodología de trabajo estructurada lo que nos posiciona como su mejor opción. </span> </li>
								<li> <img id="televia_ul_DW_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Desarrollo Web/Televia_Icont_WB_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt4">  Desde el dominio y hosting hasta el diseño, programación soporte. </span> </li>
								<li> <img id="televia_ul_DW_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Desarrollo Web/Televia_Icont_WB_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt4">  Proceso de trabajo con sentido de negocio. </span> </li>
								<center> <a href="<?= base_url()?>Contacto" id="televia_btn_DW" class="btn" name=""> Contactanos <i id="televia_DW_icon" class="fas fa-paper-plane"> </i> </a> </center>
							</ul>
						<?php }elseif ($ser_op -> id_oportunidad == 2) { ?>
							<p id="televia_tittle1"> <?= $ser_op -> oportunidad?> </p>
							<p id="televia_text1"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							<center> <a href="<?= base_url()?>Contacto" id="televia_btn_Emp" class="btn" name=""> Contactanos <i id="televia_Emp_icon" class="fas fa-paper-plane"> </i> </a> </center>
						<?php }elseif ($ser_op -> id_oportunidad == 3) { ?>
							<input type="hidden" name="" value="<?= $ser_op -> id_oportunidad?>">
							<p id="televia_tittle2"> <?= $ser_op -> oportunidad?> </p>
							<p id="televia_text1"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							<center> <a href="<?= base_url()?>Contacto" id="televia_btn_pub" class="btn" name=""> Contactanos <i id="televia_Pub_icon" class="fas fa-paper-plane"> </i> </a> </center>
						<?php }elseif ($ser_op -> id_oportunidad == 4){ ?>
							<input type="hidden" name="" value="<?= $ser_op -> id_oportunidad?>">
							<p id="televia_tittle6"> <?= $ser_op -> oportunidad?> </p>
							<p id="televia_text1"> En telecomunicaciones viales nos especializamos en apoyar al desarrollo de tu empresa, contamos con un grupo experto en telemarketing para dar soporte y ayudarte a crecer tu negocio. </p>
							<ul id="televia_ul_CC">
								<li> <img id="televia_ul_CC_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Call Center/Televia_Icont_CC_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt7"> Creamos soluciones para tus proyectos y campañas. </span> </li>
								<li> <img id="televia_ul_CC_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Call Center/Televia_Icont_CC_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt7"> Contamos con infraestructura a la vanguardia de la tecnología. </span> </li>
								<li> <img id="televia_ul_CC_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Call Center/Televia_Icont_CC_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt7"> Seguridad de tu información. </span> </li>
								<li> <img id="televia_ul_CC_Icon" class="pull-right" src="<?= base_url()?>images/Iconos/Call Center/Televia_Icont_CC_List.png" alt="Televia_Icont_WB_List"> <span id="televia_txt7"> Somos “La solución a tu negocio”. </span> </li>
								<center> <a href="<?= base_url()?>Contacto" id="televia_btn_Call" class="btn" name=""> Contactanos <i id="televia_Call_icon" class="fas fa-paper-plane"> </i> </a> </center>
							</ul>
						<?php }else { ?>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
