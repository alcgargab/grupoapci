					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_vi ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_vi)){ ?>
								<div class="row">
									<?php foreach ($tbl_vi as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h6 class="card-title">
														<center>
															<?= $row -> visitante_vi ?>
														</center>
													</h6>
													<hr>
													<span> <span class="fas fa-clock"> </span> <small> <?= $row -> hora_vi ?> </small> </span> <br>
													<span> <span class="fas fa-edit"> </span> <small> <?= $row -> motivo_vi ?> </small> </span>
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
											<h1> La empresa no cuenta con visitas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
