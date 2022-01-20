					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
							  <div class="ap-class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb ap-bread">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>gerentedearea/<?= $tbl_em_ruta ?>/view-my-job-vacancies">
													Vacantes
												</a>
											</li>
									    <li class="breadcrumb-item active" aria-current="page">
												Candidatos
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<div class="row">
								<?php foreach ($tbl_pr as $row){ ?>
									<div class="ap-class-3-3-6-12">
										<div class="card">
											<div class="card-body">
												<?php if ($row -> prospecto_pr == 1){
												} elseif ($row -> prospecto_pr == 2) { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_List.webp" alt="AP-Consultoria-Integral-ERP" width="20px">
														</div>
													</div>
												<?php }else { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Err.webp" alt="AP-Consultoria-Integral-ERP" width="20px">
														</div>
													</div>
												<?php } ?>
												<h5>
													<center>
														<img src="<?= base_url()?>images/Icono/ERP_Icon_Inter.webp" alt="AP-Consultoria-Integral-ERP" width="60px">
														<br>
														<?= $row -> apellido_paterno_pr." ".$row -> apellido_materno_pr." ".$row -> nombre_pr  ?>
													</center>
												</h5>
												<hr>
												<p class="card-text"> <span class="fas fa-phone"> </span> <b> Teléfono: </b> <?= $row -> telefono_pr ?> </p>
												<p class="card-text"> <span class="fas fa-envelope"> </span> <b> Email: </b> <?= $row -> email_pr ?> </p>
												<?php if ($row -> cv_pr != ""){ ?>
													<a target="_blank" href="<?= base_url()?>dcs/curriculum-vitae/<?= $tbl_em_ruta ?>/CV-<?= $row -> nombre_pr.'-'.$row -> apellido_paterno_pr.'.pdf' ?>" class="btn btn-block ap-gral-btn"> Ver CV </a>
												<?php }
												else { } ?>
												<br>
												<div class="row">
													<div class="ap-class-6">
														<a href="<?= base_url()?>Gerentedearea/<?= $tbl_em_ruta ?>/accept-candidate/<?= $row -> encrypt_codigo_pr ?>" class="btn btn-block btnRuta ap-gral-btn"> <span class="far fa-thumbs-up"> </span> </a>
													</div>
													<div class="ap-class-6">
														<a href="<?= base_url()?>Gerentedearea/<?= $tbl_em_ruta ?>/deny-candidate/<?= $row -> encrypt_codigo_pr ?>" class="btn btn-block btnRuta ap-gral-btn"> <span class="far fa-thumbs-down"> </span> </a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
