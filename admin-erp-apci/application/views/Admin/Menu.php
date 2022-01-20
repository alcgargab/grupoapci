        <div class="">
          <div class="row">
            <div id="erpMenuL" class="col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <input id="ruta" type="hidden" name="" value="<?= $ruta?>">
                  <div id="accordionMenu">
                    <!-- enviar email -->
                    <div class="card">
                      <div class="card-header">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#enviaremail">
                          <p> Enviar email <img src="<?= base_url()?>images/Icono/ERP_Icon_Se.png" alt="ERP_Icon_Se" class="float-right" width="15%"> </p>
                        </a>
                      </div>
                      <div class="modal fade" id="enviaremail">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title"> Enviar documentos </h4>
                              <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            </div>
                            <div class="modal-body">
                              <form class="" onsubmit="return validaremail()" action="<?= base_url()?>Admin/<?= $ruta ?>/enviar-documentos" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-sm">
                                    <span id="errorEmail">  </span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="from" id="from" placeholder="Para:" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="Cc" id="Cc" placeholder="Cc:">
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="Cco" id="Cco" placeholder="Cco:">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto:" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                      <!-- <label for="adjArchivos" class="form-control"> <span id="adjArchivosSpan" class="fas fa-upload"> </span> </label> -->
                                      <label for="adjArchivos[]" class="form-control"> <img src="<?= base_url()?>images/Icono/ERP_Icon_CL.png" alt="ERP_Icon_CL"> <span id="adjArchivosSpan"> </span> </label>
                                      <!-- <label for="adjArchivos[]"> Adjuntar Baja: </label> -->
                                      <input type="file" class="form-control adjArchivos" name="adjArchivos[]" id="adjArchivos[]" multiple="multiple" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                      <label for="redactar"> Redactar: </label>
                                      <textarea name="redactar" id="redactar" class="form-control" rows="8" cols="80" required></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                      <button id="btnEnvCorreo" type="submit" name="" class="btn btn-outline-success float-right"> Enviar <span class="fas fa-paper-plane">  </span> </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- personal -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#Empleados">
                          <p>
                            Personal
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.png" alt="ERP_Icon_Emp" class="float-right" width="15%">
                            <input id="templeado" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="Empleados" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-empleados">
                                  <p>
                                    <?php
                                    if ($this -> session -> UserSesion == "rhadm"){
                                      print_r('Empleados ');
                                    }else {
                                      print_r('Personal ');
                                    } ?>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                  </p>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- baja del personal -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#bajaPersonal">
                          <p>
                            Baja del Personal
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.png" alt="ERP_Icon_Fi" class="float-right" width="15%">
                            <input id="tbaja" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="bajaPersonal" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/baja-del-personal">
                                  Empleados
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- vacantes -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#Vacantes">
                          <p>
                            Vacantes
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_V.png" alt="ERP_Icon_V" class="float-right" width="15%">
                            <input id="tvacante" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="Vacantes" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-vacantes">
                                  Vacantes
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- evaluación -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#Evaluaciones">
                          <p>
                            Evaluación
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_EME.png" alt="ERP_Icon_EME" class="float-right" width="15%">
                            <input id="tevaluacion"class="form-control"  type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="Evaluaciones" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-evaluaciones">
                                  Evaluaciones
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- permisos -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#Permisos">
                          <p>
                            Permisos
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.png" alt="ERP_Icon_Per" class="float-right" width="15%">
                            <input id="tpermiso" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="Permisos" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-permisos">
                                  Permisos
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- permisos urgentes -->
  									<div class="card">
  										<div class="card-header">
  											<a class="collapsed card-link" data-toggle="collapse" href="#PasesDeSalida">
  												<p>
  													Permisos Urgentes
  													<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.png" alt="ERP_Icon_Per_Ur" class="float-right" width="15%">
  													<input id="tentrevista" type="hidden" name="" value="0">
  												</p>
  											</a>
  										</div>
  										<div id="PasesDeSalida" class="collapse" data-parent="#accordionMenu">
  											<div class="card-body">
  												<ul class="list-group list-group-flush">
  													<?php foreach ($empresamenu as $row){ ?>
  														<li class="list-group-item">
  															<a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-los-permisos-urgentes-de-mi-equipo">
  																Permisos urgentes
  																<img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
  															</a>
  														</li>
  													<?php } ?>
  												</ul>
  											</div>
  										</div>
  									</div>
                    <!-- expediente -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#ExpedienteEmpleados">
                          <p>
                            Expediente de Empleados
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.png" alt="ERP_Icon_Exp" class="float-right" width="15%">
                            <input id="texpediente" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="ExpedienteEmpleados" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-los-expedientes-de-los-empleados">
                                  Expediente
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- vacaciones -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#VacacionesEmpleados">
                          <p>
                            Vacaciones
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_HD.png" alt="ERP_Icon_HD" class="float-right" width="15%">
                            <input id="tvacacion" class="form-control" type="hidden" name="" value="0">
                          </p>
                        </a>
                      </div>
                      <div id="VacacionesEmpleados" class="collapse" data-parent="#accordionMenu">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-las-vacaciones-de-los-empleados">
                                  Vacaciones
                                  <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" class="float-right" width="30%">
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="erpMenuS" class="col-lg-1 col-md-1 col-sm-6 col-12" style="display: none">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <input id="ruta" type="hidden" name="" value="<?= $ruta?>">
                  <div id="accordionMenuS">
                    <!-- enviar email -->
                    <div class="card">
                      <div class="card-header">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#enviaremailS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_Se.png" alt="ERP_Icon_Se" class="float-right" width="100%">
                        </a>
                      </div>
                      <div class="modal fade" id="enviaremailS">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title"> Enviar documentos </h4>
                              <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            </div>
                            <div class="modal-body">
                              <form class="" onsubmit="return validaremail()" action="<?= base_url()?>Admin/<?= $ruta ?>/enviar-documentos" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-sm">
                                    <span id="errorEmail">  </span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="from" id="from" placeholder="Para:" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="Cc" id="Cc" placeholder="Cc:">
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                    <div class="form-group">
                                      <input type="email" class="form-control" name="Cco" id="Cco" placeholder="Cco:">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto:" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                      <!-- <label for="adjArchivos" class="form-control"> <span id="adjArchivosSpan" class="fas fa-upload"> </span> </label> -->
                                      <label for="adjArchivos[]" class="form-control"> <img src="<?= base_url()?>images/Icono/ERP_Icon_CL.png" alt="ERP_Icon_CL"> <span id="adjArchivosSpan"> </span> </label>
                                      <!-- <label for="adjArchivos[]"> Adjuntar Baja: </label> -->
                                      <input type="file" class="form-control adjArchivos" name="adjArchivos[]" id="adjArchivos[]" multiple="multiple" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                      <label for="redactar"> Redactar: </label>
                                      <textarea name="redactar" id="redactar" class="form-control" rows="8" cols="80" required></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                      <button id="btnEnvCorreo" type="submit" name="" class="btn btn-outline-success float-right"> Enviar <span class="fas fa-paper-plane">  </span> </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- personal -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#EmpleadosS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.png" alt="ERP_Icon_Emp" class="float-right" width="100%">
                          <input id="templeado" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="EmpleadosS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-empleados">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- baja del personal -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#bajaPersonalS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_Fi.png" alt="ERP_Icon_Fi" class="float-right" width="100%">
                          <input id="tbaja" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="bajaPersonalS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/baja-del-personal">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- vacantes -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#VacantesS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_V.png" alt="ERP_Icon_V" class="float-right" width="100%">
                          <input id="tvacante" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="VacantesS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-vacantes">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- evaluación -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#EvaluacionesS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_EME.png" alt="ERP_Icon_EME" class="float-right" width="100%">
                          <input id="tevaluacion"class="form-control"  type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="EvaluacionesS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-evaluaciones">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- permisos -->
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#PermisosS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_Per.png" alt="ERP_Icon_Per" class="float-right" width="100%">
                          <input id="tpermiso" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="PermisosS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-permisos">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- permisos urgentes -->
  									<div class="card">
  										<div class="card-header">
  											<a class="collapsed card-link" data-toggle="collapse" href="#permisosUrgentes">
													<img src="<?= base_url()?>images/Icono/ERP_Icon_Per_Ur.png" alt="ERP_Icon_Per_Ur" class="float-right" width="100%">
													<input id="tentrevista" type="hidden" name="" value="0">
  											</a>
  										</div>
  										<div id="permisosUrgentes" class="collapse" data-parent="#accordionMenuS">
  											<div class="card-body">
  												<ul class="list-group list-group-flush">
  													<?php foreach ($empresamenu as $row){ ?>
  														<li class="list-group-item">
  															<a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-los-permisos-urgentes-de-mi-equipo">
  																<center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
  															</a>
  														</li>
  													<?php } ?>
  												</ul>
  											</div>
  										</div>
  									</div>
                    <!-- expediente -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#ExpedienteEmpleadosS">
                          <img src="<?= base_url()?>images/Icono/ERP_Icon_Exp.png" alt="ERP_Icon_Exp" class="float-right" width="100%">
                          <input id="texpediente" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="ExpedienteEmpleadosS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-los-expedientes-de-los-empleados">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- vacaciones -->
                    <div class="card">
                      <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#VacacionesEmpleadosS">
                            <img src="<?= base_url()?>images/Icono/ERP_Icon_HD.png" alt="ERP_Icon_HD" class="float-right" width="100%">
                            <input id="tvacacion" class="form-control" type="hidden" name="" value="0">
                        </a>
                      </div>
                      <div id="VacacionesEmpleadosS" class="collapse" data-parent="#accordionMenuS">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <?php foreach ($empresamenu as $row){ ?>
                              <li class="list-group-item">
                                <a href="<?= base_url()?>Admin/<?= $row -> Ruta ?>/ver-las-vacaciones-de-los-empleados">
                                  <center>
                                    <img src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Icono ?>" width="30px">
                                  </center>
                                </a>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
