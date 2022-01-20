					<div class="ap-home-class">
						<div class="container-fluid">
							<br>
							<div class="row">
							  <div class="ap-class-12">
									<form class="" action="<?= base_url()?>Directivo/<?= $tbl_em -> ruta_em ?>/generate-task/<?= $tbl_e -> encrypt_numero_empleado_e ?>" method="post">
										<div class="row">
											<div class="ap-class-12">
												<div class="row">
													<div class="ap-class-12">
														<input id="total_task_executive" type="hidden" class="form-control" name="total_task" value="0">
													</div>
												</div>
												<div class="row">
													<div class="ap-class-6 offset-3">
														<div class="form-group">
															<label for="task"> Número de tareas: </label>
															<input type="text" class="form-control" name="" id="task-executive" pattern="[0-9]" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="ap-class-12">
														<ul id="list-task-executive" class="list-group">
														</ul>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="ap-class-6 offset-3">
												<input type="submit" class="btn btn-block btnRuta ap-gral-btn" value="Generar">
											</div>
										</div>
									</form>
							  </div>
							</div>
						</div>
					</div>
