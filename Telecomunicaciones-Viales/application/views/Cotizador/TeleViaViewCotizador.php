		<br><br><br><br><br><br><br><br>
		<div id="televia_container_Emp_Serv" class="container">
			<div id="televia_container_Emp_Serv_row" class="row">
				<?php if ($paquete == "") { ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<h1>En Mantenimiento</h1>
									<img src="<?= base_url()?>images/Iconos/Televia_Icon_Mant.png" alt="Televia_Icon_Mant">
								</center>
							</div>
					<?php }else{
						foreach ($paquete as $row) {?>
						<div id="televia_container_Emp_Serv_row_item" class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
							<form class="" action="<?= base_url()?>Paquete/<?= $row -> Ruta ?>" method="post">
								<div id="televia_container_item_card_DW" class="card">
									<input id="idPaquete" type="hidden" name="idPaquete" value="<?= $row -> idPaquete?>">
						    	<center> <img id="televia_container_item_img" class="card-img-top" src="<?= base_url()?>images/Iconos/Paquetes/<?= $row -> Logo?>" alt="<?= $row -> Logo?>"> </center>
						    	<div id="televia_container_item_card_body_DW" class="card-body">
						      	<p id="televia_tittle4" class="card-title"> <?= $row -> Paquete?></p>
						      	<input id="televia_container_item_btn_DW" class="btn" type="submit" name="" value="Ver más...">
						    	</div>
						  	</div>
							</form>
						</div>
					<?php }
				} ?>
			</div>
		</div>
