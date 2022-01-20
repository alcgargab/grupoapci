					<div class="col-lg-9 col-md-9 col-sm-12 col-12">
						<div class="container">
							<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
								<div class="row">
									<div class="col-12 float-right">
										<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/Call_Icon_Back.png" alt="Call_Icon_Back"> </a>
									</div>
								</div>
							<script type="text/javascript">
								google.charts.load('current', {'packages':['corechart', 'controls']});
								google.charts.setOnLoadCallback(drawDashboard);
								function drawDashboard() {
									var data = google.visualization.arrayToDataTable([
										['Ejecutivo', 'Total'],
										<?php
											$total = count($groupby);
											for ($i = 0; $i <= $total -1; $i++) {
												foreach ($ejecutivo as $row) {
													if ($row -> IdUsuario == $groupby[$i] -> CallUsuario) {
														echo "['". $row -> CallNombre ."',". $groupby[$i] -> CallContador. "],";
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
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<center> <h1> <?= $titulo ?> </h1> </center>
								</div>
							</div>
							<form class="" action="index.html" method="post">
								<div class="row">
									<div class="col-9">
										<div class="form-group">
										  <label for="StatusLlamada"> Buscar llamadas </label>
										  <select class="form-control" id="StatusLlamada" name="StatusLlamada">
												<?php foreach ($status as $row){ ?>
													<option value="<?= $row -> IdStatus ?>"> <?= $row -> CallStatus ?> </option>
												<?php } ?>
										  </select>
										</div>
								  </div>
									<div class="col-3">
										<br>
									  <input type="submit" class="btn btn-outline-success btn-block" name="" value="Buscar">
									</div>
								</div>
							</form>
							<br><br><br><br>
							<div id="Reportes">
								<div id="Barra-Slide"></div>
								<div id="GraficaReporte"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
