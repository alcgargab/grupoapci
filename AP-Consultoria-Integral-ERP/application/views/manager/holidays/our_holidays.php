					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_v ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_v)){ ?>
								<div class="row">
									<?php foreach ($tbl_v as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<center>
													<img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $tbl_em_ruta ?>/<?= $row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" style="width:50%">
												</center>
												<div class="card-body">
													<h5 class="card-title"> <center> <?= $row -> apellido_paterno_e. " ". $row -> apellido_materno_e . " ". $row -> nombre_e ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-calendar-alt"> </span> <b> Inicio de vacaciones: </b> <small> <?= $row -> start ?> </small> </p>
													<p> <span class="fas fa-clock"> </span> <b> Fin de vacaciones: <small> <?= $row -> end ?> </small> </b> </p>
													<br>
													<center>
														<div class="row">
															<?php if ($row -> autorizado_v == 2){ ?>
																<div class="ap-class-12">
																	<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/authorize-holidays/<?= $row -> encrypt_codigo_v ?>" class="btn btn-block ap-gral-btn btnRuta"> Autorizar </a>
															  </div>
															<?php }
															else { } ?>
														</div>
													</center>
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
											<h1> No cuenta con Vacaciones. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
