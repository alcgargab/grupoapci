				<div class="col-lg-9 col-md-9 col-sm-12 col-12">
					<div class="container">
						<br><br>
						<center> <h1> Historial de llamadas </h1> </center>
						<br><br>
						<?php if ($historial != ""){ ?>
							<ul class="list-group list-group-flush">
								<?php foreach ($historial as $row){ ?>
									<li class="list-group-item"> <a href="<?= base_url()?>Supervisor/ver-historial/<?= $row -> H_IdT ?>"> ID: <?= $row -> H_IdT ?> </a> </li>
								<?php } ?>
							</ul>
						<?php } else { ?>
							<div class="row">
								<div class="col-12">
									<center> <h1> No cuentas con Historial de llamadas </h1> <img src="<?= base_url()?>images/Icono/Call_Icon_B.png" alt="Call_Icon_B">	</center>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
