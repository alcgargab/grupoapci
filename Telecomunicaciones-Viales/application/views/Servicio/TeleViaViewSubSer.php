		<div id="televia_container_Emp_Serv" class="container">
			<div id="televia_container_Emp_Serv_row" class="row">
				<?php if ($Subservicio == "") { ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<h1>En Mantenimiento</h1>
									<img src="<?= base_url()?>images/Iconos/Televia_Icon_Mant.png" alt="Televia_Icon_Mant">
								</center>
							</div>
					<?php }else{ ?>
						<input type="hidden" name="" class="VistasServicio" value="<?= $servicio -> Vistas ?>">
						<!-- <input type="hidden" name="" class="SolicitudServicio" value="<?= $servicio -> Solicitud ?>"> -->
						<!-- <input type="hidden" name="" class="VentasServicio" value="<?= $servicio -> Ventas ?>"> -->
						<input type="hidden" name="" id="base" value="http://127.0.0.1/TELEVIA/">
						<?php foreach ($Subservicio as $row){
							if ($oportunidad -> id_oportunidad == 1) { ?>
								<div id="televia_container_Emp_Serv_row_item" class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
									<form class="" action="<?= base_url()?>Servicio/<?= $row -> Ruta ?>" method="post">
										<div id="televia_container_item_card_DW" class="card">
											<input id="id_subser" type="hidden" name="id_subser" value="<?= $row -> id_subser?>">
								    	<center> <img id="televia_container_item_img" class="card-img-top" src="<?= base_url()?>images/Iconos/<?= $row -> logo?>" alt="<?= $row -> logo?>"> </center>
								    	<div id="televia_container_item_card_body_DW" class="card-body">
								      	<p id="televia_tittle4" class="card-title"> <?= $row -> subser?></p>
								      	<input id="televia_container_item_btn_DW" class="btn" type="submit" name="" value="Ver más...">
								    	</div>
								  	</div>
									</form>
								</div>
							<?php }elseif ($oportunidad -> id_oportunidad == 2) { ?>
								// code...
							<?php }elseif ($oportunidad -> id_oportunidad == 3) { ?>
								// code...
							<?php }else { ?>
								<div id="televia_container_Emp_Serv_row_item" class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
									<form class="" action="<?= base_url()?>Servicio/<?= $row -> Ruta ?>" method="post">
										<div id="televia_container_item_card_CC" class="card">
											<input id="id_subser" type="hidden" name="id_subser" value="<?= $row -> id_subser?>">
								    	<center> <img id="televia_container_item_img" class="card-img-top" src="<?= base_url()?>images/Iconos/<?= $row -> logo?>" alt="<?= $row -> logo?>"> </center>
								    	<div id="televia_container_item_card_body_CC" class="card-body">
								      	<p id="televia_tittle6" class="card-title"> <?= $row -> subser?></p>
								      	<input id="televia_container_item_btn_CC" class="btn" type="submit" name="" value="Ver más...">
								    	</div>
								  	</div>
									</form>
								</div>
							<?php }
						}
					} ?>
			</div>
		</div>
