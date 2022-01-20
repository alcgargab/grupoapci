		<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Servicio', 'Solicitudes'],
					<?php
						foreach ($totaltbl_subser as $row) {
							echo "['".$row -> subser."',".$row -> Solicitud."],";
						}
					?>
        ]);
        var options = {
          title: 'Productos MENOS Solicitados',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('TeleViaReportProvMenosSolicitados'));
        chart.draw(data, options);
      }
    </script>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="TeleViaReportProvMenosSolicitados" style="width: 1200px; height: 1200px;"></div>
					</div>
				</div>
			</div>
		</div>
