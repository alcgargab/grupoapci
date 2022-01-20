					<script type="text/javascript">
						google.charts.load("current", {
							packages:["corechart"]
						});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Empleados', 'Permisos'],
								<?php
									$total = count($peremp);
									for ($i = 0; $i <= $total -1 ; $i++) {
										foreach ($empleados as $row) {
											if ($row -> idEmp == $peremp[$i] -> idEmp) {
												echo "['".$row -> ApellidoPEmp.' '.$row -> ApellidoMEmp.' '.$row -> NomEmp."', ".$peremp[$i] -> total_de_permisos."],";
											}
										}
									}
								?>
							]);
							var options = {
								// title: 'Permisos po',
								is3D: true,
							};
							var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
							chart.draw(data, options);
						}
					</script>
					<div class="homeClass">
						<div class="container">
							<!-- <div class="row">
								<div class="Class-6">
									<form class="" action="<?= base_url()?>Directivo/apci/view-permissions-by-month" method="post">
										<input type="month" class="form-control" name="mes" value="">
									</div>
									<div class="Class-6">
										<input type="submit" class="btn btn-success btn-block" name="" value="Buscar">
									</div>
								</form>
							</div> -->
							<br>
							<div class="row">
								<div class="Class-12">
									<center>
										<h1> Permisos </h1>
										<!-- <h3> Mes: <small>  </small> </h3> -->
									</center>
								</div>
								<div id="piechart_3d" style="width: 100%; height: 500px;">  </div>
							</div>
						</div>
					</div>
