					<div class="homeClass">
						<div class="container-fluid">
							<div class="row">
								<?php foreach ($empresas as $row) { ?>
									<div class="Class-4-4-6-12">
										<div class="card">
											<img class="card-img-bottom" src="<?= base_url()?>images/Logos/<?= $row -> Icono ?>" alt="AP-Consultoria-Integral-ERP" width="300px" height="200px">
										</div>
										<br>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
