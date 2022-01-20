<?php
		$total = array();
		$vistas = array();
		foreach ($totaltbl_servicio as $row) {
			$total[] = $row -> Solicitud;
		}
		$totalSolicitud = array_sum ($total);
		// echo $totalSolicitud;
		echo "<pre>"; print_r($total); echo "</pre>"; echo "<br>"; print_r($totaltbl_servicio); die();
		?>
		<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Servicio', 'Solicitudes'],
					<?php
						foreach ($totaltbl_servicio as $row) {
							echo "['".$row -> servicio."',".$row -> Solicitud."],";
						}
					?>
        ]);
        var options = {
          title: 'Servicios más Solicitados',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('TeleViaReportServMasSolicitados'));
        chart.draw(data, options);
      }
    </script>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1> El total de Vistas es <?= $totalSolicitud ?> </h1>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="TeleViaReportServMasSolicitados" style="width: 1200px; height: 1000px;"></div>
					</div>
				</div>
			</div>
		</div>
