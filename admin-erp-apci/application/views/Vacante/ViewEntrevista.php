					<div class="col-lg-9 col-md-9 col-sm-6 col-12">
						<div class="container-fluid">
							<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.png" alt="ERP_Icon_Back"> </a>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
									  <label for="Apellidop"> Apellido paterno: </label>
									  <input type="text" class="form-control" name="Apellidop" id="Apellidop" value="<?= $entrevista -> Apellidop ?>" readonly>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
									  <label for="Apellidom"> Apellido materno: </label>
									  <input type="text" class="form-control" name="Apellidom" id="Apellidom" value="<?= $entrevista -> Apellidom ?>" readonly>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
									  <label for="nombre"> Nombre: </label>
									  <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $entrevista -> nombre ?>" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
									  <label for="Telefono"> Teléfono: </label>
									  <input type="tel" class="form-control" name="Telefono" id="Telefono" value="<?= $entrevista -> Telefono ?>" readonly>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
									  <label for="email"> Correo electrónico: </label>
									  <input type="email" class="form-control" name="email" id="email" value="<?= $entrevista -> email ?>" readonly>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="form-group">
										<br><br>
									  <a target="_blank" href="<?= base_url()?>Docs/CV/<?= $ruta?>/CV-<?= $entrevista -> nombre.'-'.$entrevista -> Apellidop.'.pdf' ?>"> Ver CV </a>
									</div>
								</div>
							</div>
						</div>
					</div>
