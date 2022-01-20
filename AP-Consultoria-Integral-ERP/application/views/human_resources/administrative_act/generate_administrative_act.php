					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-12">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb ap-bread">
											<li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/list-administrative-act">
													Lista de empleados
												</a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">
												Empleado
											</li>
											<li class="breadcrumb-item active" aria-current="page" style="text-transform: lowercase">
												<?= $tbl_e -> apellido_paterno_e." ".$tbl_e -> apellido_materno_e." ".$tbl_e -> nombre_e ?>
											</li>
										</ol>
									</nav>
								</div>
							</div>
								<br>
								<?php if (!empty($tbl_e)) { ?>
									<div class="container row">
								  	<div class="ap-class-12">
											<form class="" onsubmit="return validate_administrative_act()" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/generate-administrative-act-document/<?= $tbl_e -> encrypt_numero_empleado_e?>" method="post">
												<!-- <div class="row">
												  <div class="ap-class-12">
												  	<input type="hidden" name="" class="form-control" value="<?= $tbl_e -> encrypt_numero_empleado_e?>">
												  </div>
												</div> -->
												<div class="row">
													<div class="ap-class-6 offset-3">
														<div class="form-group">
													    <label for="motivo_aa_rrhh"> Motivo del acta RRHH : </label>
													    <textarea id="motivo_aa_rrhh" name="motivo_aa_rrhh" rows="8" cols="80" class="form-control" required></textarea>
													  </div>
												  </div>
												</div>
												<div class="row">
													<div class="ap-class-12">
												  	<span id="ap_error_administrative_act"></span>
												  </div>
												</div>
												<br>
												<div class="row">
													<div class="ap-class-6 offset-3">
												  	<input type="submit" class="btn btn-block ap-gral-btn btnRuta" name="" value="Generar">
												  </div>
												</div>
											</form>
								  	</div>
									</div>
								<?php }else { ?>
									<div class="row">
										<div class="ap-class-12">
											<center>
												<h1> No existe el registro </h1>
												<br>
												<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
											</center>
										</div>
									</div>
								<?php } ?>
						</div>
					</div>
