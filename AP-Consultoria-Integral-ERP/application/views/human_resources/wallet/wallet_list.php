					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-4">
									<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_c ?> </a>
								</div>
								<div class="ap-class-4">
									<center>
										<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-job-candidates" class="btn btn-block ap-gral-btn btnRuta"> Empleados </a>
									</center>
								</div>
								<div class="ap-class-4">
									<center>
										<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-unemployed-candidates" class="btn btn-block ap-gral-btn btnRuta"> Sin empleo </a>
									</center>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_c)){ ?>
									<div class="row">
									<?php foreach ($tbl_c as $row){ ?>
										<div class="ap-class-4-4-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h5 class="card-title">
														<center>
															<?= $row -> puesto_pue ?>
														</center>
													</h5>
													<hr>
													<p> <span class="fas fa-user-tie"> </span> <b> Nombre: </b> <small> <br> <?= $row -> apellido_paterno_c." ".$row -> apellido_materno_c." ".$row -> nombre_c ?> </small> </p>
													<p> <span class="fas fa-phone"> </span> <b> Teléfono: <small> <br> <?= $row -> telefono_c ?> </small> </b> </p>
													<p> <span class="fas fa-envelope"> </span> <b> E-mail: </b> <small> <br><?= $row -> email_c ?> </small> </p>
													<?php if ($row -> cv_c != ""){ ?>
														<a target="_blank" href="<?= base_url()?>dcs/curriculum-vitae/<?= $tbl_em -> ruta_em ?>/<?= $row -> cv_c ?>" class="btn btn-block ap-gral-btn">  Ver CV </a>
													<?php }
													else { } ?>
													<br>
													<div class="row">
													  <?php if ($row -> status_c == 1){ ?>
													  	<div class="ap-class-6">
													  	  <a href="#" class="btn btn-block ap-gral-btn"> Empleado </a>
													  	</div>
													  <?php } else { ?>
															<div class="ap-class-6">
													  	  <a href="#" class="btn btn-block ap-gral-btn"> Sin empleo </a>
													  	</div>
													  <?php } ?>
														<?php if ($this -> session -> user != 'EMapci'){ ?>
															<div class="ap-class-6">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/update-candidate-status/<?= $row -> encrypt_codigo_c ?>" class="btn btn-block ap-gral-btn btnRuta"> Actualizar </a>
															</div>
														<?php } ?>
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
											<h1> RRHH no cuenta con cartera de esta empresa. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
