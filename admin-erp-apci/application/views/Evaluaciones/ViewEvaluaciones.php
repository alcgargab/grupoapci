					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php if (!empty($evemp)){ $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
									</div>
								</div>
								<br>
								<div class="row">
									<?php foreach ($evemp as $row){ ?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-12">
											<div class="card">
												<br>
												<center> <img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $ruta?>/<?= $row -> FotoEmp?>" alt="Card image" style="width:50%"> </center>
												<div class="card-body">
													<h5 class="card-title"> <center> <?= $row -> ApellidoPEmp. " ". $row -> ApellidoMEmp . " ". $row -> NomEmp ?> </center> </h5>
													<br>
													<h5 class="card-title"> <center> <?= $row -> CodigoE ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha de creación: </b> <small> <?= $row -> FEvaluacion ?> </small>	</p>
													<p> <?php print_r(substr($row -> Comentarios, 0, 15)."...");  ?> </p>
													<div class="row">
													  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
													    <center>
													    	<a href="<?= base_url()?>Admin/<?= $ruta ?>/descargar-mi-evaluacion/<?= $row -> CodigoEMd5 ?>" class="btn btn-outline-success"> Descargar Evaluación </a>
													    </center>
													  </div>
													</div>
												</div>
											</div>
											<br>
										</div>
									<?php }
								} else { ?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<center>
											<h1> La empresa no cuenta con evaluaciones. </h1>
											<br><br><br><br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.png" alt="ERP_Icon_NER">
										</center>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
