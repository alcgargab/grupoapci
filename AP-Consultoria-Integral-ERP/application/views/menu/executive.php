			<div class="">
				<div class="row">
					<div id="ap-menu-lg" class="ap-menu-lg-class">
						<div class="row">
						  <div class="ap-class-12">
								<input id="ruta" type="hidden" name="" value="<?= $tbl_em_ruta ?>">
								<div id="ap-menu-directivo">
									<!-- Actividades -->
							    <div class="card">
							      <div class="card-header">
							        <a class="card-link" data-toggle="collapse" href="#ap-ac-down">
												<p>
													Actividades
													<img src="<?= base_url()?>images/Icono/ERP_Icon_AC.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
													<input id="templeado" class="form-control" type="hidden" name="" value="0">
												</p>
							        </a>
							      </div>
							      <div id="ap-ac-down" class="collapse" data-parent="#ap-menu-directivo">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($tbl_em as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Directivo/<?= $row -> ruta_em ?>/view-sessions">
																<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
															</a>
														</li>
													<?php } ?>
												</ul>
							        </div>
							      </div>
							    </div>
									<!-- Tareas -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#ap-t-down">
												<p>
													Tareas
													<img src="<?= base_url()?>images/Icono/ERP_Icon_TA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
												</p>
											</a>
										</div>
										<div id="ap-t-down" class="collapse" data-parent="#ap-menu-directivo">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($tbl_em as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Directivo/<?= $row -> ruta_em ?>/view-task">
																<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
															</a>
														</li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
									<!-- vacantes -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#ap-v-down">
												<p>
													Vacantes
													<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
													<input id="tvacante" class="form-control" type="hidden" name="" value="0">
												</p>
											</a>
										</div>
										<div id="ap-v-down" class="collapse" data-parent="#ap-menu-directivo">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($tbl_em as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Directivo/<?= $row -> ruta_em ?>/view-job-vacancies">
																<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
															</a>
														</li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
									<!-- permisos -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" href="<?= base_url()?>Directivo/<?= $tbl_em_ruta ?>/view-permission">
												Permisos <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
											</a>
										</div>
									</div>
									<!-- permisos urgentes -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" href="<?= base_url()?>Directivo/<?= $tbl_em_ruta ?>/view-urgent-permissions">
												Permisos Urgentes <img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
											</a>
										</div>
									</div>
							  </div>
						  </div>
						</div>
					</div>
