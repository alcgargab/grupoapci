		<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Servicio', 'Ventas'],
					<?php
						foreach ($totaltbl_subser as $row) {
							echo "['".$row -> subser."',".$row -> Ventas."],";
						}
					?>
        ]);
        var options = {
          title: 'Productos MÁS Vendidos',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('TeleViaReportProvMasVendidos'));
        chart.draw(data, options);
      }
    </script>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="TeleViaReportProvMasVendidos" style="width: 1200px; height: 1000px;"></div>
					</div>
				</div>
			</div>
		</div>
