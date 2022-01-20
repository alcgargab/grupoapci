        <!-- seguimiento -->
        <div class="col-12">
          <br><br>
          <?php if ($follow != ""){ ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <center>
                      <h1 class="card-title"> <?= $follow -> empresa ?> </h1>
                    </center>
                    <hr>
                    <form class="" action="<?= base_url()?>crm/edit-my-follow/<?= $follow -> c_sencrypt ?>" method="post">
                      <div class="row">
                        <div class="col-6">
                          <h2> <p class="card-text"> <span class="fas fa-user-circle"> </span> <b> Contacto: </b> <?= $follow -> contacto ?> </p> </h2>
                        </div>
                        <div class="col-6">
                          <h2> <p class="card-text"> <span class="fas fa-phone"> </span> <b> Teléfono: </b> <?= $follow -> telefono ?> </p> </h2>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="followfecha"> Fecha: </label>
                            <input type="date" class="form-control" id="followfecha" name="followfecha" value="<?= $follow -> fecha ?>" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="followtime"> Hora de la llamada: </label>
                            <input type="time" class="form-control" id="followtime" name="followtime" value="<?= $follow -> hora ?>" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="followcomentarios"> Comentarios: </label>
                            <textarea id="followcomentarios" name="followcomentarios" rows="8" cols="80" class="form-control" required> <?= $follow -> comentario ?> </textarea>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-8 offset-2">
                          <input type="submit" class="btn btn-info btn-block" name="" value="Editar">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="row">
              <div class="col-12">
                <center>
                  <h1> El seguimiento no existe. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
