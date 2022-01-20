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
            <div class="row">
              <div class="col-12">
                <form class="" action="<?= base_url()?>crm/reports/sales" onsubmit="return validate_reports_sales()" method="post">
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="day"> Día </label>
                        <input type="date" class="form-control" name="day" id="day">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="month"> Mes </label>
                        <input type="month" class="form-control" name="month" id="month">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="year"> Año </label>
                        <input type="number" class="form-control" name="year" id="year">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="ejecutivo"> Ejecutivo </label>
                        <select class="form-control" id="ejecutivo" name="ejecutivo">
                          <option value="selecciona-un-ejecutivo"> Selecciona un ejecutivo </option>
                          <?php foreach ($licencias as $row){ ?>
                            <option value="<?= $row -> id_u ?>"> <?= $row -> apaterno." ".$row -> amaterno." ".$row -> nombre ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-8 offset-2">
                      <span id="errorReport"></span>
                    </div>
                    <div class="col-6 offset-3">
                      <input type="submit" class="btn btn-success btn-block" name="" value="Generar reporte">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <?php if ($ventas != ""){ ?>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Nombre', 'Ventas'],
                    <?php foreach ($ventas as $row) {
                      echo "['". $row -> apaterno ." ". $row -> amaterno ." ". $row -> nombre ."', ".$row -> total."],";
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
