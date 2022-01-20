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
          <div class="row">
            <div class="col-12">
              <div class="row">
  							<table class="table table-hover">
  						    <thead>
  						      <tr>
  						        <th>
                        <center>
                          Ejecutivo
                        </center>
                      </th>
  						        <th>
                        <center>
                          ID
                        </center>
                      </th>
  										<th>
                        <center>
                          Fecha
                        </center>
                      </th>
  										<th>
                        <center>
                          Hora
                        </center>
                      </th>
  						        <th>
                        <center>
                          Comentarios
                        </center>
                      </th>
                      <th>
                        <center>
                          Fecha del cambio
                        </center>
                      </th>
                      <th>
                        <center>
                          Hora del cambio
                        </center>
                      </th>
  						      </tr>
  						    </thead>
  						    <tbody style="font-size: 11px; text-transform: lowercase;">
  									<?php foreach ($history as $row){
                      // echo "<pre>"; print_r($history); echo "</pre>"; die();
                      ?>
  							      <tr>
  							        <td>
  												<center>
                            <?= $follow -> apaterno." ".$follow -> amaterno." ".$follow -> nombre ?>
                          </center>
  							        </td>
  							        <td>
  												<center>
                            <?= $row -> c_historial?>
                          </center>
  							        </td>
  							        <td>
  												<center>
                            <?= $row -> fecha ?>
                          </center>
  							        </td>
  											<td>
                          <center>
                            <?= $row -> hora ?>
                          </center>
  											</td>
  											<td>
                          <center>
                            <?= $row -> comentario ?>
                          </center>
  											</td>
                        <td>
                          <center>
                            <?= $row -> fechash ?>
                          </center>
  											</td>
                        <td>
                          <center>
                            <?= $row -> horash ?>
                          </center>
  											</td>
  							      </tr>
  									<?php } ?>
  						    </tbody>
  						  </table>
  						</div>
            </div>
          </div>
        </div>
