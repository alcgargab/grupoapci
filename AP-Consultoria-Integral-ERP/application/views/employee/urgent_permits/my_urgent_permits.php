					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-4">
									<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_pu ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_pu)){ ?>
								<div class="row">
									<?php foreach ($tbl_pu as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<div class="card-body">
													<h6> <span class="fas fa-calendar-alt"> </span> <small> <?= $row -> fecha_pu ?> </small> </h6>
													<h6> <span class="fas fa-clock"> </span> <small> <?= $row -> hora_pu ?> </small> </h6>
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
											<h1> No cuentas con permisos urgentes. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
