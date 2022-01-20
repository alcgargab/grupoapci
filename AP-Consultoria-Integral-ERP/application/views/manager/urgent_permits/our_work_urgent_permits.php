					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_pu ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_pu)){ ?>
								<div class="row">
									<?php foreach ($tbl_pu as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<center>
													<img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $tbl_em_ruta ?>/<?= $row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" style="width:50%" class="rounded-circle">
												</center>
												<div class="card-body">
													<h6 class="card-title"> <center> <?= $row -> apellido_paterno_e. " ". $row -> apellido_materno_e . " ". $row -> nombre_e ?> </center> </h6>
													<hr>
													<span> <span class="fas fa-calendar-alt"> </span> <small> <?= $row -> fecha_pu ?> </small> </span> <br>
													<span> <span class="fas fa-clock"> </span> <small> <?= $row -> hora_pu ?> </small> </span>
												</div>
											</div>
											<br>
										</div>
									<?php } ?>
								</div>
							<?php } else { ?>
								<div class="row">
									<div class="ap-class-12">
										<center>
											<h1> No cuenta con permisos urgentes. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
