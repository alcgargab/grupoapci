			<div class="">
				<div class="row">
					<div id="ap-menu-lg" class="ap-menu-lg-class">
						<div class="row">
						  <div class="ap-ap-class-12">
								<input id="ruta" type="hidden" name="" value="<?= $tbl_em_ruta ?>">
								<div id="ap-menu-rh">
									<?php switch ($this -> session -> user) {
										// usuario de Silvia
										case 'SGrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-employee">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- Actas administrativas -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-aa-down">
														<p>
															Acta administrativa
															<img src="<?= base_url()?>images/Icono/ERP_Icon_AA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-aa-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/list-administrative-act">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- baja del personal -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-eb-down">
														<p>
															Bajas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tbaja" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-eb-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/unsubscribe">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-job-vacancies">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-interview">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-wallet">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- evaluación -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
														<p>
															Evaluaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-evaluations">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-vi-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-visits">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-exit-pass">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-permission">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-urgent-permissions">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- contratos -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-co-down">
														<p>
															Contratos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Con.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-co-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-contracts">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- expediente -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-ex-down">
														<p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-case-files">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-holidays">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario de Diana
										case 'DTrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-employee">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- Actas administrativas -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-aa-down">
														<p>
															Acta administrativa
															<img src="<?= base_url()?>images/Icono/ERP_Icon_AA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-aa-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/list-administrative-act">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- baja del personal -->
											<div class="card">
									      <div class="card-header">
									        <a class="collapsed card-link" data-toggle="collapse" href="#ap-eb-down">
														<p>
															Bajas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tbaja" class="form-control" type="hidden" name="" value="0">
														</p>
									      	</a>
									      </div>
									      <div id="ap-eb-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/unsubscribe">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-job-vacancies">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-interview">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-wallet">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- evaluación -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
														<p>
															Evaluaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-evaluations">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-vi-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-visits">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-exit-pass">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-permission">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-urgent-permissions">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- contratos -->
											<div class="card">
									      <div class="card-header">
									        <a class="collapsed card-link" data-toggle="collapse" href="#ap-co-down">
														<p>
															Contratos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Con.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
									      	</a>
									      </div>
									      <div id="ap-co-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-contracts">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
									        </div>
									      </div>
									    </div>
											<!-- expediente -->
											<div class="card">
									      <div class="card-header">
									        <a class="card-link" data-toggle="collapse" href="#ap-ex-down">
									          <p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
									          </p>
									        </a>
									      </div>
									      <div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-case-files">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
									        </div>
									      </div>
									    </div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-holidays">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario de Thalia
										case 'TTrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-employee">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevistas recepción -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-rec-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-en-rec-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-today-s-interviews">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas recepción -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-rec-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-vi-rec-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-today-s-visits">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida recepción -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-rec-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ps-rec-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-today-s-exit-pass">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos recepción -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-rec-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-rec-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-today-s-permissions">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes recepción -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-rec-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-rec-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-today-s-urgent-permits">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-job-vacancies">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-interview">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-wallet">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-holidays">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario de Eduardo
										case 'ESrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-employee">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- Actas administrativas -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-aa-down">
														<p>
															Acta administrativa
															<img src="<?= base_url()?>images/Icono/ERP_Icon_AA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-aa-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/list-administrative-act">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-job-vacancies">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-interview">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-wallet">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- expediente -->
											<div class="card">
									      <div class="card-header">
									        <a class="card-link" data-toggle="collapse" href="#ap-ex-down">
									          <p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
									          </p>
									        </a>
									      </div>
									      <div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-case-files">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
									        </div>
									      </div>
									    </div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-holidays">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario de Vianey
										case 'VBrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-employee">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Actas administrativas -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-aa-down">
														<p>
															Acta administrativa
															<img src="<?= base_url()?>images/Icono/ERP_Icon_AA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-aa-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/list-administrative-act">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- baja del personal -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-eb-down">
														<p>
															Bajas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tbaja" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-eb-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/unsubscribe">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacantes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-job-vacancies">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-interview">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-wallet">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- evaluación -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
														<p>
															Evaluaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-evaluations">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-vi-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-visits">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-exit-pass">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-permission">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-urgent-permissions">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- contratos -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-co-down">
														<p>
															Contratos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Con.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-co-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-contracts">
																		<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- expediente -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-ex-down">
														<p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-case-files">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-holidays">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario de Valeria
										case 'VJrheo': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-employee">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Actas administrativas -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-aa-down">
														<p>
															Acta administrativa
															<img src="<?= base_url()?>images/Icono/ERP_Icon_AA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-aa-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/list-administrative-act">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- baja del personal -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-eb-down">
														<p>
															Bajas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tbaja" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-eb-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/unsubscribe">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacantes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-job-vacancies">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-interview">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-wallet">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- evaluación -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
														<p>
															Evaluaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-evaluations">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-vi-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-visits">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-exit-pass">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-permission">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-urgent-permissions">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- contratos -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-co-down">
														<p>
															Contratos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Con.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-co-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-contracts">
																		<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- expediente -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-ex-down">
														<p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-case-files">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<li class="list-group-item">
																<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-holidays">
																	<img src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										//usuario de Edgar
										case 'EMapci': ?>
											<!-- personal -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-e-down">
														<p>
															Personal
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-e-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-employee">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- baja del personal -->
											<div class="card">
									      <div class="card-header">
									        <a class="collapsed card-link" data-toggle="collapse" href="#ap-eb-down">
														<p>
															Bajas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tbaja" class="form-control" type="hidden" name="" value="0">
														</p>
									      	</a>
									      </div>
									      <div id="ap-eb-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/unsubscribe">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-va-down">
														<p>
															Vacantes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_V.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-va-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-job-vacancies">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- entrevista -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-en-down">
														<p>
															Entrevistas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_M_Inter.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-en-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-interview">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- cartera -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-c-down">
														<p>
															Cartera
															<img src="<?= base_url()?>images/Icono/ERP_Icon_CA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-c-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-wallet">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- evaluación -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ev-down">
														<p>
															Evaluaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-evaluations">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- visitas -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-vi-down">
														<p>
															Visitas
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Vi.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-vi-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-visits">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- pases de salida -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-ps-down">
														<p>
															Pases de salida
															<img src="<?= base_url()?>images/Icono/ERP_Icon_O.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-ps-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-exit-pass">
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
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-p-down">
														<p>
															Permisos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
													</a>
												</div>
												<div id="ap-p-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-permission">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- permisos urgentes -->
											<div class="card">
												<div class="card-header">
													<a class="collapsed card-link" data-toggle="collapse" href="#ap-pu-down">
														<p>
															Permisos urgentes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tentrevista" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-urgent-permissions">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
											<!-- contratos -->
											<div class="card">
									      <div class="card-header">
									        <a class="collapsed card-link" data-toggle="collapse" href="#ap-co-down">
														<p>
															Contratos
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Con.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
														</p>
									      	</a>
									      </div>
									      <div id="ap-co-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-contracts">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
									        </div>
									      </div>
									    </div>
											<!-- expediente -->
											<div class="card">
									      <div class="card-header">
									        <a class="card-link" data-toggle="collapse" href="#ap-ex-down">
									          <p>
															Expedientes
															<img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="texpediente" class="form-control" type="hidden" name="" value="0">
									          </p>
									        </a>
									      </div>
									      <div id="ap-ex-down" class="collapse" data-parent="#ap-menu-rh">
									        <div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-case-files">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
									        </div>
									      </div>
									    </div>
											<!-- vacaciones -->
											<div class="card">
												<div class="card-header">
													<a class="card-link" data-toggle="collapse" href="#ap-v-down">
														<p>
															Vacaciones
															<img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
															<input id="tvacacion" class="form-control" type="hidden" name="" value="0">
														</p>
													</a>
												</div>
												<div id="ap-v-down" class="collapse" data-parent="#ap-menu-rh">
													<div class="card-body">
														<ul class="list-group list-group-flush">
															<?php foreach ($tbl_em as $row){ ?>
																<li class="list-group-item">
																	<a href="<?= base_url()?>Recursoshumanos/<?= $row -> ruta_em ?>/view-the-holidays">
																		<img src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											</div>
										<?php break;
										// usuario no existe
										default:
											$this -> load -> view('bug/404');
											$this -> load -> view('main/Footer');
										break;
									} ?>
							  </div>
						  </div>
						</div>
					</div>
