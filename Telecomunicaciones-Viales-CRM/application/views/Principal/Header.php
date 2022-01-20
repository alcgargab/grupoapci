<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
  <head>
    <meta charset="utf-8">
    <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="tittle" content="Telecomunicaciones Viales | CRM">
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad">
    <meta name="keyword" content="Lorem, ipsum, dolor, sit, amet, consectetur, adipisicing, elit, sed, do, eiusmod, tempor, incididunt, ut, labore, et, dolore, magna, aliqua, Ut, enim, ad">
    <title> Telecomunicaciones Viales | CRM </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <!-- PLUGINS CSS -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/flexslider.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
    <!-- ESTILOS PERSONALIZADAS -->
		<link rel="stylesheet" href="<?= base_url()?>css/General.css">
    <link rel="stylesheet" href="<?= base_url()?>css/menuSlide.css">
    <!-- <link rel="stylesheet" href="<?= base_url()?>css/Vistas.css"> -->
    <!-- PLUGINS DE JAVASCRIPT -->
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
		<script type="text/javascript" src="<?= base_url()?>js/Plugins/pushjs/bin/push.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/charts.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- ICONO DE LA PÁGINA WEB -->
    <!-- <link rel="shortcut icon" href="<?= base_url()?>images/Iconos/<?php //print_r($plantilla[0] -> Icono);?>"> -->
		<!-- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156151538-1"></script>
		<script>
		  function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","UA-156151538-1");
		</script>
  </head>
	<body>
		<script type="text/javascript" src="<?= base_url()?>js/crm.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/validation.js"></script>
		<script type="text/javascript" src="<?= base_url()?>js/ajax.js"></script>
		<div class="wrapper">
			<?php if (isset($this -> session -> sesion)){
				if ($this -> session -> sesion == "true"){ ?>
					<!-- Sidebar  -->
					<nav id="crm-sidebar" class="crm-sidebar">
						<div id="crm-dismiss" class="crm-dismiss">
							<i class="fas fa-arrow-left"></i>
						</div>
						<div class="sidebar-header">
							<p class="text-white">
	              <input id="sesion" class="form-control" type="hidden" name="" value="<?= $this -> session -> sesion ?>">
	              <input id="tipodeusuario" class="form-control" type="hidden" name="" value="<?= $this -> session -> name ?>">
	              <?php if ($empresa != "") {
	                print_r($empresa -> empresa);
	              }else { ?> CRM <?php } ?>
			        </p>
						</div>
						<?php switch ($this -> session -> puesto) {
							// ejecutivo
							case 1: ?>
								<ul class="list-unstyled components">
									<p> Actividades </p>
									<li class="">
										<a href="<?= base_url()?>crm/new-record"> Nuevo registro </a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/view-my-records"> Mis registros &nbsp;&nbsp;&nbsp;
											<?php if ($erllview > 0){ ?>
												<span class="badge badge-danger"> <?= $erllview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/my-follow-ups" class="btnRuta"> Seguimientos &nbsp;&nbsp;&nbsp;
											<?php if ($esllview > 0){ ?>
												<span class="badge badge-danger"> <?= $esllview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/view-my-requests"> Mis prospectos &nbsp;&nbsp;&nbsp;
											<?php if ($epvview > 0){ ?>
												<span class="badge badge-danger"> <?= $epvview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/request-without-file"> Prospectos sin INE &nbsp;&nbsp;&nbsp;
											<?php if ($epvineview > 0){ ?>
												<span class="badge badge-danger"> <?= $epvineview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/request-without-doc"> Prospectos sin contrato
											<?php if ($epvdocview > 0){ ?>
												<span class="badge badge-danger"> <?= $epvdocview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/request-without-sign"> Contratos sin firma &nbsp;&nbsp;&nbsp;
											<?php if ($ecpsing > 0){ ?>
												<span class="badge badge-danger"> <?= $ecpsing ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/request-sheet-number"> Estatus de los folios &nbsp;&nbsp;&nbsp;
											<?php if ($ecpfolio > 0){ ?>
												<span class="badge badge-danger"> <?= $ecpfolio ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/undelivered-services"> Pendientes de entrega
											<?php if ($ecpentrega > 0){ ?>
												<span class="badge badge-danger"> <?= $ecpentrega ?> </span>
											<?php } ?>
										</a>
									</li>
								</ul>
								<ul class="list-unstyled crm-menuDown">
									<li></li>
									<li></li>
								</ul>
							<?php break;
							// mesa de control
							case 2: ?>
								<ul class="list-unstyled components">
									<p> Actividades </p>
									<li class="">
										<a href="<?= base_url()?>crm/request-without-doc"> Prospectos sin contrato
											<?php if ($mpvdocview > 0){ ?>
												<span class="badge badge-danger"> <?= $mpvdocview ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/request-without-sheet-number"> Contratos sin folio
											<?php if ($mcpfolio > 0){ ?>
												<span class="badge badge-danger"> <?= $mcpfolio ?> </span>
											<?php } ?>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/files" class="btnRuta"> Generar expediente
											<?php if ($mvview > 0){ ?>
												<span class="badge badge-danger"> <?= $mvview ?> </span>
											<?php } ?></a>
									</li>
								</ul>
								<ul class="list-unstyled crm-menuDown">
									<li></li>
									<li></li>
								</ul>
							<?php break;
							// supervisor
							case 3: ?>
								<ul class="list-unstyled components">
									<p> Actividades </p>
									<li class="">
										<a href="<?= base_url()?>crm/licenses"> Licencias </a>
									</li>
									<li class="">
										<a href="<?= base_url()?>crm/call-history"> Historial de llamadas </a>
									</li>
									<li class="">
										<a href="#report" data-toggle="collapse" aria-expanded="false"> + Reportes </a>
										<ul class="collapse list-unstyled" id="report">
											<li>
												<a href="<?= base_url()?>crm/reports/request"> Registros </a>
											</li>
											<li>
												<a href="<?= base_url()?>crm/reports/sales"> Ventas </a>
											</li>
											<li>
												<a href="<?= base_url()?>crm/reports/typify"> Tipificación de llamadas </a>
											</li>
											<!-- <li>
												<a href="<?= base_url()?>crm/reports/follow"> Seguimientos </a>
											</li> -->
											<li>
												<a href="<?= base_url()?>crm/reports/call-interest"> Interes en el servicio </a>
											</li>
											<li class="">
												<a href="#request-report" data-toggle="collapse" aria-expanded="false"> + Prospectos </a>
												<ul class="collapse list-unstyled" id="request-report">
													<li>
														<a href="<?= base_url()?>crm/reports/request-doc"> contrato </a>
													</li>
													<li>
														<a href="<?= base_url()?>crm/reports/request-file"> INE </a>
													</li>
												</ul>
											</li>
											<li class="">
												<a href="#docs-report" data-toggle="collapse" aria-expanded="false"> + Contratos </a>
												<ul class="collapse list-unstyled" id="docs-report">
													<li>
														<a href="<?= base_url()?>crm/reports/docs-sing"> Firma </a>
													</li>
													<li>
														<a href="<?= base_url()?>crm/reports/docs-sheet-number"> Folio </a>
													</li>
												</ul>
											</li>
											<li>
												<a href="<?= base_url()?>crm/reports/services"> Servicio </a>
											</li>
										</ul>
									</li>
									<!-- <li class="">
										<a href="#">About</a>
									</li> -->
								</ul>
								<ul class="list-unstyled crm-menuDown">
									<li></li>
									<li></li>
								</ul>
							<?php break;
							default:
								// code...
							break;
						} ?>
					</nav>
				<?php } else { } ?>
			<?php } else { } ?>
			<div id="content">
