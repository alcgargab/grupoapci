					<div class="ap-home-class">
						<div class="container-fluid">
							<div class="row">
								<div class="ap-class-4">
									<a href="#" class="btn float-left ap-gral-btn"> Total : <?php echo $total_tbl_v ?> </a>
								</div>
							</div>
							<br><br>
							 <?php if ($tbl_v != "false"){ ?>
								<div class="row">
									<div class="ap-class-12">
										<div id='ap-holiday-calendar'>  </div>
								  </div>
								</div>
							 <?php }
							else {?>
								<div class="row">
									<div class="ap-class-12">
										<center>
											<h1> No cuentas con días de vacaciones. </h1>
											<br>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_NER.webp" alt="AP-Consultoria-Integral-ERP">
										</center>
								  </div>
								</div>
							<?php } ?>
						</div>
					</div>
					<script type="text/javascript">
						// --------------- FULLCALENDAR --------------- //
						document.addEventListener('DOMContentLoaded', function() {
							var calendarEl = document.getElementById('ap-holiday-calendar');
							var calendar = new FullCalendar.Calendar(calendarEl, {
								plugins: ['dayGrid', 'interaction', 'list', 'timeGrid', 'bootstrap'],
								locale: 'es',
								timeZone: 'UTC',
								themeSystem: 'bootstrap',
								selectable: true,
								header: {
									left: 'prev,next, today',
									center: 'title',
									right: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek',
								},
								events: <?= $tbl_v; ?>,
							});
							calendar.render();
						});
					</script>
