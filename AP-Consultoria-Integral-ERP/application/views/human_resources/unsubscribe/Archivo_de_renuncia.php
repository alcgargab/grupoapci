					<div class="homeClass">
						<div class="container-fluid">
							<div class="row">
							  <div class="Class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/unsubscribe">
													Lista de empleados
												</a>
											</li>
									    <li class="breadcrumb-item active" aria-current="page">
												Empleado
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<div class="row">
								<div class="Class-12">
									<form class="" onsubmit="return renuncia()" action="<?= base_url()?>Recursoshumanos/<?= $ruta ?>/download-file-give-up-work/<?= $empleado -> NumEmpMd5?>" method="post">
										<div class="row">
											<div class="Class-12">
												<center> <h1> Renuncia </h1> </center>
											</div>
										</div>
										<div class="row">
											<div class="Class-12">
												<center> <span id="errorRenuncia">  </span> </center>
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
													<label for="turno"> Turno: </label>
													<input type="text" class="form-control" name="turno" id="turno" value="<?= $turnoempleado -> Turno ?>" readonly>
												</div>
											</div>
											<div class="Class-4-4-4-12">
												<div class="form-group">
													<label for="FRenuncia"> Fecha de Renuncia: </label>
													<input type="date" class="form-control" name="FRenuncia" id="FRenuncia" required>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="Class-3">  </div>
											<div class="Class-6">
												<button type="submit" class="btn btn-block ap-gral-btn"> Generar </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
