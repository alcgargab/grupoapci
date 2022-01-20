		<!-- <div id="Televia_banner" class="">
		</div> -->
		<div id="demo" class="carousel slide" data-ride="carousel">
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		  </ul>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="<?= base_url()?>images/Banner/Televia_SecPub.png" alt="Los Angeles">
		    </div>
		    <div class="carousel-item">
		      <img src="<?= base_url()?>images/Banner/Televia_DesarrolloWeb1.png" alt="Chicago">
		    </div>
		    <div class="carousel-item">
		      <img src="<?= base_url()?>images/Banner/Televia_CallCenter.png" alt="New York">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>
		<nav id="televia_menu_down" class="navbar navbar-expand-md">
			<div class="" id="">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Voz <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_VI.png" alt="Televia_Icon_VI"> </center> </a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Datos <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_Datos.png" alt="Televia_Icon_Datos"> </center> </a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Redes Inalambricas <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_RI.png" alt="Televia_Icon_RI"> </center></a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Fibra Optica <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_FO.png" alt="Televia_Icon_FO"> </center> </a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Radio Comunicación <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_RC.png" alt="Televia_Icon_RC"> </center></a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Circuito Cerrado <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_CC.png" alt="Televia_Icon_CC"> </center></a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Desarrollo Web <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_WB_Code1.png" alt="Televia_Icon_WB_Code1"> </center></a>
					</li>
					<li class="nav-item">
						<a id="televia_items_down" class="nav-link" href="#">Call Center <center> <img src="<?= base_url()?>images/Iconos/Servicios/Televia_Icon_CallC.png" alt="Televia_Icon_CallC"> </center></a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="Televia_home_info">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p id="televia_tittle3">En Telecomunicaciones Viales...</p>
						<P id="televia_txt3">Te ofrecemos una solución a tú dificultad para comunicarte.</P>
						<center> <a href="<?= base_url()?>Contacto" id="Televia_btn" class="btn" name=""> Contrata hoy <i id="Televia_btn_icon" class="fas fa-angle-right"></i> </a> </center>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
				$("#Televia_btn").hover(function(){
						$("#Televia_btn_icon").css("color","rgb(55, 87, 165)");
				});
				$("#Televia_btn").mouseover(function(){
						$("#Televia_btn_icon").css("color","white");
				});
		});
		</script>
