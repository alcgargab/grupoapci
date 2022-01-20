        <!-- login -->
        <div class="crm-login">
          <div class="container">
            <div class="row">
              <div class="col-10 offset-1">
                <form action="<?= base_url()?>crm/login" onsubmit="return login()" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="usuario"> Centro de contacto: </label>
                        <input type="text" name="usuario" class="form-control" id="usuario" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu usuario" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="password"> Contraseña: </label>
                        <input type="password" name="contraseña" class="form-control" id="password" autocomplete="off" oncopy="return false" onpaste="return false" placeholder="Ingresa tu contraseña" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <input type="hidden" class="form-control" name="ubicacion" id="ubicacion" value="">
                      <input type="hidden" class="form-control" name="hora" id="hora" value="">
                      <input type="hidden" class="form-control" name="navegador" id="navegador" value="">
                      <span id="errorForm"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-10 offset-1">
                      <button type="submit" class="btn btn-success btn-block"> Ingresar </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
