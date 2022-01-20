		<br><br><br><br><br><br><br><br>
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<?php if ($correos != "") {?>
				    <table class="table table-bordered">
				      <thead>
				        <tr class="table-primary">
									<th> id Correo </th>
									<th> Usuario </th>
									<th> Correo Electrónico </th>
									<th> Asunto </th>
									<th> Número de Teléfono </th>
									<th> Comentarios </th>
									<th> Fecha de Envio </th>
									<th> Ubicación </th>
				          <th> Direccion Ip </th>
				        </tr>
				      </thead>
				      <tbody>
								<?php foreach ($correos as $row){ ?>
										<tr>
											<td> <?php if (isset($row -> idCorreo)) {
												print_r($row -> idCorreo);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> Usuario)) {
												print_r($row -> Usuario);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> CorreoElectronico)) {
												print_r($row -> CorreoElectronico);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> Asunto)) {
												print_r($row -> Asunto);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> NumTelefonico)) {
												print_r($row -> NumTelefonico);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> Comentarios)) {
												print_r($row -> Comentarios);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> FEnvio)) {
												print_r($row -> FEnvio);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> Ubicacion)) {
												print_r($row -> Ubicacion);
											}else {
												print_r('Sin Registro');
											} ?> </td>
											<td> <?php if (isset($row -> DireccionIp)) {
												print_r($row -> DireccionIp);
											}else {
												print_r('Sin Registro');
											}
										}?></td>
									</tr>
								<?php }else { ?>
									<center> <h1>No Existen registros</h1> </center>
								<?php } ?>
				      </tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>
		<br><br>
