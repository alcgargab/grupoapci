					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<?php if ($this -> session -> user == "VBrheo" || $this -> session -> user == "VJrheo"){ ?>
									<div class="ap-class-12">
										<div class="card">
											<img class="card-img-bottom" src="<?= base_url()?>images/Logos/<?= $tbl_em -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="100%" height="550px">
										</div>
										<br>
									</div>
								<?php } else {
									foreach ($tbl_em as $row) { ?>
										<div class="ap-class-4-4-6-12">
											<div class="card">
												<img class="card-img-bottom" src="<?= base_url()?>images/Logos/<?= $row -> icono_em ?>" alt="AP-Consultoria-Integral-ERP" width="300px" height="200px">
											</div>
											<br>
										</div>
									<?php }
								} ?>
							</div>
						</div>
					</div>
