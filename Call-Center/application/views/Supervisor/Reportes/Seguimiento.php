					<div class="col-lg-9 col-md-9 col-sm-12 col-12">
						<div class="container">
							<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
								<div class="row">
									<div class="col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/Call_Icon_Back.png" alt="Call_Icon_Back"> </a>
									</div>
								</div>
							<?php if ($groupby != ""){ ?>
								<script type="text/javascript">
									google.charts.load('current', {'packages':['corechart', 'controls']});
									google.charts.setOnLoadCallback(drawDashboard);
									function drawDashboard() {
										var data = google.visualization.arrayToDataTable([
											['Ejecutivo', 'Total'],
											<?php
												$total = count($groupby);
												for ($i = 0; $i <= $total -1 ; $i++) {
													foreach ($ejecutivo as $row) {
														if ($row -> IdUsuario == $groupby[$i] -> CallUsuario) {
															echo "['". $row -> CallNombre ."', ".$groupby[$i] -> NumSeguimiento."],";
														}
													}
												}
											?>
										]);
										var dashboard = new google.visualization.Dashboard(
												document.getElementById('Reportes'));
										var donutRangeSlider = new google.visualization.ControlWrapper({
											'controlType': 'NumberRangeFilter',
											'containerId': 'Barra-Slide',
											'options': {
												'filterColumnLabel': 'Total'
											}
										});
										var pieChart = new google.visualization.ChartWrapper({
											'chartType': 'PieChart',
											'containerId': 'GraficaReporte',
											'options': {
												'width': 1200,
												'height': 900,
												'pieSliceText': 'value',
												'legend': 'right',
												'is3D': true
											}
										});
										dashboard.bind(donutRangeSlider, pieChart);
										dashboard.draw(data);
									}
								</script>
								<div class="row">
								  <div class="col-12">
										<center> <h1> <?= $titulo ?> </h1> </center>
								  </div>
								</div>
								<br><br>
								<div id="Reportes">
									<div id="Barra-Slide"></div>
									<div id="GraficaReporte"></div>
								</div>
							<?php } else { ?>
								<br><br>
								<div class="row">
								  <div class="col-12">
										<center> <h1> <?= $mensaje ?> </h1> <br> <img src="<?= base_url()?>images/Icono/Call_Icon_B.png" alt="Call_Icon_B"> </center>
								  </div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
