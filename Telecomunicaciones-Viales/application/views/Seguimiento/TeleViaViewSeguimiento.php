		<br><br><br><br><br><br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h1> Status de tu servicio</h1>
						</div>
					</div>
					<br><br><br>
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
							<div class="form-group">
						    <label for="Codigo"> Código</label>
						    <input type="text" class="form-control text-center" id="Codigo" value="<?= $usuario -> Codigo ?>" disabled>
						  </div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
							<div class="row">
								<?php if ($seguimiento -> StatusServicio == 1){ ?>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Emp_D.png" alt="Televia_Icon_S_Emp_D">
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Pro_D.png" alt="Televia_Icon_S_Pro_D">
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Ent_A.png" alt="Televia_Icon_S_Ent_A">
									</div>
								<?php }else {
									if ($seguimiento -> StatusProceso <= 20) { ?>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Emp_A.png" alt="Televia_Icon_S_Emp_A">
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Pro_D.png" alt="Televia_Icon_S_Pro_D">
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Ent_D.png" alt="Televia_Icon_S_Ent_D">
										</div>
									<?php }else { ?>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Emp_D.png" alt="Televia_Icon_S_Emp_D">
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Pro_A.png" alt="Televia_Icon_S_Pro_A">
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<img src="<?= base_url()?>images/Iconos/Seguimiento/Televia_Icon_S_Ent_D.png" alt="Televia_Icon_S_Ent_D">
										</div>
									<?php }
								} ?>
							</div>
							<!-- <div class="form-group">
								<label for="StatusPedido"> Status del pedido </label>
								<span> <?= $seguimiento -> StatusProceso ?>% </span>
								<div class="progress">
    							<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?= $seguimiento -> StatusProceso ?>%"></div>
  							</div>
							</div> -->
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="Usuario"> Usuario</label>
								<input type="text" class="form-control text-center" id="Usuario" value="<?= $usuario -> Usuario ?>" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h4>Datos del servicio</h4>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="form-group">
								<label for="Servicio"> Servicio</label>
								<input type="text" class="form-control text-center" id="Servicio" value="<?= $servicio -> subser ?>" disabled>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="form-group">
								<label for="Precio"> Precio</label>
								<input type="text" class="form-control text-center" id="Precio" value=" $<?= $servicio -> precio ?>" disabled>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="form-group">
								<label for="Fecha"> Fecha de Entrega </label>
								<input type="text" class="form-control text-center" id="Fecha" value="<?= $seguimiento -> FTermino ?>" disabled>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
