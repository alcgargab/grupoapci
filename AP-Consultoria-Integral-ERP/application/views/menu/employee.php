			<div class="">
				<div class="row">
					<div id="ap-menu-lg" class="ap-menu-lg-class">
						<div class="row">
						  <div class="ap-class-12">
								<input id="ruta" type="hidden" name="" value="<?= $tbl_em -> ruta_em ?>">
								<div id="ap-menu-operacion">
									<!-- enviar email -->
									<!-- <div class="card">
							      <div class="card-header">
											<a href="#" class="card-link" data-toggle="modal" data-target="#ap-sf-down">
												<p> Enviar email <img src="<?= base_url()?>images/Icono/ERP_Icon_Se.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
							      </div>
										<div class="modal fade" id="ap-sf-down">
											<div class="modal-dialog modal-dialog-centered modal-lg">
												<div class="modal-content">
													<div class="modal-header ap-gral-modal-header">
														<h4 class="modal-title"> Enviar documentos </h4>
														<button type="button" class="close" data-dismiss="modal"> &times; </button>
													</div>
													<div class="modal-body">
														<form class="" onsubmit="return validate_email()" action="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/send-files" method="post" enctype="multipart/form-data">
															<div class="row">
																<div class="ap-class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="from-email" id="from" placeholder="Para:" required>
																	</div>
																</div>
																<div class="ap-class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="Cc-email" id="Cc" placeholder="Cc:">
																	</div>
																</div>
																<div class="ap-class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="Cco-email" id="Cco" placeholder="Cco:">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="ap-class-6">
																	<div class="form-group">
																		<input type="text" class="form-control" name="subject-email" id="subject" placeholder="Asunto:" required>
																	</div>
																</div>
																<div class="ap-class-6">
																	<div class="form-group">
																		<label for="files-email" class="form-control"> <img src="<?= base_url()?>images/Icono/ERP_Icon_CL.webp" alt="AP-Consultoria-Integral-ERP"> <span id="ap-adj-email-name"> </span> </label>
																		<input type="file" class="form-control ap-adj-email" name="files-email[]" id="files-email" multiple="true">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="ap-class-12">
																	<div class="form-group">
																		<label for="redactar"> Redactar: </label>
																		<textarea name="redactar-email" id="redactar" class="form-control" rows="8" cols="80" required></textarea>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="ap-class-12">
																	<span id="ap-error-email">  </span>
																</div>
															</div>
															<div class="row">
																<div class="ap-class-6 offset-3">
																	<div class="form-group">
																		<button type="submit" name="" class="btn btn-block btnRuta ap-gral-btn"> Enviar <span class="fas fa-paper-plane"> </span> </button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer ap-gral-modal-footer"> </div>
												</div>
											</div>
										</div>
							    </div> -->
									<!-- tareas -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#ap-t-down">
												<p> Pendientes <img src="<?= base_url()?>images/Icono/ERP_Icon_TA.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
										</div>
										<div id="ap-t-down" class="collapse" data-parent="#ap-menu-operacion">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<a class="collapsed card-link" href="#" data-toggle="modal" data-target="#ap-modal-t">
															<p> Agregar <img src="<?= base_url()?>images/Icono/ERP_Icon_GenPer.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
														</a>
														<div class="modal fade" id="ap-modal-t">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																	<div class="modal-header ap-gral-modal-header">
																		<h4 class="modal-title"> Lista de pendientes </h4>
																		<button type="button" class="close" data-dismiss="modal">
																			<i class='fas fa-times ap-gral-fa-times'></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form class="" action="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/add-task/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
																			<div class="row">
																			  <div class="ap-class-12">
																					<div class="row">
																					  <div class="ap-class-12">
																					  	<input id="total_task" type="hidden" class="form-control" name="total_task" value="0">
																					  </div>
																					</div>
																			  	<div class="row">
																			  	  <div class="ap-class-6 offset-3">
																							<div class="form-group">
																						    <label for="task"> Número de pendiente: </label>
																						    <input type="text" class="form-control" name="" id="task" pattern="[0-9]" required>
																						  </div>
																			  	  </div>
																			  	</div>
																					<div class="row">
																					  <div class="ap-class-12">
																							<ul id="list-task" class="list-group">
																							</ul>
																					  </div>
																					</div>
																			  </div>
																			</div>
																			<!-- <div class="row">
																			  <div class="ap-class-12">
																			    <span id="ap-error-add-task">  </span>
																			  </div>
																			</div> -->
																			<div class="row">
																			  <div class="ap-class-6 offset-3">
																					<input type="submit" class="btn btn-block btnRuta ap-gral-btn" value="Generar">
																			  </div>
																			</div>
																		</form>
																	</div>
																	<div class="modal-footer ap-gral-modal-footer">
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="list-group-item">
														<a class="collapsed card-link" href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-my-task/<?= $tbl_e -> encrypt_numero_empleado_e ?>">
															<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
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
												<p> Evaluación <img src="<?= base_url()?>images/Icono/ERP_Icon_EME.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
										</div>
										<div id="ap-ev-down" class="collapse" data-parent="#ap-menu-operacion">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<a class="collapsed card-link" href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-my-evaluations/<?= $tbl_e -> encrypt_numero_empleado_e ?>">
															<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_EE.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
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
												<p> Permisos <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
										</div>
										<div id="ap-p-down" class="collapse" data-parent="#ap-menu-operacion">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<a class="collapsed card-link" href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-my-permissions/<?= $tbl_e -> encrypt_numero_empleado_e ?>">
															<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
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
												<p> Permisos urgentes <img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
										</div>
										<div id="ap-pu-down" class="collapse" data-parent="#ap-menu-operacion">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<a class="collapsed card-link" href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-my-urgent-permission/<?= $tbl_e -> encrypt_numero_empleado_e ?>">
															<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_VP.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- vacaciones -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#ap-v-down">
												<p>
													Vacaciones
													<img src="<?= base_url()?>images/Icono/ERP_Icon_GenHD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%">
													<input id="tautvacacion" type="hidden" name="" value="0">
												</p>
											</a>
										</div>
										<div id="ap-v-down" class="collapse" data-parent="#ap-menu-operacion">
											<div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<a class="collapsed card-link" href="<?= base_url()?>Employee/<?= $tbl_em -> ruta_em ?>/view-my-holidays/<?= $tbl_e -> encrypt_numero_empleado_e ?>">
															<p> Ver <img src="<?= base_url()?>images/Icono/ERP_Icon_HD.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
							  </div>
						  </div>
						</div>
					</div>
