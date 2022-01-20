		<br><br>
		<!-- <div class="row">
		  <div class="col-12">
		    <a href="<?= base_url()?>Ventas/cerrar-sesion"> cerrar sesion </a>
		  </div>
		</div> -->
		<div class="container-fluid">
			<div class="row">
			  <div class="col-12">
					<table class="table table-hover" style="text-align: center">
				    <thead>
				      <tr>
				        <th> Asesor </th>
				        <th> Ventas al día </th>
				        <th> Ventas al mes </th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php foreach ($user as $row){ ?>
				      	<tr>
									<td>
										<span class="float-left">
											<img src="<?= base_url()?>images/Usuario/<?= $row -> CallImagen?>" alt="" width="50px">
										</span>
										<?= $row -> CallNombre ?>
										<input id="banderamb<?= $row -> IdUsuario ?>" type="hidden" name="" value="0" class="form-control">
										<input id="banderamr<?= $row -> IdUsuario ?>" type="hidden" name="" value="0" class="form-control">
									</td>
									<td>
										<h1> <span id="vd<?= $row -> IdUsuario ?>" class="badge badge-success">  </span> </h1>
									</td>
									<td>
										<h1> <span id="vm<?= $row -> IdUsuario ?>" class="badge badge-info">  </span> </h1>
									</td>
				      	</tr>
				      <?php } ?>
				    </tbody>
				  </table>
			  </div>
			</div>
		</div>
