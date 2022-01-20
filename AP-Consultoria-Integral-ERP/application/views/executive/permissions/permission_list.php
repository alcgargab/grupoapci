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
												<div class="card-body">
													<h6 class="card-title"> <center> <?= $row -> apellido_paterno_e. " ". $row -> apellido_materno_e . " ". $row -> nombre_e ?> </center> </h6>
													<hr>
													<h6> <span class="fas fa-calendar-alt"> </span> <b> Fecha del permiso: </b> <small> <?= $row -> fecha_permiso_p ?> </small> </h6>
													<h6> <span class="fas fa-clock"> </span> <b> De: <small> <?= $row -> inicio_p ?> </small> </b> </h6>
													<h6> <span class="fas fa-clock"> </span> <b> A: </b> <small><?= $row -> fin_p ?> </small> </h6>
													<h6> <span class="fas fa-clock"> </span> <b> Total de horas: </b> <small> <?= $row -> horas_p ?> </small>	</h6>
													<br>
													<center>
														<div class="row">
															<div class="ap-class-8 offset-2">
														    <a href="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/authorize-permissions/<?= $row -> encrypt_folio_p ?>" class="btn btn-block ap-gral-btn btnRuta"> Autorizar </a>
														  </div>
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
											<h1> La empresa no cuenta con permisos para autorizar. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
