			<!-- Barra de navegación  -->
			<div class="crm-content">
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
					<div class="container-fluid">
						<?php if (isset($this -> session -> sesion)){ ?>
							<?php if ($this -> session -> sesion == "true"){ ?>
								<button type="button" id="sidebarCollapse" class="btn btn-dark">
									<i class="fas fa-align-left">
										<?php switch ($this -> session -> puesto) {
											// ejecutivo
											case 1:
												if ($erllview > 0 || $esllview > 0 || $epvineview > 0 || $epvview > 0 || $epvdocview > 0 || $ecpsing > 0 || $ecpfolio > 0 || $ecpentrega > 0){ ?>
													<span class="badge badge-danger"> 1 </span>
												<?php }
											break;
											// mesa de control
											case 2:
												if ($mpvdocview > 0 || $mcpfolio > 0 || $mvview > 0){ ?>
													<span class="badge badge-danger"> 1 </span>
												<?php }
											break;
											default:
											break;
										} ?>
									</i>
									<!-- <span>Toggle Sidebar</span> -->
								</button>
							<?php } else { } ?>
						<?php } else { } ?>
						<button class="btn btn-dark d-inline-block d-sm-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<i class="fas fa-align-justify"> </i>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="nav navbar-nav ml-auto">
								<?php if (isset($this -> session -> sesion)){
									if ($this -> session -> sesion == "true") { ?>
										<li class="nav-item">
											<input type="hidden" class="form-control" id="validarSesion" name="validarSesion" value="<?= $this -> session -> sesion ?>">
											<input type="hidden" class="form-control" id="TUSesion" name="TUSesion" value="<?= $this -> session -> t_usuario ?>">
											<input type="hidden" class="form-control" id="usuario" name="usuario" value="<?= $this -> session -> id ?>">
											<input type="hidden" class="form-control" id="sesionTime" name="sesionTime" value="<?= $this -> session -> time ?>">
											<span class="nav-link"> | </span>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url()?>"> Bienvenid@ <?php if ($licencia != "") {
												print_r($licencia -> apaterno." ".$licencia -> nombre);
											}else {
												print_r('');
											} ?> </a>
										</li>
										<li class="nav-item">
											<span class="nav-link"> | </span>
										</li>
										<li class="nav-item dropdown dropleft">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?= base_url()?>">
												<?php if ($usuario != ""){ ?>
													<img src="<?= base_url()?>images/Iconos/CRM_Icon_Emp.png" alt="Telecomunicaciones Viales | CRM" width="30px" class="rounded-circle">
												<?php } else { ?>
													<img src="<?= base_url()?>images/Iconos/CRM_Icon_Emp.png" alt="Telecomunicaciones Viales | CRM" width="30px" class="rounded-circle">
												<?php } ?>
											</a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= base_url()?>crm/logout"> Cerrar sesión </a>
											</div>
										</li>
									<?php } else { ?>
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url()?>"> Bienvenido </a>
										</li>
										<li class="nav-item">
											<span class="nav-link"> | </span>
										</li>
								<?php }
							}else { ?>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url()?>"> Bienvenido </a>
								</li>
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</nav>
