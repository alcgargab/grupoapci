		<div class="">
			<div class="row">
			  <div class="col-12">
					<!-- banner -->
					<div class="container-fluid" style="margin-bottom:0; padding: 0">
						<img class="ap-img-banner" src="<?= base_url()?>images/Banner/apci_banner_empresas.webp" alt="AP | Consultoria Integral Empresas">
						<p id="ap-text-empresas" class="ap-text-empresas"> </p>
						<div class="container-fluid ap-empresas">
							<div class="row">
								<div class="col-3 ap-empresas-card">
									<div class="card">
								    <center>
											<a href="https://www.caemi.com.mx/" target="_blank">
												<img class="card-img-bottom" src="<?= base_url()?>images/Logo/aemi_logo.webp" alt="AP | Consultoria Integral Contructora AEMI">
											</a>
										</center>
								  </div>
							  </div>
								<div class="col-3 ap-empresas-card">
									<div class="card">
								    <center>
											<a href="https://www.sassper.net/" target="_blank">
												<img class="card-img-bottom" src="<?= base_url()?>images/Logo/sassper_logo.webp" alt="AP | Consultoria Integral S.ASSPER Seguridad Privada">
											</a>
										</center>
								  </div>
							  </div>
								<div class="col-3 ap-empresas-card">
									<div class="card">
								    <center>
											<a href="https://www.televiales.net/" target="_blank">
												<img class="card-img-bottom" src="<?= base_url()?>images/Logo/televiales_logo.webp" alt="AP | Consultoria Integral Telecomunicaciones Viales">
											</a>
										</center>
								  </div>
							  </div>
								<div class="col-3 ap-empresas-card">
									<div class="card">
								    <center>
											<a href="http://www.rheo.com.mx/" target="_blank">
												<img class="card-img-bottom" src="<?= base_url()?>images/Logo/rheo_logo.webp" alt="AP | Consultoria Integral Recursos Humanos Eficacia Organizacional">
											</a>
										</center>
								  </div>
							  </div>
							</div>
						</div>
					</div>
					<!-- banner -->
					<div class="ap-banner-empresas">
						<!-- Carousel -->
						<div id="empresas" class="carousel slide" data-ride="carousel">
						  <ul class="carousel-indicators">
						    <li data-target="#empresas" data-slide-to="0" class="active"></li>
						    <li data-target="#empresas" data-slide-to="1"></li>
								<li data-target="#empresas" data-slide-to="2"></li>
						    <li data-target="#empresas" data-slide-to="3"></li>
						  </ul>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img src="<?= base_url()?>images/Banner/apci_banner_caemi.webp" alt="AP | Consultoria Integral Contructora AEMI" width="100%">
						    </div>
						    <div class="carousel-item">
									<img src="<?= base_url()?>images/Banner/apci_banner_sassper.webp" alt="AP | Consultoria Integral S.ASSPER Seguridad Privada" width="100%">
						    </div>
						    <div class="carousel-item">
									<img src="<?= base_url()?>images/Banner/ap_banner_televiales.webp" alt="AP | Consultoria Integral Telecomunicaciones Viales" width="100%">
						    </div>
								<div class="carousel-item">
									<img src="<?= base_url()?>images/Banner/apci_banner_rheo.webp" alt="AP | Consultoria Integral Recursos Humanos Eficacia Organizacional" width="100%">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#empresas" data-slide="prev">
						    <span class="carousel-control-prev-icon"></span>
						  </a>
						  <a class="carousel-control-next" href="#empresas" data-slide="next">
						    <span class="carousel-control-next-icon"></span>
						  </a>
						</div>
					</div>
					<script type="text/javascript">
						var ap_txt_empresas="Nuestras Empresas se caracterizan por su dinamismo, innovación en procesos y tecnología con opciones personalizadas a la necesidad de cada uno de nuestros clientes.";function ap_maquina_empresas(e,a,s){ap_lng_empresas=a.length,ap_ctn_empresas_text=document.getElementById(e),ap_ctn_empresas_text.innerHTML="";var t=0;ap_timer_empresas=setInterval(function(){ap_ctn_empresas_text.innerHTML=ap_ctn_empresas_text.innerHTML.substr(0,ap_ctn_empresas_text.innerHTML.length-1)+a.charAt(t)+"|",t>=ap_lng_empresas?(clearInterval(ap_timer_empresas),setTimeout(function(){return ap_ctn_empresas_text.innerHTML=ap_ctn_empresas_text.innerHTML.substr(0,ap_lng_empresas),ap_maquina_empresas("ap-text-empresas",a,100),!0},3e4)):t++},s)}ap_maquina_empresas("ap-text-empresas",ap_txt_empresas,100,0);
					</script>
