				<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
					<div class="container-fluid">
						<div class="row">
							<?php foreach ($empresas as $row) { ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="card">
										<img class="card-img-bottom" src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="<?= $row -> Empresa ?>" width="300px" height="200px">
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
