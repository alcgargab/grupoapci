        <!-- Seguimientos -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Historial de llamadas </h2>
              </center>
            </div>
          </div>
          <br><br>
          <?php if ($historial != ""){ ?>
            <ul class="list-group list-group-flush">
              <?php foreach ($historial as $row){ ?>
                <li class="list-group-item"> <a href="<?= base_url()?>crm/view-history/<?= $row -> seguimiento ?>"> ID: <?= $row -> seguimiento ?> </a> </li>
              <?php } ?>
            </ul>
          <?php } else { ?>
            <div class="row">
              <div class="col-12">
                <center> <h1> No cuentas con Historial de llamadas </h1> </center>
              </div>
            </div>
          <?php } ?>
        </div>
