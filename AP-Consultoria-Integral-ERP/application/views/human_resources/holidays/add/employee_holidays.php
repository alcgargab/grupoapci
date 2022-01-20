					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
							  <div class="ap-class-12">
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb ap-bread">
									    <li class="breadcrumb-item">
												<a href="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/view-the-holidays">
													Vacaciones
												</a>
											</li>
									    <li class="breadcrumb-item active" aria-current="page">
												Agregar
											</li>
									  </ol>
									</nav>
							  </div>
							</div>
							<div class="row">
								<div class="ap-class-6">
									<button type="button" class="btn ap-gral-btn">
										Vacaciones <span class="badge badge-light"> <?php if ($total_tbl_v != "") {
											print_r(count($total_tbl_v));
										}else {
											print_r('0');
										}?> </span>
									</button>
								</div>
								<div class="ap-class-3">
									<input id="ap-user" type="hidden" class="form-control" name="" value="<?= $this -> session -> user ?>">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="ap-class-12">
									<div id='CalendarVacaciones'></div>
									<div class="modal fade" id="ModalAgregardia">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header ap-gral-modal-header">
													<h4 class="modal-title" id="tituloEvento"> Día de vacaciones </h4>
													<button type="button" class="close" data-dismiss="modal">
														<i class='fas fa-times ap-gral-fa-times'></i>
													</button>
												</div>
												<form class="" action="<?= base_url()?>Recursoshumanos/<?= $tbl_em -> ruta_em ?>/add-holidays/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
													<div class="modal-body">
														<div class="" id="descripcionEvento"> </div>
														<div class="row">
														  <div class="ap-class-12">
																<div class="form-group">
																	<label for="empleado"> Empleado: </label>
																	<input type="text" class="form-control" name="empleado" id="empleado" value="<?= $tbl_e -> apellido_paterno_e." ".$tbl_e -> apellido_materno_e." ".$tbl_e -> nombre_e?>" readonly>
																</div>
														  </div>
														</div>
														<div class="row">
														  <div class="ap-class-6">
																<div class="form-group">
																	<label for="start1"> Día de vacación: </label>
																	<input type="date" class="form-control" name="start" id="start" value="" readonly>
																</div>
														  </div>
															<div class="ap-class-6">
																<div class="form-group">
																	<label for="end"> Fin de la vacación: </label>
																	<input type="date" class="form-control" name="end" id="end" value="" readonly>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="ap-class-6 offset-3">
																<input type="submit" class="btn btn-block ap-gral-btn btnRuta" value="Agregar">
															</div>
														</div>
													</div>
												</form>
												<div class="modal-footer ap-gral-modal-footer">
													<!-- <button type="button" class="btn btn-outline-info" data-dismiss="modal"> Editar </button> -->
													<!-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Eliminar </button> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						// --------------- FULLCALENDAR --------------- //
						document.addEventListener('DOMContentLoaded', function() {
							var calendarEl = document.getElementById('CalendarVacaciones');
							var calendar = new FullCalendar.Calendar(calendarEl, {
								plugins: ['dayGrid', 'interaction', 'list', 'timeGrid', 'bootstrap'],
								locale: 'es',
								timeZone: 'UTC',
								themeSystem: 'bootstrap',
								selectable: true,
								header: {
									left: 'prev,next, today',
									center: 'title',
									// right: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek, miBoton',
									right: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek',
								},
								dateClick: function(date, view) {
									var user = $("#ap-user").val();
									if (user != 'EMapci') {
										$('#tituloEvento').html('Día de vacaciones');
										$('#start').val(date.dateStr);
										$('#end').val(date.dateStr);
										$('#ModalAgregardia').modal();
									}
								},
								events: <?= $tbl_v; ?>,
							});
							calendar.render();
						});
					</script>
