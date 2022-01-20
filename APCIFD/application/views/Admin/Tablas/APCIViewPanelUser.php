        <div id="apci_container_tabla" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <?php if (empty($alluser)) { ?>
                <a id="apci_admin_buscador" href="#" class="btn btn-primary">Total : 0 Registros</a>
              <?php }else{ ?>
                <a id="apci_admin_buscador" href="#" class="btn btn-primary">Total : <?php echo count($alluser) ?>  Registros</a>
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
                <form class="" action="<?= base_url()?>APCIUsuario/APCIInsert" method="post">
                  <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="apci_new_usu">Usuario:</label>
                        <input type="text" class="form-control" id="apci_new_usu" name="apci_new_usu" value="" placeholder="Usuario" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="apci_new_pass">Contraseña:</label>
                        <input type="text" class="form-control" id="apci_new_pass" name="apci_new_pass" value="" placeholder="Contraseña" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="apci_new_name">Nombre:</label>
                        <input type="text" class="form-control" id="apci_new_name" name="apci_new_name" value="" placeholder="Nombre" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="apci_new_tusu">Tipo de Usuario:</label>
                        <input type="text" class="form-control" id="apci_new_tusu" name="apci_new_tusu" value="" placeholder="Tipo de Usuario" required>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="selectarea">Área:</label>
                        <select class="form-control" id="selectarea" name="selectarea">
                        <?php foreach ($allarea as $row){ ?>
                          <option value="<?= $row -> apci_id_area ?>"> <?= $row -> apci_area ?></option>
                        <?php } ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
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
          if (empty($alluserlimit)) {
            $totalpag = 0/7;
          }else{
            $totalpag = count($alluserlimit)/7;
            $totalpag = ceil($totalpag);
          }
          if (!$_GET) {
            header('Location:'.base_url().'APCIPanelAdmin/APCIPanelUser?pagina=1');
          }
          $iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
          ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead id="bg_tabla">
                <tr>
                  <th> Id Usuario </th>
                  <th> Usuario </th>
                  <th> Contraseña </th>
                  <th> Nombre </th>
                  <th> Tipo de Usuario </th>
                  <th> Área </th>
                  <th> Ajustes </th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php if (empty($alluser)) { ?>
                  <tr>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                    <td>No existen registros</td>
                  </tr>
                <?php }else{
                  foreach ($alluser as $row) { ?>
                    <tr>
                      <td> <?= $row -> apci_id_user ?> </td>
                      <td> <?= $row -> apci_username ?> </td>
                      <td> <?= $row -> apci_password ?> </td>
                      <td> <?= $row -> apci_name ?> </td>
                      <td> <?= $row -> apci_usertype ?> </td>
                      <td> <?= $row -> apci_id_user_area ?> </td>
                      <td>
                				<?php
                				echo '<button type="submit" id="btn_tablas" class="btn btn-outline-info" name="button">'. anchor(site_url('APCIUsuario/APCIread/'.$row->apci_id_user),'Ver') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-eye"></i>'.' </button>';
                        echo '<button type="submit" id="btn_tablas" class="btn btn-outline-warning" name="button">'. anchor(site_url('APCIUsuario/APCIEdit/'.$row->apci_id_user),'Editar') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-edit"></i>'.' </button>';
                        echo '<button type="submit" id="btn_tablas" class="btn btn-outline-danger" name="button">'. anchor(site_url('APCIUsuario/APCIDelete/'.$row->apci_id_user),'Eliminar', 'onclick="javasciprt: return confirm(\'¿Estas seguro de eliminar este registro ?\')"') .'&nbsp;'.'&nbsp;'.'<i class="fas fa-times"></i>'.' </button>';
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
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelUser?pagina=<?php print_r($_GET['pagina']-1) ?>">Anterior</a></li>
                <?php for ($i=0; $i < $totalpag ; $i++) { ?>
                  <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelUser?pagina=<?php print_r($i+1); ?>"> <?php print_r($i+1); ?> </a> </li>
                <?php } ?>
                <li class="page-item <?php echo $_GET['pagina'] >= $totalpag ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>APCIPanelAdmin/APCIPanelUser?pagina=<?php print_r($_GET['pagina']+1) ?>">Siguiente</a></li>
              </ul>
            </div>
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
