					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php if ($vacantes != ""){ $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-3">
										<?php if (empty($totalV)) { ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : 0 Vacantes </a>
										<?php }else{ ?>
											<a href="#" class="btn btn-outline-primary float-left">Total : <?php echo $totalV ?>  Vacantes </a>
											<input type="hidden" name="" id="totalRegistros" value="<?php echo $totalV ?>">
										<?php } ?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-3">
										<center>
											<a href="<?= base_url()?>Admin/<?= $ruta ?>/ver-vacantes-contratadas" class="btn btn-outline-success"> Ver vacantes contratadas </a>
										</center>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-3">
										<center>
											<a href="<?= base_url()?>Admin/<?= $ruta ?>/ver-vacantes-con-entrevista" class="btn btn-outline-info"> Ver vacantes con entrevista </a>
										</center>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-3">
										<center>
											<a href="<?= base_url()?>Admin/<?= $ruta ?>/ver-vacantes-sin-entrevista" class="btn btn-outline-danger"> Ver vacantes sin entrevista </a>
										</center>
									</div>
								</div>
								<br><br>
								<div class="row">
									<?php foreach ($vacantes as $row){ ?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h5 class="card-title"> <center> <?php foreach ($puesto as $rowp){ ?>
														<?php if ($rowp -> idPuesto == $row -> Puesto){
															print_r($rowp -> Puesto);
														} ?>
													<?php } ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-building"> </span> <b> Lugar de trabajo: </b> <small> <br> <?= $row -> LTrabajo ?> </small> </p>
													<p> <span class="fas fa-wrench"> </span> <b> Actividades a desempeñar: <small> <br> <?= $row -> aDesempenae ?> </small> </b> </p>
													<p> <span class="fas fa-file-alt"> </span> <b> Requisitos: </b> <small> <br><?= $row -> Requisitos ?> </small> </p>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha limite: </b> <small> <br> <?= $row -> FLimite ?> </small>	</p>
													<br>
													<div class="row">
														<?php if ($row -> entrevista == 1 && $row -> cubierta == 1){ ?>
															<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																<center>
																	<h4> Contratada desde el <?= $row -> FCubierta ?> </h4>
																</center>
															</div>
														<?php }elseif ($row -> entrevista == 1 && $row -> cubierta == 0) {?>
															<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																<center>
																	<a id="" href="<?= base_url()?>Admin/<?= $ruta ?>/ver-entrevista/<?= $row -> IdVacante ?>" class="btn btn-outline-success btn-block"> Ver </a>
																</center>
															</div>
														<?php }else { ?>
															<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																<center>
																	<h4> Sin entrevista asignada </h4>
																</center>
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
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<center>
											<h1> La empresa no cuenta con vacantes. </h1>
											<br><br><br><br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.png" alt="ERP_Icon_NER">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
