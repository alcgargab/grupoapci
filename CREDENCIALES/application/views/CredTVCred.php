<div id="CredAPCI">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<!-- <form action="<?= base_url()?>Credencial/CreateTVCred" method="post" enctype="multipart/form-data"> -->
						<input id="CredEMpresa" type="hidden" name="CredEMpresa" value="APCI">
						<div class="form-group">
							<label for="CredName">Nombre:</label>
							<input type="text" class="form-control" id="CredName" name="CredName" value="<?= $CredName ?>" disabled>
						</div>
						<!-- <div class="form-group">
							<label for="CredApellidos">Apellidos:</label>
							<input type="text" class="form-control" id="CredApellidos" name="CredApellidos" value="<?= $CredApellidos ?>" disabled>
						</div> -->
						<div class="form-group">
							<label for="CredPuesto">Puesto:</label>
							<input type="text" class="form-control" id="CredPuesto" placeholder="Puesto del Colaborador" name="CredPuesto" value="<?= $CredPuesto ?>" disabled>
						</div>
						<div class="form-group">
							<label for="CredNSS">NSS:</label>
							<input type="text" class="form-control" id="CredNSS" placeholder="NSS del Colaborador" name="CredNSS" value="<?= $CredNSS ?>" disabled>
						</div>
						<div class="form-group">
							<label for="CredCurp">CURP:</label>
							<input type="text" class="form-control" id="CredCurp" placeholder="NSS del Colaborador" name="CredCurp" value="<?= $CredCurp ?>" disabled>
						</div>
						<!-- <div class="form-group">
							<label for="CredFoto">Foto:</label>
							<input type="file" class="form-control-file border" id="CredFoto" name="CredFoto" value="" disabled>
						</div> -->
						<!-- <center> <button id="Cred_Form_btn" type="submit" class="btn">Crear Credencial</button> </center> -->
					<!-- </form> -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<form action="<?= base_url()?>Credencial/DownloadTVCred" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div id="PantillaCred_1">
									<div class="">
										<img id="Cred_img_Logo" src="<?= base_url()?>images/Logos/TV.png" alt="TV">
										<span id="Cred_name"> <?= $CredName ?> <?= $CredApellidos ?></span>
										<input type="hidden" name="Cred_name" value="<?= $CredName?>">
										<input type="hidden" name="Cred_Apellidos" value="<?= $CredApellidos?>">
										<img id="Cred_img_Foto" src="<?= base_url().$CredFoto?>" alt="Colaborador.png">
										<input type="hidden" name="Cred_img_Foto" value="<?=base_url().$CredFoto?>">
										<span id="Cred_Puesto"> <?= $CredPuesto ?> </span>
										<input type="hidden" name="Cred_Puesto" value="<?= $CredPuesto?>">
										<img id="Cred_img_Logo_Emp" src="<?= base_url()?>images/Logos/Logo_APCI.png" alt="TV">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div id="PantillaCred_2">
									<span id="Cred_NSS" >NSS: <?= $CredNSS?></span>
									<input type="hidden" name="Cred_NSS" value="<?= $CredNSS?>">
									<br>
									<span id="Cred_CURP">CURP: <?= $CredCurp?></span>
									<input type="hidden" name="Cred_CURP" value="<?= $CredCurp?>">
									<br>
									<span> Esta credencial es personal e intransferible, el mal uso de esta identificación será responsabilidad del portador de la misma y/o de la persona o área solicitante. </span>
									<br>
									<span>En Caso de emergencia o extravió favor de llamar al teléfono: <span> 5160-9276 </span> </span>
								</div>
							</div>
							<center> <button type="submit" id="Cred_Form_btn" class="btn">Descargar Credencial</button> </center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
