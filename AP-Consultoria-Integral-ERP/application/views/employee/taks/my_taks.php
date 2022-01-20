					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-3">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_t ?> </a>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-pending-tasks/<?= $tbl_e -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn"> Pendientes </a>
									</center>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-working-tasks/<?= $tbl_e -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn"> Trabajando </a>
									</center>
								</div>
								<div class="ap-class-3">
									<center>
										<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-completed-tasks/<?= $tbl_e -> encrypt_numero_empleado_e ?>" class="btn btn-block ap-gral-btn"> Atendidas </a>
									</center>
								</div>
							</div>
							<br>
							<div class="row">
							  <div class="ap-class-12">
							  	<h4> <small> Código de colores </small> </h4>
									<ul class="list-group list-group-horizontal">
										<li class="list-group-item"> <div class="float-left" style="width: 15px; height: 15px; background-color: #dd3545"> </div>  &nbsp; &nbsp; &nbsp; <span class="float-right"> Pendientes </span> </li>
										<li class="list-group-item"> <div class="float-left" style="width: 15px; height: 15px; background-color: #17a2b8"> </div>  &nbsp; &nbsp; &nbsp; <span class="float-right"> Trabajano </span> </li>
										<li class="list-group-item"> <div class="float-left" style="width: 15px; height: 15px; background-color: #ffc106"> </div>  &nbsp; &nbsp; &nbsp; <span class="float-right"> Validación </span> </li>
										<li class="list-group-item"> <div class="float-left" style="width: 15px; height: 15px; background-color: #343a40"> </div>  &nbsp; &nbsp; &nbsp; <span class="float-right"> Corregir </span> </li>
										<li class="list-group-item"> <div class="float-left" style="width: 15px; height: 15px; background-color: #28a745"> </div>  &nbsp; &nbsp; &nbsp; <span class="float-right"> Atendidos </span> </li>
									</ul>
							  </div>
							</div>
							<br><br>
							<?php if (!empty($tbl_t)){ ?>
								<div class="row">
									<?php foreach ($tbl_t as $row){ ?>
										<div class="ap-class-3-3-6-12">
											<div class="card" style="border: 1px solid <?php if ($row -> status_t == 1){ ?>
												<?php echo '#dd3545';?>
											<?php } elseif ($row -> status_t == 2) { ?>
												<?php echo '#17a2b8'; ?>
											<?php }elseif ($row -> status_t == 3) { ?>
												<?php echo '#ffc106';?>
											<?php } elseif ($row -> status_t == 4) { ?>
												<?php echo '#343a40';?>
											<?php } else { ?>
												<?php echo '#28a745';?>
											<?php } ?>">
												<div class="card-body">
													<h6 class="card-title">
														<center> <?= $row -> nombre_tarea_t ?> </center>
													</h6>
													<hr style="border: 1px solid <?php if ($row -> status_t == 1){ ?>
														<?php echo '#dd3545';?>
													<?php } elseif ($row -> status_t == 2) { ?>
														<?php echo '#17a2b8'; ?>
													<?php }elseif ($row -> status_t == 3) { ?>
														<?php echo '#ffc106';?>
													<?php } elseif ($row -> status_t == 4) { ?>
														<?php echo '#343a40';?>
													<?php } else { ?>
														<?php echo '#28a745';?>
													<?php } ?>">
													<h6> <span class="fas fa-calendar-alt"> </span> <b> Creación: </b> <small> <?= $row -> anio_creacion_t."-".$row -> mes_creacion_t."-".$row -> dia_creacion_t ?> </small> </h6>
													<?php if ($row -> autor_t == 1){ ?>
														<h6> <span class="fas fa-calendar-alt"> </span> <b> Entrega: </b> <small> <?= $row -> fecha_estimada_t ?> </small> </h6>
													<?php } ?>
													<h6> <span class="fas fa-clock"> </span> <b> Inicio: </b> <small> <?= $row -> inicio_t ?> </small> </h6>
													<h6> <span class="fas fa-clock"> </span> <b> Fin: </b> <small><?= $row -> fin_t ?> </small> </h6>
													<div class="row">
													  <?php if ($row -> status_t == 1){ ?>
													  	<div class="ap-class-6">
																<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em?>/start-task/<?= $row -> encrypt_codigo_t ?>" class="btn btn-block ap-gral-btn btnRuta"> <i class="fas fa-toggle-on"> </i> </a>
													  	</div>
													  <?php } elseif ($row -> status_t == 2 && $row -> autor_t == 2) { ?>
															<form onsubmit="return validate_task()" action="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em?>/finish-task/<?= $row -> encrypt_codigo_t ?>" method="post">
																<div class="row">
																	<div class="form-group ap-class-12">
																    <label for="coment_e"> Comentarios: </label>
																    <textarea id="coment_e" name="coment_e" class="form-control" rows="3" cols="22" required></textarea>
																  </div>
																</div>
																<br>
																<div class="row">
																	<div class="ap-class-6 offset-3">
																		<button type="submit" name="button" class="btn btn-block ap-gral-btn btnRuta"> <i class="fas fa-toggle-off"> </i> </button>
																	</div>
																</div>
																<div class="row">
																  <span id="ap-error-finis-task"> </span>
																</div>
															</form>
													  <?php } elseif ($row -> status_t == 2 && $row -> autor_t == 1) {?>
															<div class="ap-class-6 offset-6">
																<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em?>/finish-task/<?= $row -> encrypt_codigo_t ?>" class="btn btn-block ap-gral-btn btnRuta"> <i class="fas fa-toggle-off"> </i> </a>
															</div>
														<?php } elseif ($row -> status_t == 4 && $row -> autor_t == 1) { ?>
															<h6> <span class="fas fa-copy"> </span> <b> Comentarios: </b> <small> <?= $row -> comentarios_d_t ?> </small> </h6>
															<div class="ap-class-6 offset-6">
																<a href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em?>/finish-task/<?= $row -> encrypt_codigo_t ?>" class="btn btn-block ap-gral-btn btnRuta"> <i class="fas fa-toggle-off"> </i> </a>
															</div>
														<?php } else { }?>
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
											<h1> No cuentas con tareas. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
