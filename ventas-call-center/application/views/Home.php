		<br><br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-6 offset-3 align-self-center">
					<form action="<?= base_url()?>Ventas/iniciar-sesion" onsubmit="return iniciarSesion()" method="post">
						<span id="errorForm"></span>
					  <div class="form-group">
					    <label for="CallUsuario"> Usuario: </label>
					    <input type="text" name="CallUsuario" class="form-control" id="CallUsuario">
					  </div>
					  <div class="form-group">
					    <label for="CallPassword"> Contraseña: </label>
					    <input type="password" name="CallPassword" class="form-control" id="CallPassword">
					  </div>
						<input type="hidden" name="CallUbicacion" id="CallUbicacion" value="">
						<input type="hidden" name="CallHora" id="CallHora" value="">
					  <button type="submit" id="btnCallForm" class="btn btn-outline-success float-right"> Aceptar </button>
					</form>
			  </div>
			</div>
		</div>
