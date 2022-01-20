			<div class="container">
				<form class="" action="<?= base_url()?>Admin/iniciar-sesion" onsubmit="return iniciarSesion()" method="post">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span id="errorForm"> </span>
							<div class="form-group">
								<label for="Usuario"> <img src="<?= base_url()?>images/Icono/ERP_Icon_User.png" alt="ERP_Icon_User" class="float-left"> Usuario: </label>
								<input type="Usuario" name="Usuario" class="form-control" id="Usuario" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu Usuario" required>
							</div>
							<div class="form-group">
								<label for="Password"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Pass.png" alt="ERP_Icon_Pass" class="float-left"> Password: </label>
								<input type="password" name="Password" class="form-control" id="Password" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu Contraseña" required>
							</div>
							<input type="hidden" name="ERPUbicacion" id="ERPUbicacion" value="">
							<input type="submit" class="btn btn-outline-success float-right" name="btnForm" value="Aceptar">
						</div>
					</div>
				</form>
			</div>
