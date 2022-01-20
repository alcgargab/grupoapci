			<div class="">
				<div class="row">
					<div id="erpMenuL" class="menuLClass">
						<div class="row">
						  <div class="Class-12">
								<input id="ruta" type="hidden" name="" value="<?= $ruta?>">
								<div id="accordionMenu">
									<!-- Agregar producto -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" href="<?= base_url()?>Stock/apci/add-stock">
												<p> Agregar producto <img src="<?= base_url()?>images/Icono/ERP_Icon_Add.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
										</div>
									</div>
									<!-- Vender producto -->
									<div class="card">
										<div class="card-header">
											<a class="collapsed card-link" href="<?= base_url()?>Stock/apci/vender-producto">
												<p> Vender producto <img src="<?= base_url()?>images/Icono/ERP_Icon_TS.webp" alt="AP-Consultoria-Integral-ERP" class="float-right" width="15%"> </p>
											</a>
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
														<form class="" onsubmit="return validaremail()" action="<?= base_url()?>Directivo/<?= $ruta ?>/send-files" method="post" enctype="multipart/form-data">
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
																		<button id="btnEnvCorreo" type="submit" name="" class="btn btn-outline-success float-right"> Enviar <span class="fas fa-paper-plane">  </span> </button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<!-- <div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
													</div> -->
												</div>
											</div>
										</div>
							    </div>
							  </div>
						  </div>
						</div>
					</div>
