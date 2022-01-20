					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn">Total : <?php echo $total_tbl_en ?> </a>
								</div>
								<div class="ap-class-9">
									<form class="" onsubmit="return validate_vacancies()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/search-interviews" method="post">
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
												<input type="submit" class="btn btn-block ap-gral-btn" name="" value="Buscar">
											</div>
										</div>
										<!-- <br> -->
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
													<!-- <?php if ($row -> prospecto_pr == 2){ ?>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/hire-candidate/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Contratar </a>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/to-second-filter/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Segundo Filtro </a>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/deny-interview/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Descartar </a>
													<?php }
													elseif ($row -> prospecto_pr == 3) { ?>
														<center>
															<h4 class="text-danger"> <b> Descartado </b> </h4>
														</center>
													<?php }
													elseif ($row -> prospecto_pr == 4) { ?>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/hire-candidate/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Contratar </a>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/to-third-filter/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Tercer Filtro </a>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/deny-interview/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Descartar </a>
													<?php }
													elseif ($row -> prospecto_pr == 5) { ?>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/hire-candidate/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Contratar </a>
														<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em?>/deny-interview/<?= $row -> encrypt_codigo_en?>" class="btn btn-block ap-gral-btn"> Descartar </a>
													<?php }
													else { ?>
														<center>
															<h4 class="text-success"> <b> Contratado </b> </h4>
														</center>
													<?php } ?> -->
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
											<h1> La empresa no cuenta con entrevistas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
