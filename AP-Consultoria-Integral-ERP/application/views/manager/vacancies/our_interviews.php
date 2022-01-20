					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_en ?> </a>
								</div>
								<div class="ap-class-9">
									<form class="" onsubmit="return validate_vacancies()" action="<?= base_url()?>gerentedearea/<?= $tbl_em -> ruta_em ?>/search-interviews" method="post">
										<div class="row">
											<div class="ap-class-10">
												<span id="error_validate_vacancies">  </span>
										  </div>
										</div>
										<div class="row">
										  <div class="ap-class-10">
												<select class="form-control" id="vacante" name="vacante">
													<option value="selecciona-la-vacante"> Selecciona la vacante </option>
													<?php foreach ($tbl_va as $rowva){ ?>
														<option value="<?= $rowva -> encrypt_codigo_va?>"> <?= $rowva -> puesto_pue ?> </option>
													<?php } ?>
												</select>
										  </div>
											<div class="ap-class-2">
												<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Buscar">
											</div>
										</div>
									</form>
								</div>
							</div>
							<br><br>
							<?php if (!empty($tbl_en)){ ?>
								<div class="row">
									<?php foreach ($tbl_en as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card">
												<br>
												<div class="card-body">
													<h5 class="card-title">
														<center>
															<?= $row -> apellido_paterno_pr." ".$row -> apellido_materno_pr." ".$row -> nombre_pr ?>
														</center>
													</h5>
													<hr>
													<p> <span class="fas fa-calendar-check"> </span> <b> Fecha: </b> <small> <?= $row -> fecha_en ?> </small>	</p>
													<p> <span class="fas fa-clock"> </span> <b> Hora: </b> <small> <?= $row -> hora_en ?> </small>	</p>
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
											<h1> No cuentas con entrevistas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
