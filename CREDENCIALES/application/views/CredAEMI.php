				<div id="CredAPCI">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="container">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<form action="<?= base_url()?>Credencial/CreateTVCred" method="post" enctype="multipart/form-data">
											<input id="CredEMpresa" type="hidden" name="CredEMpresa" value="TeleViales">
											<div class="form-group">
												<label for="CredName">Nombres y Apellidos:</label>
												<input type="text" class="form-control" id="CredName" placeholder="Nombre del Colaborador" name="CredName" required>
											</div>
											<div class="form-group">
												<label for="CredPuesto">Puesto:</label>
												<input type="text" class="form-control" id="CredPuesto" placeholder="Puesto del Colaborador" name="CredPuesto" required>
											</div>
											<div class="form-group">
												<label for="CredNSS">NSS:</label>
												<input type="text" class="form-control" id="CredNSS" placeholder="NSS del Colaborador" name="CredNSS" required>
											</div>
											<div class="form-group">
												<label for="CredCurp">CURP:</label>
												<input type="text" class="form-control" id="CredCurp" placeholder="NSS del Colaborador" name="CredCurp" required>
											</div>
											<div class="form-group">
												<label for="CredFoto">Foto:</label>
												<input type="file" class="form-control-file border" id="CredFoto" name="CredFoto" required>
											</div>
											<center> <button id="Cred_Form_btn" type="submit" class="btn">Crear Credencial</button> </center>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
