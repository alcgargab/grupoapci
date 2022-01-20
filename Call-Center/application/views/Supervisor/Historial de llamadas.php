				<br><br>
				<div class="col-12">
					<div class="container-fluid">
						<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
							<div class="row">
								<div class="col-12 float-right">
									<a href="<?php print_r($url);?>"> <img class="float-right" src="<?= base_url()?>images/Icono/Call_Icon_Back.png" alt="Call_Icon_Back"> </a>
								</div>
							</div>
						<br><br>
						<center> <h1> Historial de llamadas </h1> </center>
						<br><br>
						<div class="row">
							<table class="table table-hover">
						    <thead>
						      <tr>
						        <th> Ejecutivo </th>
						        <th> ID </th>
										<th> Status </th>
										<th> Tipificación </th>
						        <th> Fecha </th>
						      </tr>
						    </thead>
						    <tbody>
									<?php foreach ($numero as $row){ ?>
							      <tr>
							        <td>
												<span style="font-size: 13px">
													<?php foreach ($ejecutivo as $rowe){
														if ($rowe -> IdUsuario == $row -> H_IdU){
															print_r($rowe -> CallNombre);
														}
													} ?>
												</span>
							        </td>
							        <td>
												<span style="font-size: 13px">
													<?= $row -> H_IdT ?>
												</span>
							        </td>
							        <td>
												<span style="font-size: 13px">
													<?php foreach ($status as $rows){
														if ($rows -> IdStatus == $row -> Status){
															print_r($rows -> CallStatus);
														}
													} ?>
												</span>
							        </td>
											<td>
												<span style="font-size: 13px">
													<?= $row -> Tipificacion ?>
												</span>
											</td>
											<td>
												<span style="font-size: 13px">
										  		<?= $row -> Fecha ?>
										  	</span>
											</td>
							      </tr>
									<?php } ?>
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
