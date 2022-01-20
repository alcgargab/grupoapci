					<div class="homeClass">
						<div class="container-fluid">
							<div class="row">
								<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']);?>
								<div class="Class-12 float-right">
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/ERP_Icon_Back.webp" alt="AP-Consultoria-Integral-ERP"> </a>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="Class-12">
									<form class="" onsubmit="return finiquito()" action="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/download-settlement-file/<?= $empleado -> NumEmpMd5?>" method="post">
										<div class="row">
											<div class="Class-12">
												<center> <span id="errorFiniquito">  </span> </center>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<center> <h1> Finiquito </h1> </center>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<div class="form-group">
													<label for="empresa"> Empresa: </label>
													<input type="text" class="form-control" name="empresa" id="empresa" value="<?= $empresa -> Empresa ?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<div class="form-group">
													<label for="NumEmp"> N° de empleado: </label>
													<input type="text" class="form-control" name="NumEmp" id="NumEmp" value="<?= $empleado -> NumEmp ?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<div class="form-group">
													<label for="nombre"> Nombre: </label>
													<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $empleado -> ApellidoPEmp." ".$empleado -> ApellidoMEmp." ".$empleado -> NomEmp?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="Puesto"> Puesto: </label>
													<input type="text" class="form-control" name="Puesto" id="Puesto" value="<?= $puesto -> Puesto ?>" readonly>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="area"> Departamento: </label>
													<input type="text" class="form-control" name="area" id="area" value="<?= $area -> area ?>" readonly>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="Fingreso"> Fecha de ingreso: </label>
													<input type="text" class="form-control" name="Fingreso" id="Fingreso" value="<?= $empleado -> FIngresoEmp ?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="antiguedad"> Antigüedad: </label>
													<input type="date" class="form-control" name="antiguedad" id="antiguedad" required>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="turno"> Turno: </label>
													<input type="text" class="form-control" name="turno" id="turno" value="<?= $turnoempleado -> Turno ?>" readonly>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="FRenuncia"> Fecha de renuncia: </label>
													<input type="date" class="form-control" name="FRenuncia" id="FRenuncia" required>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="Class-6-6-6-12">
												<div class="form-group">
													<label for="FBajaIMSS"> Fecha de baja IMSS: </label>
													<input type="date" class="form-control" name="FBajaIMSS" id="FBajaIMSS" required>
												</div>
											</div>
											<div class="Class-6-6-6-12">
												<div class="form-group">
													<label for="FDescanso"> Día de descanso: </label>
													<input type="text" class="form-control" name="FDescanso" id="FDescanso" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<div class="form-group">
													<label> Documentos enviados: </label>
													<br><br>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="archivoBajaIMSS" name="archivoBajaIMSS">
														<label class="custom-control-label" for="archivoBajaIMSS"> Baja de IMSS </label>
													</div>
													<div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox" class="custom-control-input" id="archivoRenuncia" name="archivoRenuncia">
														<label class="custom-control-label" for="archivoRenuncia"> Renuncia </label>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="Class-12">
												<center>
													<div class="form-group">
														<label for="Prestaciones">
															Prestaciones:
															<a href="#" data-toggle="tooltip" data-placement="right" title="Separa las prestaciones por una coma (,) ejemplo: prestación1, prestación2, etc.">
																<img src="<?= base_url()?>images/Icono/ERP_Icon_Q.webp" alt="AP-Consultoria-Integral-ERP">
															</a>
														</label>
														<textarea class="form-control" name="Prestaciones" id="Prestaciones" rows="8" cols="80" required></textarea>
													</div>
												</center>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="Class-12">
												<button type="submit" class="btn btn-outline-success float-right"> Aceptar </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
