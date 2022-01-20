					<br><br><br><br>
					<div class="ap-class-12">
						<div class="container">
							<div class="row">
								<!-- recursos humanos -->
								<div class="ap-class-2 offset-3">
									<div class="card cardModule">
										<center>
											<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_RHM.webp" alt="AP-Consultoria-Integral-ERP" style="width: 50%">
										</center>
										<div class="card-body">
											<p class="card-title text-center"> Recursos Humanos </p>
											<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em_ruta ?>" class="stretched-link"> </a>
										</div>
									</div>
								</div>
								<?php if ($tbl_u -> usuario_u == "SGrheo" || $tbl_u -> usuario_u == "DTrheo"){ ?>
									<!-- gerente de area -->
									<div class="ap-class-2">
										<div class="card cardModule">
											<center>
												<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_GAM.webp" alt="AP-Consultoria-Integral-ERP" style="width: 50%">
											</center>
											<div class="card-body">
												<p class="card-title text-center"> Gerente de área </p>
												<a href="<?= base_url()?>Gerentedearea/<?= $tbl_em_ruta ?>" class="stretched-link"> </a>
											</div>
										</div>
									</div>
								<?php } ?>
								<!-- empleado -->
								<div class="ap-class-2">
									<div class="card cardModule">
										<center>
											<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_EM.webp" alt="AP-Consultoria-Integral-ERP" style="width: 50%">
										</center>
										<div class="card-body">
											<p class="card-title text-center"> Empleado </p>
										</div>
										<a href="<?= base_url()?>Employee/<?= $tbl_em_ruta ?>" class="stretched-link"> </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br>
