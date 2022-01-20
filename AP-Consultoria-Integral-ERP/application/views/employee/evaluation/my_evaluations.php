					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-4">
									<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_ev ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_ev)){ ?>
								<div class="row">
									<?php foreach ($tbl_ev as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha de creación: </b> <small> <?= $row -> fecha_evaluacion_ev ?> </small> </p>
													<p> <?php print_r(substr($row -> comentarios_ev, 0, 15)."...");  ?> </p>
													<div class="row">
													  <div class="ap-class-12">
													    <center>
													    	<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/download-my-evaluation/<?= $row -> encrypt_codigo_ev ?>" class="btn btn-block ap-gral-btn"> Descargar </a>
													    </center>
													  </div>
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
											<h1> No cuentas con evaluaciones. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php }?>
						</div>
					</div>
