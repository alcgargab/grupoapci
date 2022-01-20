		<br><br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
			  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
			  </div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<form action="<?= base_url()?>CallCenter/iniciar-sesion" onsubmit="return iniciarSesion()" method="post">
						<span id="errorForm"></span>
					  <div class="form-group">
					    <label for="CallUsuario"> Usuario: </label>
					    <input type="text" name="CallUsuario" class="form-control" id="CallUsuario">
					  </div>
					  <div class="form-group">
					    <label for="CallPassword"> Contraseña: </label>
					    <input type="password" name="CallPassword" class="form-control" id="CallPassword">
					  </div>
						<input type="hidden" class="form-control" name="CallUbicacion" id="CallUbicacion" value="">
						<input type="hidden" class="form-control" name="CallHora" id="CallHora" value="">
						<input type="hidden" class="form-control" name="navegador" id="navegador" value="">
					  <button type="submit" id="btnCallForm" class="btn btn-outline-success float-right"> Aceptar </button>
					</form>
			  </div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-12">
				</div>
			</div>
		</div>
