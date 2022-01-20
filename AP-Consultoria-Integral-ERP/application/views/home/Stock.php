					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<center>
									<h3> Con el <b> ERP </b> en la Nube de <b> APCI </b> usted puede: </h3>
								</center>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-9">
								<br><br>
								<div class="row">
								  <div class="col-3">
										<div class="card" style="border: none; -webkit-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); -moz-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); box-shadow: 0px 0px 12px 0px rgba(12,29,61,1);">
											<br>
										  <center>
										  	<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_RedP.webp" alt="AP-Consultoria-Integral-ERP" style="width:30%">
										  </center>
										  <div class="card-body">
										    <p class="card-text">
										    	<b> Reducir los procesos manuales y basados en hojas de cálculo hasta en un 70%, </b> utilizando
													un sistema de back office que incluye finanzas, cumplimiento, inventario y ventas.
										    </p>
										  </div>
										</div>
								  </div>
									<div class="col-3">
										<div class="card" style="border: none; -webkit-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); -moz-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); box-shadow: 0px 0px 12px 0px rgba(12,29,61,1);">
										  <center>
										  	<br>
												<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_FluC.webp" alt="AP-Consultoria-Integral-ERP" style="width:30%">
										  </center>
										  <div class="card-body">
										    <p class="card-text">
										    	<b> Obtener visibilidad diaria del flujo de caja, </b> utilizando dashboards, scorecards y KPIs en tiempo real.
										    </p>
										  </div>
										</div>
								  </div>
									<div class="col-3">
										<div class="card" style="border: none; -webkit-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); -moz-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); box-shadow: 0px 0px 12px 0px rgba(12,29,61,1);">
										  <center>
										  	<br>
												<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_Ah.webp" alt="AP-Consultoria-Integral-ERP" style="width:30%">
										  </center>
										  <div class="card-body">
										    <p class="card-text">
										    	<b> Ahorre hasta un 93% en los costos de TI </b> asociados con el mantenimiento, la integración
													y la actualización de aplicaciones independientes.
										    </p>
										  </div>
										</div>
								  </div>
									<div class="col-3">
										<div class="card" style="border: none; -webkit-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); -moz-box-shadow: 0px 0px 12px 0px rgba(12,29,61,1); box-shadow: 0px 0px 12px 0px rgba(12,29,61,1);">
										  <center>
										  	<br>
												<img class="card-img-top" src="<?= base_url()?>images/Icono/ERP_Icon_Time.webp" alt="AP-Consultoria-Integral-ERP" style="width:30%">
										  </center>
										  <div class="card-body">
										    <p class="card-text">
										    	<b> Visibilidad en tiempo real de todo el negocio, </b> con acceso 24/7.
										    </p>
										  </div>
										</div>
								  </div>
								</div>
							</div>
							<div class="col-lg-3">
								<br><br><br>
								<form class="" action="<?= base_url()?>Erpapci/iniciar-sesion" onsubmit="return iniciarSesion()" method="post">
									<div class="row">
										<div class="col-12">
											<span id="errorForm"> </span>
											<div class="form-group">
												<label for="Usuario"> <img src="<?= base_url()?>images/Icono/ERP_Icon_User.webp" alt="AP-Consultoria-Integral-ERP" class="float-left"> Usuario: </label>
												<input type="Usuario" name="Usuario" class="form-control" id="Usuario" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu Usuario" required>
											</div>
											<div class="form-group">
												<label for="Password"> <img src="<?= base_url()?>images/Icono/ERP_Icon_Pass.webp" alt="AP-Consultoria-Integral-ERP" class="float-left"> Password: </label>
												<input type="password" name="Password" class="form-control" id="Password" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu Contraseña" required>
											</div>
											<input type="hidden" name="ERPUbicacion" id="ERPUbicacion" value="">
											<input type="hidden" class="form-control" name="navegador" id="navegador" value="">
										</div>
									</div>
									<div class="row">
										<div class="Class-6 offset-3">
											<input type="submit" class="btn btn-success btn-block" name="btnForm" value="Aceptar">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
