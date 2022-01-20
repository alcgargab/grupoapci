					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn btn-block ap-gral-btn"> Total : <?php echo $total_tbl_va ?> </a>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-hired-vacancies" class="btn btn-block ap-gral-btn"> Contratadas </a>
									</center>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-vacancies-with-candidate" class="btn btn-block ap-gral-btn"> Con prospecto </a>
									</center>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-vacancies-without-a-candidate" class="btn btn-block ap-gral-btn"> Sin prospecto </a>
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
													<?php if ($row -> autorizado_va == 2){ ?>
														<div class="float-right">
															<div class="row">
																<img src="<?= base_url()?>images/Icono/ERP_Icon_Err.webp" alt="AP-Consultoria-Integral-ERP" width="20px">
															</div>
														</div>
													<?php } else { ?>
														<div class="float-right">
															<div class="row">
																<img src="<?= base_url()?>images/Icono/ERP_Icon_List.webp" alt="AP-Consultoria-Integral-ERP" width="20px">
															</div>
														</div>
													<?php } ?>
													<h5 class="card-title"> <center> <?= $row -> puesto_pue ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-user-alt"> </span> <b> Empleados: </b> <br> <?= $row -> empleados_va ?> </p>
													<p> <span class="fas fa-building"> </span> <b> Lugar de trabajo: </b> <small> <br> <?= $row -> lugar_trabajo_va ?> </small> </p>
													<p> <span class="fas fa-wrench"> </span> <b> Actividades a desempeñar: <small> <br> <?= $row -> actividades_va ?> </small> </b> </p>
													<p> <span class="fas fa-file-alt"> </span> <b> Requisitos: </b> <small> <br><?= $row -> requisitos_va ?> </small> </p>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha limite: </b> <small> <br> <?= $row -> fecha_limite_va ?> </small>	</p>
													<br>
													<div class="row">
														<?php if ($row -> status_va == 1){ ?>
															<div class="ap-class-12">
																<center>
																	<h4> No cuenta con entrevistas </h4>
																</center>
															</div>
														<?php }elseif ($row -> status_va == 2) {?>
															<div class="ap-class-12">
																<center>
																	<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-candidate/<?= $row -> encrypt_codigo_va ?>" class="btn btn-block ap-gral-btn btnRuta"> Ver prospecto </a>
																</center>
															</div>
														<?php }else { ?>
															<div class="ap-class-12">
																<center>
																	<h5> Contratada desde el <br> <span class="text-success"> <?= $row -> fecha_cubierta_va ?> </span> </h5>
																</center>
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
											<br>
										</div>
									<?php }
								} else { ?>
									<div class="ap-class-12">
										<center>
											<h1> No cuentas con vacantes. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
