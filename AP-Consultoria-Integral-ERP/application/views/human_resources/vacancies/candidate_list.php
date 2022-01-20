					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
							  <div class="ap-class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb ap-bread">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/view-job-vacancies">
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
															<img src="<?= base_url()?>images/Icono/ERP_Icon_F1.webp" alt="AP-Consultoria-Integral-ERP" width="40px">
														</div>
													</div>
												<?php }
												elseif ($row -> prospecto_pr == 3) { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Desc.webp" alt="AP-Consultoria-Integral-ERP" width="40px">
														</div>
													</div>
												<?php }
												elseif ($row -> prospecto_pr == 4) { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_F2.webp" alt="AP-Consultoria-Integral-ERP" width="40px">
														</div>
													</div>
												<?php }
												elseif ($row -> prospecto_pr == 5) { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_F3.webp" alt="AP-Consultoria-Integral-ERP" width="40px">
														</div>
													</div>
												<?php }
												else { ?>
													<div class="float-right">
														<div class="row">
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Cont.webp" alt="AP-Consultoria-Integral-ERP" width="40px">
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
												<?php if (!empty($row -> cv_pr)){ ?>
													<a target="_blank" href="<?= base_url()?>dcs/curriculum-vitae/<?= $tbl_em -> ruta_em?>/CV-<?= $row -> nombre_pr.'-'.$row -> apellido_paterno_pr.'.pdf' ?>" class="btn btn-block ap-gral-btn"> Ver CV </a>
												<?php }
												else { }
												if ($row -> prospecto_pr == 2 && $this -> session -> user != 'EMapci') { ?>
													<a href="#" data-toggle="collapse" data-target="#entrevista<?= $row -> encrypt_codigo_pr?>" class="btn btn-block ap-gral-btn"> Generar entrevista </a>
													<br>
													<div id="entrevista<?= $row -> encrypt_codigo_pr?>" class="collapse">
														<form action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/add-new-interview/<?= $row -> encrypt_codigo_pr?>" method="post">
														  <div class="form-group">
														    <label for="fecha"> Fecha: </label>
														    <input type="date" class="form-control" name="fecha" id="fecha" required>
														  </div>
														  <div class="form-group">
														    <label for="hora"> Hora: </label>
														    <input type="time" class="form-control" name="hora" id="hora" required>
														  </div>
														  <button type="submit" class="btn btn-block btnRuta ap-gral-btn btnRuta"> Generar </button>
														</form>
													</div>
												<?php } else {
													// code...
												}?>
											</div>
										</div>
										<br>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
