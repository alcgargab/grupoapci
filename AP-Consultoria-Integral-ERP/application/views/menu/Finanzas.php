			<div class="">
				<div class="row">
					<div id="erpMenuL" class="menuLClass">
						<div class="row">
						  <div class="Class-12">
								<input id="ruta" type="hidden" name="" value="<?= $ruta?>">
								<div id="ap-menu-finanzas">
									<!-- ver empleados -->
									<div class="card">
							      <div class="card-header">
							        <a class="card-link" data-toggle="collapse" href="#Empleados">
							          <p> Empleados <img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
							        </a>
							      </div>
							      <div id="Empleados" class="collapse" data-parent="#ap-menu-finanzas">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($empresamenu as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Finanzas/<?= $row -> Ruta ?>/view-employee">
																<img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
															</a>
														</li>
													<?php } ?>
												</ul>
							        </div>
							      </div>
							    </div>
									<!-- nomina de empleados -->
									<div class="card">
							      <div class="card-header">
							        <a class="card-link" data-toggle="collapse" href="#ProgramaNomina">
							          <p> Programa de Nómina <img src="<?= base_url()?>images/Icono/ERP_Icon_Nom.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
							        </a>
							      </div>
							      <div id="ProgramaNomina" class="collapse" data-parent="#ap-menu-finanzas">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($empresamenu as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Finanzas/<?= $row -> Ruta ?>/import-payroll">
																<img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="AP-Consultoria-Integral-ERP" width="30%">
															</a>
														</li>
													<?php } ?>
												</ul>
							        </div>
							      </div>
							    </div>
							  </div>
						  </div>
						</div>
					</div>
					<div id="erpMenuS" class="menuSClass">
						<div class="row">
						  <div class="Class-12">
								<input id="ruta" type="hidden" name="" value="<?= $ruta?>">
								<div id="accordionMenuS">
									<!-- enviar email -->
									<div class="card">
							      <div class="card-header">
							        <a href="#" class="card-link" data-toggle="modal" data-target="#enviaremailS">
												<center>
													<img src="<?= base_url()?>images/Icono/ERP_Icon_Se.webp" alt="AP-Consultoria-Integral-ERP" width="100%">
												</center>
							        </a>
							      </div>
										<div class="modal fade" id="enviaremailS">
											<div class="modal-dialog modal-dialog-centered modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"> Enviar documentos </h4>
														<button type="button" class="close" data-dismiss="modal"> &times; </button>
													</div>
													<div class="modal-body">
														<form class="" onsubmit="return validaremail()" action="<?= base_url()?>Finanzas/<?= $ruta ?>/send-files" method="post" enctype="multipart/form-data">
															<div class="row">
																<div class="Class-12">
																	<span id="errorEmail">  </span>
																</div>
															</div>
															<div class="row">
																<div class="Class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="from" id="from" placeholder="Para:" required>
																	</div>
																</div>
																<div class="Class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="Cc" id="Cc" placeholder="Cc:">
																	</div>
																</div>
																<div class="Class-4">
																	<div class="form-group">
																		<input type="email" class="form-control" name="Cco" id="Cco" placeholder="Cco:">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="Class-6">
																	<div class="form-group">
																		<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto:" required>
																	</div>
																</div>
																<div class="Class-6">
																	<div class="form-group">
																		<!-- <label for="adjArchivos" class="form-control"> <span id="adjArchivosSpan" class="fas fa-upload"> </span> </label> -->
																		<label for="adjArchivos[]" class="form-control"> <img src="<?= base_url()?>images/Icono/ERP_Icon_CL.webp" alt="AP-Consultoria-Integral-ERP"> <span id="adjArchivosSpan"> </span> </label>
																		<!-- <label for="adjArchivos[]"> Adjuntar Baja: </label> -->
																		<input type="file" class="form-control adjArchivos" name="adjArchivos[]" id="adjArchivos[]" multiple="multiple">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="Class-12">
																	<div class="form-group">
																		<label for="redactar"> Redactar: </label>
																		<textarea name="redactar" id="redactar" class="form-control" rows="8" cols="80" required></textarea>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="Class-12">
																	<div class="form-group">
																		<button id="btnEnvCorreo" type="submit" name="" class="btn btn-success btn-block"> Enviar <span class="fas fa-paper-plane"> </span> </button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<div class="modal-footer"> </div>
												</div>
											</div>
										</div>
							    </div>
									<!-- ver empleados -->
							    <div class="card">
							      <div class="card-header">
							        <a class="card-link" data-toggle="collapse" href="#EmpleadosS">
							          <center>
							          	<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" width="100%">
							          </center>
							        </a>
							      </div>
							      <div id="EmpleadosS" class="collapse" data-parent="#accordionMenuS">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($empresamenu as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Finanzas/<?= $row -> Ruta ?>/view-employee">
																<center>
																	<img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="AP-Consultoria-Integral-ERP" width="30px">
																</center>
															</a>
														</li>
													<?php } ?>
												</ul>
							        </div>
							      </div>
							    </div>
									<!-- nomina de empleados -->
									<div class="card">
							      <div class="card-header">
							        <a class="card-link" data-toggle="collapse" href="#ProgramaNominaS">
							          <center>
							          	<img src="<?= base_url()?>images/Icono/ERP_Icon_Nom.webp" alt="AP-Consultoria-Integral-ERP" width="100%">
							          </center>
							        </a>
							      </div>
							      <div id="ProgramaNominaS" class="collapse" data-parent="#accordionMenuS">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<?php foreach ($empresamenu as $row){ ?>
														<li class="list-group-item">
															<a href="<?= base_url()?>Finanzas/<?= $row -> Ruta ?>/import-payroll">
																<center>
																	<img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="AP-Consultoria-Integral-ERP" width="30px">
																</center>
															</a>
														</li>
													<?php } ?>
												</ul>
							        </div>
							      </div>
							    </div>
							  </div>
						  </div>
						</div>
					</div>
