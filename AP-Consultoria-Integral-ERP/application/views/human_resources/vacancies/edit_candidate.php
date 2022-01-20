					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
							  <div class="ap-class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb ap-bread">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-job-vacancies">
													Vacantes
												</a>
											</li>
									    <li class="breadcrumb-item active" aria-current="page">
												Editar
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<?php $controller_total_candidate = count($tbl_pr); for ($i = 0; $i < $controller_total_candidate; $i++) { ?>
								<div id="ap-prospector-down">
									  <div class="card">
									    <div class="card-header">
									      <a class="card-link" data-toggle="collapse" href="#pros<?= $i?>">
									        Prospecto <?= $i +1 ?>
									      </a>
									    </div>
									    <div id="pros<?= $i?>" class="collapse" data-parent="#ap-prospector-down">
									      <div class="card-body">
													<form class="" onsubmit="return validate_interviews<?= $i?>()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?= $tbl_pr[$i] -> encrypt_codigo_va ?>" method="post" enctype="multipart/form-data">
														<div class="row">
														  <div class="ap-class-12">
																<input type="hidden" name="ap-prospecto" value="<?= $tbl_pr[$i] -> encrypt_codigo_pr ?>">
														  </div>
														</div>
														<div class="row">
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="apellido_paterno"> Apellido paterno: </label>
																  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno<?= $i?>" value="<?php if ($tbl_pr != ""){
																		print_r($tbl_pr[$i] -> apellido_paterno_pr);
																	}else {
																		print_r('');
																	}?>" required>
																</div>
															</div>
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="apellido_materno"> Apellido materno: </label>
																  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno<?= $i?>" value="<?php if ($tbl_pr != ""){
																		print_r($tbl_pr[$i] -> apellido_materno_pr);
																	}else {
																		print_r('');
																	}?>" required>
																</div>
															</div>
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="nombre"> Nombre: </label>
																  <input type="text" class="form-control" name="nombre" id="nombre<?= $i?>" value="<?php if ($tbl_pr != ""){
																		print_r($tbl_pr[$i] -> nombre_pr);
																	}else {
																		print_r('');
																	}?>" required>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="telefono"> Teléfono: </label>
																  <input type="tel" class="form-control" name="telefono" id="telefono<?= $i?>" pattern="[0-9]{10}" value="<?php if ($tbl_pr != ""){
																		print_r($tbl_pr[$i] -> telefono_pr);
																	}else {
																		print_r('');
																	}?>" required>
																</div>
															</div>
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="email"> Correo electrónico: </label>
																  <input type="email" class="form-control" name="email" id="email<?= $i?>" value="<?php if ($tbl_pr != ""){
																		print_r($tbl_pr[$i] -> email_pr);
																	}else {
																		print_r('');
																	}?>" required>
																</div>
															</div>
															<div class="ap-class-4-4-4-12">
																<div class="form-group">
																  <label for="cv"> Adjuntar CV: </label>
																  <input type="file" class="form-control" name="cv" id="cv<?= $i?>">
																</div>
															</div>
														</div>
														<div class="row">
														  <div class="ap-class-12">
																<span id="error_validate_interviews<?= $i?>">  </span>
														  </div>
														</div>
														<div class="row">
															<div class="ap-class-6 offset-3">
																<input type="submit" class="btn btn-block btnEntrevista ap-gral-btn" name="" value="Aceptar">
															</div>
														</div>
													</form>
									      </div>
									    </div>
									  </div>
									</div>
							<?php } ?>
						</div>
					</div>
