					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="container">
							<script type="text/javascript">
								google.charts.load('current', {'packages':['corechart', 'controls']});
								google.charts.setOnLoadCallback(drawDashboard);
								function drawDashboard() {
									var data = google.visualization.arrayToDataTable([
										['Ejecutivo', 'Total'],
										<?php
											$total = count($contador);
											for ($i=0; $i <= $total -1; $i++) {
												foreach ($registro as $row) {
													if ($row -> idPaquete == $contador[$i] -> CallPaquete) {
														echo "['". $row -> CallPaquete ."',". $contador[$i] -> CallContador. "],";
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
											'legend': 'right'
										}
									});
									dashboard.bind(donutRangeSlider, pieChart);
									dashboard.draw(data);
								}
							</script>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<center> <h1> <?= $titulo ?> </h1> </center>
								</div>
							</div>
							<br><br><br><br>
							<div id="Reportes">
								<div id="Barra-Slide"></div>
								<div id="GraficaReporte"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
