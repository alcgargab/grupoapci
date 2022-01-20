		<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Solicitudes'],
					<?php
						foreach ($totaltbl_subser as $row) {
							echo "['".$row -> subser."',".$row -> Vistas."],";
						}
					?>
        ]);
        var options = {
          title: 'Productos MENOS vistos',
					is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('TeleViaReportProdMenosVistos'));
        chart.draw(data, options);
      }
    </script>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="container">
				<div class="row">
					<div id="TeleViaReportProdMenosVistos" style="width: 1200px; height: 1200px;"></div>
				</div>
			</div>
		</div>
	</div>
