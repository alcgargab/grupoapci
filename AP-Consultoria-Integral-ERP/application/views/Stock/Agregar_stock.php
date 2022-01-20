					<div class="homeClass">
						<div class="container-fluid">
							<br>
							<div class="row">
							  <div class="Class-12">
									<h1 class="text-center"> Agregar Producto </h1>
							  </div>
							</div>
							<form class="" action="<?= base_url()?>Stock/apci/add-utility" method="post">
								<div class="row">
								  <div class="Class-4">
										<div class="form-group">
										  <label for="Proveedor"> Proveedor </label>
										  <select class="form-control" id="Proveedor" name="Proveedor">
										    <option value="selecciona-el-proveedor"> Selecciona el proveedor </option>
												<?php foreach ($proveedor as $row){ ?>
													<option value="<?= $row -> Id_Proveedor ?>"> <?= $row -> Proveedor?> </option>
												<?php } ?>
										  </select>
										</div>
								  </div>
									<div class="Class-4">
										<div class="form-group">
										  <label for="producto"> Producto: </label>
											<input id="producto" type="text" class="form-control" name="producto" placeholder="Papas sabritas">
										</div>
									</div>
									<!-- <div class="Class-4">
										<div class="form-group">
										  <label for="cfc"> Fecha de caducidad: </label>
											<input id="cfc" type="date" class="form-control" name="cfc">
										</div>
									</div> -->
									<div class="Class-4">
										<div class="form-group">
										  <label for="cantidad"> Cantidad: </label>
											<input id="cantidad" type="number" class="form-control" name="cantidad">
										</div>
									</div>
								</div>
								<div class="row">
								  <div class="Class-6 offset-3">
								  	<input type="submit" class="btn btn-success btn-block btnRuta" name="" value="Aceptar">
								  </div>
								</div>
							</form>
						</div>
					</div>
