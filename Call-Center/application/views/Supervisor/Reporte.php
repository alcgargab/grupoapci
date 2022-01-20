						<div class="col-lg-9 col-md-9 col-sm-12 col-12">
							<br><br><br><br>
							<br><br><br><br>
							<div class="container">
								<div class="row">
									<div class="col-6 offset-3">
										<a href="#" data-toggle="collapse" data-target="#llamadas" class="btn btn-outline-success btn-block"> <h1> Reporte <br> de llamadas </h1> </a>
										<br><br>
										<div id="llamadas" class="collapse">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#ModalLlamadaAnio">
														<h4> Buscar por <br> año </h4>
													</a>
												  <div class="modal fade" id="ModalLlamadaAnio">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-llamadas-por-anio" method="post">
													        <div class="modal-header bg-success text-white">
													          <h4 class="modal-title"> Buscar por año </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallAnio"> Año: </label>
																			<input type="number" class="form-control" name="CallAnio" id="CallAnio" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#ModalLlamadaMes"> <h4> Buscar por <br> mes </h4> </a>
													<div class="modal fade" id="ModalLlamadaMes">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-llamadas-por-mes" method="post">
													        <div class="modal-header bg-danger text-white">
													          <h4 class="modal-title"> Buscar por mes </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="row">
																			<div class="col-12">
																				<div class="form-group">
			 																		<label for="CallMes"> Mes: </label>
																					<input type="month" class="form-control" name="CallMes" id="CallMes" value="" required>
		 																		</div>
																		  </div>
																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#ModalLlamadaDia"> <h4> Buscar por <br> día </h4> </a>
													<div class="modal fade" id="ModalLlamadaDia">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-llamadas-por-dia" method="post">
													        <div class="modal-header bg-info text-white">
													          <h4 class="modal-title"> Buscar por día </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="row">
																			<div class="col-12">
																				<div class="form-group">
			 																		<label for="CallDia"> Día: </label>
																					<input type="date" class="form-control" name="CallDia" id="CallDia" value="" required>
		 																		</div>
																		  </div>
																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="<?= base_url()?>Supervisor/reportes/buscar-todas-las-llamadas" class="btn btn-outline-dark btn-block"> <h4> Buscar <br> todas </h4> </a>
											  </div>
											</div>
										</div>
									</div>
									<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
										<a href="#" data-toggle="collapse" data-target="#Seguimiento" class="btn btn-outline-danger btn-block"> <h1> Reporte de <br> Seguimientos </h1> </a>
										<br><br>
										<div id="Seguimiento" class="collapse">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#ModalSeguimientoAnio">
														<h4> Buscar por <br> año </h4>
													</a>
													<div class="modal fade" id="ModalSeguimientoAnio">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-seguimientos-por-anio" method="post">
													        <div class="modal-header bg-success text-white">
													          <h4 class="modal-title"> Buscar por año </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallAnio"> Año: </label>
																			<input type="number" class="form-control" name="CallAnio" id="CallAnio" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#ModalSeguimientoMes"> <h4> Buscar por <br> mes </h4> </a>
													<div class="modal fade" id="ModalSeguimientoMes">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-seguimientos-por-mes" method="post">
													        <div class="modal-header bg-danger text-white">
													          <h4 class="modal-title"> Buscar por mes </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallMes"> Mes: </label>
																			<input type="month" class="form-control" name="CallMes" id="CallMes" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#ModalSeguimientoDia"> <h4> Buscar por <br> día </h4> </a>
													<div class="modal fade" id="ModalSeguimientoDia">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/buscar-seguimientos-por-dia" method="post">
													        <div class="modal-header bg-info text-white">
													          <h4 class="modal-title"> Buscar por día </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallDia"> Día: </label>
																			<input type="date" class="form-control" name="CallDia" id="CallDia" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="<?= base_url()?>Supervisor/reportes/buscar-todos-los-seguimientos" class="btn btn-outline-dark btn-block"> <h4> Buscar <br> todas </h4> </a>
											  </div>
											</div>
										</div>
									</div> -->
									<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
										<a href="#" data-toggle="collapse" data-target="#Paquetes" class="btn btn-outline-info btn-block"> <h1> Reporte <br> Paquetes </h1> </a>
										<br><br>
										<div id="Paquetes" class="collapse">
											<div class="row">
											  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#ModalPaqueteAnio"> <h4> Buscar por <br> año </h4> </a>
													<div class="modal fade" id="ModalPaqueteAnio">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/paquetes-buscar-por-anio" method="post">
													        <div class="modal-header bg-success text-white">
													          <h4 class="modal-title"> Buscar por año </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallAnio"> Año: </label>
																			<input type="number" class="form-control" name="CallAnio" id="CallAnio" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#ModalPaqueteMes"> <h4> Buscar por <br> mes </h4> </a>
													<div class="modal fade" id="ModalPaqueteMes">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/paquetes-buscar-por-mes" method="post">
													        <div class="modal-header bg-danger text-white">
													          <h4 class="modal-title"> Buscar por mes </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallMes"> Mes: </label>
																			<input type="month" class="form-control" name="CallMes" id="CallMes" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="#" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#ModalPaqueteDia"> <h4> Buscar por <br> día </h4> </a>
													<div class="modal fade" id="ModalPaqueteDia">
												    <div class="modal-dialog modal-sm modal-dialog-centered">
												      <div class="modal-content">
																<form class="" action="<?= base_url()?>Supervisor/reportes/paquetes-buscar-por-dia" method="post">
													        <div class="modal-header bg-info text-white">
													          <h4 class="modal-title"> Buscar por día </h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
																		<div class="form-group">
	 																		<label for="CallDia"> Día: </label>
																			<input type="date" class="form-control" name="CallDia" id="CallDia" value="" required>
 																		</div>
													        </div>
													        <div class="modal-footer">
													          <button type="submit" class="btn btn-outline-danger"> Buscar </button>
													        </div>
																</form>
												      </div>
												    </div>
												  </div>
											  </div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-12">
													<a href="<?= base_url()?>Supervisor/reportes/paquetes-buscar-todas" class="btn btn-outline-dark btn-block"> <h4> Buscar <br> todas </h4> </a>
											  </div>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
