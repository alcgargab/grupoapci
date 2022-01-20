					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php if (!empty($peremp)){ $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
									</div>
								</div>
								<br>
								<div class="row">
									<?php foreach ($peremp as $row){ ?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-12">
											<div class="card">
												<br>
												<center> <img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $ruta?>/<?= $row -> FotoEmp?>" alt="Card image" style="width:50%"> </center>
												<div class="card-body">
													<h5 class="card-title"> <center> <?= $row -> ApellidoPEmp. " ". $row -> ApellidoMEmp . " ". $row -> NomEmp ?> </center> </h5>
													<hr>
													<p> <h4> Permiso: </h4> </p>
													<h5> <span class="fas fa-calendar-alt"> </span> <b> Fecha del permiso: </b> <small> <?= $row -> start ?> </small> </h5>
													<h5> <span class="fas fa-clock"> </span> <b> De: <small> <?= $row -> horastart ?> </small> </b> </h5>
													<h5> <span class="fas fa-clock"> </span> <b> A: </b> <small><?= $row -> horaend ?> </small> </h5>
													<h5> <span class="fas fa-clock"> </span> <b> Total de horas: </b> <small> <?= $row -> horas ?> </small>	</h5>
													<br>
													<?php if ($row -> statusJefe == 1){ ?>
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-12">
														    <a id="btnEnvPermi" href="<?= base_url()?>Admin/<?= $ruta ?>/generar-documento-de-permiso/<?= $row -> IdPer ?>" class="btn btn-outline-dark btn-block"> Generar </a>
														  </div>
														</div>
													<?php }else { ?>
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12 col-12">
														    <center>
														    	<h5 class="text-danger"> Permiso no autorizadó por el gerente de área. </h5>
														    </center>
														  </div>
														</div>
													<?php } ?>
												</div>
											</div>
											<br>
										</div>
									<?php }
								} else { ?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<center>
											<h1> La empresa no cuenta con permisos. </h1>
											<br><br><br><br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.png" alt="ERP_Icon_NER">
										</center>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
