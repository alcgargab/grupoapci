					<div class="homeClass">
						<div class="container-fluid">
							<?php if ($evaluaciones != ""){ ?>
								<div class="row">
									<?php foreach ($evaluaciones as $row){ ?>
										<div class="Class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h5 class="card-title"> <center> <?= $row -> CodigoE ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha de creación: </b> <small> <?= $row -> FEvaluacion ?> </small>	</p>
													<p> <?php print_r(substr($row -> Comentarios, 0, 15)."...");  ?> </p>
													<div class="row">
													  <div class="Class-12">
													    <center>
													    	<a href="<?= base_url()?>gerentedearea/download-evaluation/<?= $row -> CodigoEMd5 ?>" class="btn btn-outline-success"> Descargar Evaluación </a>
													    </center>
													  </div>
													</div>
												</div>
											</div>
											<br>
										</div>
									<?php }
								} else { ?>
									<div class="Class-12">
										<center>
											<h1> No cuentas con evaluaciones. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
