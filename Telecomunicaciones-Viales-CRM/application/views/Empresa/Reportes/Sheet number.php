        <!-- home de empresas -->
        <div class="col-12">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <center>
                  <?= $tittle ?>
                </center>
              </div>
            </div>
            <?php if ($sheetNumber != ""){ ?>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Status', 'Registros'],
                    <?php foreach ($sheetNumber as $row) {
                      if ($row -> status == "SI") {
                        echo "['Contratos con folio', ".$row -> total."],";
                      }
                      else {
                        echo "['Contratos sin folio', ".$row -> total."],";
                      }
                    }?>
                  ]);
                  var options = {
                    title: '',
                    is3D: true,
                  };
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
              </script>
              <div class="row">
                <div class="col-12">
                  <center>
                    <div id="piechart" style="width: 100%; height: 530px;"></div>
                  </center>
                </div>
              </div>
            <?php } else { ?>
              <br><br><br>
              <div class="row">
                <div class="col-12">
                  <center>
                    <?= $msn ?>
                  </center>
                </div>
              </div>
            <?php }?>
          </div>
        </div>
