					<script type="text/javascript">
						google.charts.load("current", {
							packages:["corechart"]
						});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Empleados', 'Permisos'],
								<?php
									foreach ($tbl_pu as $row) {
										echo "['".$row -> apellido_paterno_e.' '.$row -> apellido_materno_e.' '.$row -> nombre_e."', ".$row -> total_de_permisos."],";
									}
								?>
							]);
							var options = {
								is3D: true,
							};
							var chart = new google.visualization.PieChart(document.getElementById('ap-piechart-3d'));
							chart.draw(data, options);
						}
					</script>
					<div class="ap-home-class">
						<div class="container">
							<div class="row">
								<div class="ap-class-12">
									<center>
										<h1> Permisos Urgentes </h1>
									</center>
								</div>
								<div id="ap-piechart-3d" style="width: 100%; height: 500px;">  </div>
							</div>
						</div>
					</div>
