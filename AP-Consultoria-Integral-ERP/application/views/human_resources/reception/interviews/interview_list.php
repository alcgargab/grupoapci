					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_en ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_en)){ ?>
								<div class="row">
									<?php foreach ($tbl_en as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h6 class="card-title">
														<center>
															<?= $row -> apellido_paterno_pr." ".$row -> apellido_materno_pr." ".$row -> nombre_pr ?>
														</center>
													</h6>
													<hr>
													<span> <span class="fas fa-clock"> </span> <small> <?= $row -> hora_en ?> </small>	</span>
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
											<h1> La empresa no cuenta con entrevistas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
