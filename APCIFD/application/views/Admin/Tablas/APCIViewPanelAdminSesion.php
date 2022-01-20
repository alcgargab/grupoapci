        <div id="apci_container_tabla" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <?php if (empty($allsesion)) { ?>
                <a id="apci_admin_buscador" href="#" class="btn btn-primary">Total : 0 Registros</a>
              <?php }else{ ?>
                <a id="apci_admin_buscador" href="#" class="btn btn-primary"> Total : <?php echo count($allsesion); ?>  Registros</a>
              <?php } ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
              <div class="input-group">
                <input id="apci_admin_buscador" class="form-control" id="btnBuscar" type="text" name="" placeholder="Buscar...">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
              <div class="input-group">
                <button type="submit" class="btn btn-outline-primary" data-toggle="collapse" data-target="#demo" name="button"> Crear </button>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="demo" class="collapse">
                <form class="" action="<?= base_url()?>APCISesion/APCIInsert" method="post">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="form-group">
                        <label for="selectuser">Usuario:</label>
                        <select class="form-control" id="selectuser" name="selectuser" required>
                          <?php foreach ($alluser as $row) { ?>
                            <option value="<?= $row -> apci_id_user?>"> <?= $row -> apci_name ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="form-group">
                        <label for="apci_new_sesion">Dirección IP:</label>
                        <input type="text" class="form-control" id="apci_new_sesion" name="apci_new_sesion" value="" placeholder="Dirección Ip" required>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <button type="submit" class="btn btn-outline-primary" name="button"> Insertar </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br><br>
          <?php
          $totalrows = 7;
          if (empty($allsesion)) {
            $totalpag = 0/7;
          }else{
            $totalpag = count($allsesion)/7;
            $totalpag = ceil($totalpag);
          }
          if (!$_GET) {
            header('Location:'.base_url().'APCIPanelAdmin/APCIPanelSesion?pagina=1');
          }
          $iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
          ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead id="bg_tabla">
                <tr>
                  <th> Id Sesion </th>
                  <th> Usuario </th>
                  <th> IP </th>
                  <th> Fecha </th>
                  <th> Ajustes </th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php if (empty($allsesion)) { ?>
                  <tr>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                  </tr>
                <?php }else{
                  foreach ($allsesionlimit as $row) { ?>
                      <tr>
                        <td> <?= $row -> apci_id_sesion ?> </td>
                        <td> <?= $row -> apci_id_sesion_user ?> </td>
                        <td> <?= $row -> apci_user_sesion_ip ?> </td>
                        <td> <?= $row -> apci_sesion_date ?> </td>
                        <td>
                  				<?php
                  				echo '<button type="submit" id="btn_tablas" class="btn btn-outline-info" name="button">'. anchor(site_url('APCISesion/APCIread/'.$row -> apci_id_sesion),'Ver') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-eye"></i>'.' </button>';
                          echo '<button type="submit" id="btn_tablas" class="btn btn-outline-warning" name="button">'. anchor(site_url('APCISesion/APCIEdit/'.$row -> apci_id_sesion),'Editar') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-edit"></i>'.' </button>';
                          echo '<button type="submit" id="btn_tablas" class="btn btn-outline-danger" name="button">'. anchor(site_url('APCISesion/APCIDelete/'.$row -> apci_id_sesion),'Eliminar', 'onclick="javasciprt: return confirm(\'¿Estas seguro de eliminar este registro ?\')"') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-times"></i>'.' </button>';
                  				?>
                  			</td>
                      </tr>
                  <?php }
                 }?>
              </tbody>
            </table>
          </div>
          <br><br>
          <div class="container">
            <div class="row">
              <ul class="pagination justify-content-end">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelSesion?pagina=<?php print_r($_GET['pagina']-1) ?>">Anterior</a></li>
                <?php for ($i=0; $i < $totalpag ; $i++) { ?>
                  <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelSesion?pagina=<?php print_r($i+1); ?>"> <?php print_r($i+1); ?> </a> </li>
                <?php } ?>
                <li class="page-item <?php echo $_GET['pagina'] >= $totalpag ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelSesion?pagina=<?php print_r($_GET['pagina']+1) ?>">Siguiente</a></li>
              </ul>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function(){
            $("#btnBuscar").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
        </script>
