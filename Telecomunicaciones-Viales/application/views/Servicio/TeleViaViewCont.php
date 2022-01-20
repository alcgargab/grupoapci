		<div id="televia_container_Contact" class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img id="televia_contact_img" src="<?= base_url()?>images/Televia_Contacto.png" alt="">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<form action="<?= base_url()?>Gracias" onsubmit="return registroUsuario()" method="post">
							<div class="form-group">
								<label id="televia_contacto_text" for="Name">Nombre:</label>
								<input type="text" class="form-control" id="Name" placeholder="Telecomunicaciones Viales*" name="Name" required>
							</div>
							<div class="form-group">
								<label id="televia_contacto_text" for="email">Correo:</label>
								<input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com*" name="email" required>
							</div>
							<div class="form-group">
								<label id="televia_contacto_text" for="subject">Asunto:</label>
								<?php if (isset($asunto)){ ?>
									<input type="txt" class="form-control" id="subject" value="Solicito información sobre el servicio de <?= $asunto ?>" name="subject" disabled>
									<input type="hidden" class="form-control" id="subject1" value="Solicito información sobre el servicio de <?= $asunto ?>" name="subject1">
								<?php }else { ?>
									<input type="txt" class="form-control" id="subject" placeholder="Servicio*" name="subject" required>
								<?php } ?>
								<!-- <input type="txt" class="form-control" id="subject" placeholder="Servicio*" name="subject" required> -->
							</div>
							<div class="form-group">
								<label id="televia_contacto_text" for="tel">Teléfono:</label>
								<input type="tel" class="form-control" id="tel" placeholder="55 11111111" name="tel" pattern="[0-9]{10}">
							</div>
							<div class="form-group">
								<label id="televia_contacto_text" for="Comment">Comentarios:</label>
								<textarea id="Comment" class="form-control" name="Comment" rows="8" cols="80" required></textarea>
							</div>
							<span id="errorForm">

							</span>
							<input type="hidden" name="TelevialesmensajeTELEVIALES" id="TelevialesmensajeTELEVIALES" value="">
							 <div class="g-recaptcha" data-sitekey="6Lel9pwUAAAAANLxwvETN5PrwViVhMUwLQYyAwKM"></div>
							<center> <button id="televia_btn_Emp" type="submit" class="btn" name=""> Contactanos <i id="televia_Emp_icon" class="fas fa-paper-plane"> </i> </button> </center>
						</form>
					</div>
				</div>
			</div>
		</div>
