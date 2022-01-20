				<div class="col-lg-10 col-md-10 col-sm-12 col-12">
					<div class="container">
						<br><br><br><br><br><br>
						<center> <h1> Tipificar llamada </h1> </center>
						<br>
						<form action="<?= base_url()?>Ejecutivo/clasificar-llamada" method="post">
							<input type="hidden" class="form-control" name="statusLlamada" value="<?= $statusLlamada ?>">
							<input type="hidden" class="form-control" name="CallUsuario" value="<?= $idSesion ?>">
							<input type="hidden" class="form-control" name="IdNT" value="<?= $IdNT ?>">
							<div class="row">
								<?php if ($statusLlamada == 2){ ?>
									<div class="col-3">
										<div class="form-group">
											<label for="CallFSeguimiento"> Fecha de proxima llamada </label>
											<input type="date" class="form-control" name="CallFSeguimiento" id="CallFSeguimiento" value="" required>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label for="CallHSeguimiento"> Hora de la proxima llamada </label>
											<input type="time" class="form-control" name="CallHSeguimiento" id="CallHSeguimiento" value="" required>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label for="Tipificacion"> Tipificación </label>
											<textarea name="Tipificacion" id="Tipificacion" class="form-control" rows="8" cols="80" required></textarea>
										</div>
									</div>
									<div class="col-3">
										<button type="submit" id="btnCallFormSeguimiento" class="btn btn-outline-success float-right"> Aceptar </button>
									</div>
								<?php } else { ?>
									<div class="col-6 offset-3">
										<div class="form-group">
										  <label for="Tipificacion"> Tipificación </label>
											<textarea name="Tipificacion" id="Tipificacion" class="form-control" rows="8" cols="80" required></textarea>
										</div>
										<br>
										<button type="submit" id="btnCallFormSeguimiento" class="btn btn-outline-success float-right"> Aceptar </button>
								  </div>
								<?php } ?>
							</div>
						</form>
					</div>
			  </div>
