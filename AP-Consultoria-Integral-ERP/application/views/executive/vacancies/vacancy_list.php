					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_va ?> </a>
								</div>
								<div class="ap-class-3 offset-2">
									<center>
										<a href="<?= base_url()?>directivo/<?= $tbl_em -> ruta_em ?>/view-job-vacancies" class="btn btn-block ap-gral-btn"> Sin autorizar </a>
									</center>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>directivo/<?= $tbl_em -> ruta_em ?>/view-vacancies-whit-authorization" class="btn btn-block ap-gral-btn"> Autorizadas </a>
									</center>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_va)){ ?>
								<div class="row">
									<?php foreach ($tbl_va as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h5 class="card-title">
														<center>
															<?= $row -> puesto_pue ?>
														</center>
													</h5>
													<hr>
													<p> <span class="fas fa-building"> </span> <b> Lugar de trabajo: </b> <small> <br> <?= $row -> lugar_trabajo_va ?> </small> </p>
													<p> <span class="fas fa-wrench"> </span> <b> Actividades a desempeñar: <small> <br> <?= $row -> actividades_va ?> </small> </b> </p>
													<p> <span class="fas fa-file-alt"> </span> <b> Requisitos: </b> <small> <br><?= $row -> requisitos_va ?> </small> </p>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha de publicación: </b> <small> <br> <?= $row -> fecha_solicitud_va ?> </small>	</p>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha limite: </b> <small> <br> <?= $row -> fecha_limite_va ?> </small>	</p>
													<br>
													<div class="row">
														<?php if ($row -> autorizado_va == 2){ ?>
															<div class="ap-class-12">
																<center>
																	<a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/authorize-vacancy/<?= $row -> encrypt_codigo_va ?>" class="btn btn-block btnRuta ap-gral-btn"> Autorizar </a>
																</center>
															</div>
														<?php }else {
															if ($row -> status_va == 2) { ?>
																<div class="ap-class-12">
																	<center>
																		<a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/view-candidate/<?= $row -> encrypt_codigo_va ?>" class="btn btn-block ap-gral-btn"> Ver </a>
																	</center>
																</div>
															<?php }
															elseif ($row -> status_va == 3) { ?>
																<div class="ap-class-12">
																	<center>
																		<h5> Contratada desde el <br> <span class="text-success"> <?= $row -> fecha_cubierta_va ?> </span> </h5>
																	</center>
																</div>
															<?php }
															else { }
														} ?>
													</div>
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
											<h1> La empresa no cuenta con vacantes. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
