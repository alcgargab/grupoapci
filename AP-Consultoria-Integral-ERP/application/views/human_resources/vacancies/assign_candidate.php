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
												Agregar
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<div id="ap-prospectos-down">
								<!-- prospecto 1 -->
							  <div class="card">
							    <div class="card-header">
							      <a class="card-link" data-toggle="collapse" href="#pros1">
							        Prospecto 1
											<?php if ($tbl_pr != "null" && $total_tbl_pr > 0) {
												// $controller_num = 1;
												// $controller_check = $tbl_va -> codigo_va."-".$controller_num;
												if ($tbl_pr[0] -> codigo_pr != ""){ ?>
													<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Check.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
												<?php }
											}
											else { ?>
												<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Error.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
											<?php } ?>
							      </a>
							    </div>
							    <div id="pros1" class="collapse" data-parent="#ap-prospectos-down">
							      <div class="card-body">
											<form class="" onsubmit="return validate_interviews0()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?php print_r($tbl_va -> encrypt_codigo_va);?>" method="post" enctype="multipart/form-data">
												<!-- <div class="row">
												  <div class="ap-class-6">
														<input type="text" class="form-control" name="Codigo" value="<?php print_r($tbl_va -> codigo_va);?>">
												  </div>
													<div class="ap-class-6">
														<input type="hidden" class="form-control" name="plus" value="1">
													</div>
												</div> -->
												<!-- <div class="row">
												  <div class="ap-class-12">
														<input type="hidden" name="Vacante" value="<?php print_r($tbl_va -> id_va);?>">
												  </div>
												</div> -->
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_paterno"> Apellido paterno: </label>
														  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno0" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_materno"> Apellido materno: </label>
														  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno0" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="nombre"> Nombre: </label>
														  <input type="text" class="form-control" name="nombre" id="nombre0" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="telefono"> Teléfono: </label>
														  <input type="tel" class="form-control" name="telefono" id="telefono0" pattern="[0-9]{10}" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="email"> Correo electrónico: </label>
														  <input type="email" class="form-control" name="email" id="email0" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="cv"> Adjuntar CV: </label>
														  <input type="file" class="form-control" name="cv" id="cv">
														</div>
													</div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<span id="error_validate_interviews0">  </span>
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
								<!-- prospecto 2 -->
							  <div class="card">
							    <div class="card-header">
							      <a class="collapsed card-link" data-toggle="collapse" href="#pros2">
							        Prospecto 2
											<?php if ($tbl_pr != "null" && $total_tbl_pr > 1) {
												// $controller_num = 2;
												// $controller_check = $tbl_va -> codigo_va."-".$controller_num;
												if ($tbl_pr[1] -> codigo_pr != ""){ ?>
													<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Check.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
												<?php }
											}
											else { ?>
												<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Error.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
											<?php } ?>
							      </a>
							    </div>
							    <div id="pros2" class="collapse" data-parent="#ap-prospectos-down">
							      <div class="card-body">
											<form class="" onsubmit="return validate_interviews1()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?php print_r($tbl_va -> encrypt_codigo_va);?>" method="post" enctype="multipart/form-data">
												<div class="row">
												  <div class="ap-class-6">
														<input type="hidden" class="form-control" name="Codigo" value="<?php print_r($tbl_va -> codigo_va);?>">
												  </div>
													<div class="ap-class-6">
														<input type="hidden" class="form-control" name="plus" value="2">
													</div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<input type="hidden" name="Vacante" value="<?php print_r($tbl_va -> id_va);?>">
												  </div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<span id="error_validate_interviews1">  </span>
												  </div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_paterno"> Apellido paterno: </label>
														  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno1" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_materno"> Apellido materno: </label>
														  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno1" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="nombre"> Nombre: </label>
														  <input type="text" class="form-control" name="nombre" id="nombre1" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="telefono"> Teléfono: </label>
														  <input type="tel" class="form-control" name="telefono" id="telefono1" pattern="[0-9]{10}" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="email"> Correo electrónico: </label>
														  <input type="email" class="form-control" name="email" id="email1" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="cv"> Adjuntar CV: </label>
														  <input type="file" class="form-control" name="cv" id="cv1">
														</div>
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
								<!-- prospecto 3 -->
							  <div class="card">
							    <div class="card-header">
							      <a class="collapsed card-link" data-toggle="collapse" href="#pros3">
							        Prospecto 3
											<?php if ($tbl_pr != "null" && $total_tbl_pr > 2) {
												// $controller_num = 3;
												// $controller_check = $tbl_va -> codigo_va."-".$controller_num;
												if ($tbl_pr[2] -> codigo_pr != ""){ ?>
													<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Check.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
												<?php }
											}
											else { ?>
												<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Error.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
											<?php } ?>
							      </a>
							    </div>
							    <div id="pros3" class="collapse" data-parent="#ap-prospectos-down">
							      <div class="card-body">
											<form class="" onsubmit="return validate_interviews2()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?php print_r($tbl_va -> encrypt_codigo_va);?>" method="post" enctype="multipart/form-data">
												<div class="row">
												  <div class="ap-class-6">
														<input type="hidden" class="form-control" name="Codigo" value="<?php print_r($tbl_va -> codigo_va);?>">
												  </div>
													<div class="ap-class-6">
														<input type="hidden" class="form-control" name="plus" value="3">
													</div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<input type="hidden" name="Vacante" value="<?php print_r($tbl_va -> id_va);?>">
												  </div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<span id="error_validate_interviews2">  </span>
												  </div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_paterno"> Apellido paterno: </label>
														  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno2" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_materno"> Apellido materno: </label>
														  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno2" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="nombre"> Nombre: </label>
														  <input type="text" class="form-control" name="nombre" id="nombre2" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="telefono"> Teléfono: </label>
														  <input type="tel" class="form-control" name="telefono" id="telefono2" pattern="[0-9]{10}" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="email"> Correo electrónico: </label>
														  <input type="email" class="form-control" name="email" id="email2" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="cv"> Adjuntar CV: </label>
														  <input type="file" class="form-control" name="cv" id="cv2">
														</div>
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
								<!-- prospecto 4 -->
								<div class="card">
							    <div class="card-header">
							      <a class="collapsed card-link" data-toggle="collapse" href="#pros4">
							        Prospecto 4
											<?php if ($tbl_pr != "null" && $total_tbl_pr > 3) {
												// $controller_num = 4;
												// $controller_check = $tbl_va -> codigo_va."-".$controller_num;
												if ($tbl_pr[3] -> codigo_pr != ""){ ?>
													<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Check.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
												<?php }
											}
											else { ?>
												<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Error.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
											<?php } ?>
							      </a>
							    </div>
							    <div id="pros4" class="collapse" data-parent="#ap-prospectos-down">
							      <div class="card-body">
											<form class="" onsubmit="return validate_interviews3()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?php print_r($tbl_va -> encrypt_codigo_va);?>" method="post" enctype="multipart/form-data">
												<div class="row">
												  <div class="ap-class-6">
														<input type="hidden" class="form-control" name="Codigo" value="<?php print_r($tbl_va -> codigo_va);?>">
												  </div>
													<div class="ap-class-6">
														<input type="hidden" class="form-control" name="plus" value="4">
													</div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<input type="hidden" name="Vacante" value="<?php print_r($tbl_va -> id_va);?>">
												  </div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<span id="error_validate_interviews3">  </span>
												  </div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_paterno"> Apellido paterno: </label>
														  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno3" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_materno"> Apellido materno: </label>
														  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno3" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="nombre"> Nombre: </label>
														  <input type="text" class="form-control" name="nombre" id="nombre3" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="telefono"> Teléfono: </label>
														  <input type="tel" class="form-control" name="telefono" id="telefono3" pattern="[0-9]{10}" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="email"> Correo electrónico: </label>
														  <input type="email" class="form-control" name="email" id="email3" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="cv"> Adjuntar CV: </label>
														  <input type="file" class="form-control" name="cv" id="cv3">
														</div>
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
								<!-- prospecto 5 -->
								<div class="card">
							    <div class="card-header">
							      <a class="collapsed card-link" data-toggle="collapse" href="#pros5">
							        Prospecto 5
											<?php if ($tbl_pr != "null" && $total_tbl_pr > 4) {
												if ($tbl_pr[4] -> codigo_pr != ""){ ?>
													<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Check.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
												<?php }
											}
											else { ?>
												<span class="badge badge-light float-right"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Error.webp" alt="AP-Consultoria-Integral-ERP" width="25px"> </span>
											<?php } ?>
							      </a>
							    </div>
							    <div id="pros5" class="collapse" data-parent="#ap-prospectos-down">
							      <div class="card-body">
											<form class="" onsubmit="return validate_interviews4()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-candidate/<?php print_r($tbl_va -> encrypt_codigo_va);?>" method="post" enctype="multipart/form-data">
												<div class="row">
												  <div class="ap-class-6">
														<input type="hidden" class="form-control" name="Codigo" value="<?php print_r($tbl_va -> codigo_va);?>">
												  </div>
													<div class="ap-class-6">
														<input type="hidden" class="form-control" name="plus" value="5">
													</div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<input type="hidden" name="Vacante" value="<?php print_r($tbl_va -> id_va);?>">
												  </div>
												</div>
												<div class="row">
												  <div class="ap-class-12">
														<span id="error_validate_interviews4">  </span>
												  </div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_paterno"> Apellido paterno: </label>
														  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno4" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="apellido_materno"> Apellido materno: </label>
														  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno4" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="nombre"> Nombre: </label>
														  <input type="text" class="form-control" name="nombre" id="nombre4" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="telefono"> Teléfono: </label>
														  <input type="tel" class="form-control" name="telefono" id="telefono4" pattern="[0-9]{10}" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="email"> Correo electrónico: </label>
														  <input type="email" class="form-control" name="email" id="email4" required>
														</div>
													</div>
													<div class="ap-class-4-4-4-12">
														<div class="form-group">
														  <label for="cv"> Adjuntar CV: </label>
														  <input type="file" class="form-control" name="cv" id="cv4">
														</div>
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
						</div>
					</div>
