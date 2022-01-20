        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Status', 'NumStaForm'],
              <?php
              $totaluser = count($statusformatos);
              foreach ($statusformatos as $row) {
                // foreach ($usersesion as $rowuser) {
                  echo "['".$row -> apci_formato_status."',".$row -> NumStaForm."],";
                // }
              }
              ?>
            ]);
            var options = {
              title: 'Formatos por usuarios',
              is3D: true,
              // pieHole: 0.4
              // pieStartAngle: 100
          //     slices: {
          //   0: { color: 'red' },
          //   1: { color: 'blue' }
          // }
            };
            var chart = new google.visualization.PieChart(document.getElementById('APCIFormPendChart'));
            chart.draw(data, options);
          }
        </script>
        <?php if ($totaluser == 0) { ?>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <center> <h1 style="padding: 50px;"> No Existen Registros</h1> </center>
                </div>
              </div>
            </div>
          </div>
        <?php }else{ ?>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div id="APCIFormPendChart"></div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
