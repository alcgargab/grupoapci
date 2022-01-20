		<div class="">
			<div class="row">
			  <div class="col-12">
					<!-- banner -->
					<div class="container-fluid" style="margin-bottom:0; padding: 0">
						<img class="ap-img-banner" src="<?= base_url()?>images/Banner/apci_banner.webp" alt="AP | Consultoria Integral">
						<p id="ap-text-home" class="ap-text-home"> </p>
					</div>
					<!-- misión y visión -->
					<div class="ap-container-mi-vi">
						<!-- misión -->
						<div class="row">
							<div class="col-md-5 col-12 ap-container-mision">
								<div class="row">
									<div class="col-4 ap-container-icon">
										<img class="ap-mi-vi-icon" src="<?= base_url()?>images/Iconos/apci_icon_mision.webp" alt="AP | Consultoria Integral Misión">
									</div>
									<div class="col-8 ap-mi-vi-ctn">
										<p class="ap-mi-vi-tittle"> misión </p>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<p class="ap-mi-vi-text">
											Brindar a nuestros clientes, servicios con altos estándares de calidad a través de personales
											especializado en el desarrollo de sus funciones, por medio de capacitación constante y
											varios años de experiencia.
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- visión -->
						<div class="row">
							<div class="col-md-5 col-12 ap-container-vision">
								<div class="row">
									<div class="col-4 ap-container-icon">
										<center>
											<img class="ap-mi-vi-icon" src="<?= base_url()?>images/Iconos/apci_icon_vision.webp" alt="AP | Consultoria Integral Visión">
										</center>
									</div>
									<div class="col-8 ap-mi-vi-ctn">
										<p class="ap-mi-vi-tittle"> visión </p>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<p class="ap-mi-vi-text">
											Lograr posicionarnos en la mente de los clientes con cada una de las empresas
											<strong> (Constructora AEMI, S.ASSPER, Telecomunicaciones Viales y RH Eficiencia Organizacional)</strong>,
											por el excelente servicio brindado e incrementar la rentabilidad en un 20%.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Valores -->
					<div class="container-fluid ap-container-val-up">
						<div class="row">
							<div class="col-md-4 col-6 ap-container-val-img-tittle">
								<center>
									<img src="<?= base_url()?>images/LandingPage/apci_valores.webp" alt="AP | Consultoria Integral Valores">
								</center>
								<p> valores </p>
							</div>
							<!-- <div class="col-md-4 col-sm-2 col-1"> </div> -->
						</div>
					</div>
					<!-- Valores imagen -->
					<div class="ap-container-val-down">
						<img class="ap-val-img-banner" src="<?= base_url()?>images/LandingPage/apci_valores_banner.webp" alt="AP | Consultoria Integral">
						<div class="container-fluid">
							<div class="row ap-container-opc-up">
								<div class="col-12">
									<div class="row">
										<div class="col-4 text-center ap-div-val">
											<div id="cImgEx" class="container">
												<img id="imgEx" src="<?= base_url()?>images/Iconos/apci_icon_exelencia.webp" alt="AP | Consultoria Integral Excelencia">
												<p> excelencia </p>
											</div>
										</div>
										<div class="col-4 text-center ap-div-val">
											<div id="cImgRe" class="container">
												<img id="imgRe" src="<?= base_url()?>images/Iconos/apci_icon_respeto.webp" alt="AP | Consultoria Integral Respeto">
												<p> respeto </p>
											</div>
										</div>
										<div class="col-4 text-center ap-div-val">
											<div id="cImgHo" class="container">
												<img id="imgHo" src="<?= base_url()?>images/Iconos/apci_icon_honestidad.webp" alt="AP | Consultoria Integral Honestidad">
												<p> honestidad </p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-4 text-center ap-div-val">
											<div id="cImgLe" class="container">
												<img id="imgLe" src="<?= base_url()?>images/Iconos/apci_icon_lealtad.webp" alt="AP | Consultoria Integral Lealtad">
												<p> lealtad </p>
											</div>
										</div>
										<div class="col-4 text-center ap-div-val">
											<div id="cImgPa" class="container">
												<img id="imgPa" src="<?= base_url()?>images/Iconos/apci_icon_pasion.webp" alt="AP | Consultoria Integral Pasion">
												<p> pasión </p>
											</div>
										</div>
										<div class="col-4 text-center ap-div-val">
											<div id="cImgTr" class="container">
												<img id="imgTr" src="<?= base_url()?>images/Iconos/apci_icon_transparencia.webp" alt="AP | Consultoria Integral Transparencia">
												<p> transparencia </p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						var ap_text_home="Nos enfocamos en satisfacer las necesidades de nuestros clientes para ofrecerles soluciones personalizadas.";function ap_maquina_home(e,t,n){ap_lng_home=t.length,ap_ctn_home_text=document.getElementById(e),ap_ctn_home_text.innerHTML="";var a=0;ap_timer_home=setInterval(function(){ap_ctn_home_text.innerHTML=ap_ctn_home_text.innerHTML.substr(0,ap_ctn_home_text.innerHTML.length-1)+t.charAt(a)+"|",a>=ap_lng_home?(clearInterval(ap_timer_home),setTimeout(function(){return ap_ctn_home_text.innerHTML=ap_ctn_home_text.innerHTML.substr(0,ap_lng_home),ap_maquina_home("ap-text-home",t,100),!0},3e4)):a++},n)}ap_maquina_home("ap-text-home",ap_text_home,100,0);
					</script>
