		<br><br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
				<form class="" action="<?= base_url()?>Seguimiento/Servicio" method="post">
					<input type="hidden" name="Codigo" value="<?= $Codigo?>">
					<div class="form-group">
  					<label for="Usuario">Usuario:</label>
						<input type="text" class="form-control" name="Usuario" id="Usuario" required>
  					<!-- <input type="text" class="form-control" name="" id="" value="rZ4)dKFszf"> -->
					</div>
					<div class="form-group">
  					<label for="Password">Contraseña:</label>
  					<input type="password" class="form-control" name="Password" id="Password" required>
						<!-- <input type="text" class="form-control" name="" id="" value="e=RIy8ERZ$">						 -->
					</div>
					<input type="submit" class="btn btn-outline-success" name="btnSeguimiento" value="Aceptar">
				</form>
			</div>
		</div>
