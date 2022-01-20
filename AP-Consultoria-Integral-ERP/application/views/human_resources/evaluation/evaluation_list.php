					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_ev ?> </a>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_ev)){ ?>
								<div class="row">
									<?php foreach ($tbl_ev as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<center> <img class="card-img-top" src="<?= base_url()?>images/Empleado/<?= $tbl_em -> ruta_em ?>/<?= $row -> foto_empleado_e ?>" alt="AP-Consultoria-Integral-ERP" style="width:50%"> </center>
												<div class="card-body">
													<h5 class="card-title"> <center> <?= $row -> apellido_paterno_e. " ". $row -> apellido_materno_e . " ". $row -> nombre_e ?> </center> </h5>
													<hr>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha de creación: </b> <small> <?= $row -> fecha_evaluacion_ev ?> </small>	</p>
													<p> <?php print_r(substr($row -> comentarios_ev, 0, 15)."...");  ?> </p>
													<div class="row">
													  <div class="ap-class-12">
													    <center>
													    	<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/download-my-evaluation/<?= $row -> encrypt_codigo_ev ?>" class="btn btn-block ap-gral-btn btnRuta"> Descargar </a>
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
											<h1> La empresa no cuenta con evaluaciones. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
