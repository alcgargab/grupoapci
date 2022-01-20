					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_p ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_p)){ ?>
								<div class="row">
									<?php foreach ($tbl_p as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<center>
													<img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $tbl_em_ruta ?>/<?= $row -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" style="width:50%">
												</center>
												<div class="card-body">
													<h6 class="card-title"> <center> <?= $row -> apellido_paterno_e. " ". $row -> apellido_materno_e . " ". $row -> nombre_e ?> </center> </h6>
													<hr>
													<span> <span class="fas fa-calendar-alt"> </span> <small> <?= $row -> fecha_permiso_p ?> </small> </span> <br>
													<span> <span class="fas fa-clock"> </span> <b> De: <small> <?= $row -> inicio_p ?> </small> </b> </span> <br>
													<span> <span class="fas fa-clock"> </span> <b> A: </b> <small><?= $row -> fin_p ?> </small> </span> <br>
													<span> <span class="fas fa-clock"> </span> <b> Total de horas: </b> <small> <?= $row -> horas_p ?> </small>	</span>
													<br> <br>
													<center>
														<div class="row">
															<?php if ($row -> autorizado_p == 1){ ?>
															<?php } else { ?>
																<?php if ($row -> id_e != $tbl_e -> id_e){ ?>
																	<div class="ap-class-12">
																		<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/authorize-permissions/<?= $row -> encrypt_folio_p ?>" class="btn btn-block ap-gral-btn btnRuta"> Autorizar </a>
																	</div>
																<?php } else { }
															} ?>
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
											<h1> No cuentas con permisos. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
