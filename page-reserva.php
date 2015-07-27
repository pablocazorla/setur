<?php
/*
 *  Template name: Reservas
 */

get_header();
$data = explode('#',base64_decode($_GET['id']));
?>

<article id="main-article" class="reservas-page">
		<section class="jumbo jumbo-category">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-2.jpg" class="responsive unlimited jumbo-bg">
			<div class="wrap"><?php get_search_form(); ?></div>
		</section>
		<div class="wrap top-shadow">
			<img src="<?php bloginfo('template_url'); ?>/img/top-shadow.png" class="responsive">
		</div>
		<section class="wrap section-reservas">
			<div class="section-col left">
				<?php get_sidebar(); ?>
			</div>
			<div class="section-col right">
				<h1><span class="icon icon-reservas-title"></span><?php the_title();?></h1>
				<p class="congrats-reservas">Felicitaciones, esta completando los pasos para su reserva</p>
				<h2><span class="icon icon-reservas-resumen"></span>Resumen de su reserva</h2>

				<form id="form_reserva" action="<?php bloginfo('template_directory'); ?>/procesar-reserva.php" method="post">

					<?php $hotelLink =  $data[2].'#'.$data[3]; ?>

					<div class="reservas-resumen-line"><span class="reservas-label">Destino</span> <?php echo $data[0]; ?></div>
					<div class="reservas-resumen-line"><span class="reservas-label">Hotel</span> <a href="<?php echo $hotelLink; ?>"><?php echo $data[1]; ?></a></div>
					<div class="reservas-resumen-line"><span class="reservas-label">Comentario Adicional</span></div>
					<fieldset>
						<textarea id="comentarioAdicionalInput" name="comentarioAdicionalInput" placeholder="Agregar comentario" data-validate="required"></textarea>
					</fieldset>					
					<input type="hidden" id="destinoInput" name="destinoInput" value="<?php echo $data[0]; ?>" />
					<input type="hidden" id="hotelInput" name="hotelInput" value="<?php echo $data[1]; ?>" />
					<input type="hidden" id="hotelLinkInput" name="hotelLinkInput" value="<?php echo $hotelLink; ?>" />

					<h3>Datos de Pasajeros</h3>
					<div class="datos-pasajero">
						<div class="pasajero-container">
							<p>Pasajero <span class="num-pasajero">1</span></p>
							<div class="row">
								<div class="col-6">
									<fieldset>
										<label>Nombre</label>
										<input type="text" class="nombrePasajeroInput" data-validate="required" />
									</fieldset>
								</div>
								<div class="col-6">
									<fieldset>
										<label>Apellido</label>
										<input type="text" class="apellidoPasajeroInput" data-validate="required" />
									</fieldset>
								</div>
								<div class="col-6">
									<fieldset class="clearfix pasajero-doc">
										<label>Documento</label><br>
										<select class="docPasajeroInput">
											<option value="CIC">CIC</option>
											<option value="CDI">CDI</option>
											<option value="DNI">DNI</option>
										</select>
										<input type="text" class="dniPasajeroInput" data-validate="required,number" />
									</fieldset>
								</div>					
							</div>
						</div>								
						<a href="" id="agregar-pasajero">Agregar otro pasajero</a><br>
						<input type="hidden" id="pasajeroCount" name="pasajeroCount" value="1" />								
						<!--<input type="hidden" id="medio_de_pago" name="medio_de_pago" value="No definido" />-->
					</div>
				<h3>Datos del Contacto</h3>
				<div class="datos-contacto">
				<div class="row">
					<div class="col-6">
						<fieldset>
							<label>Email</label>
							<input type="email" id="emailInput" name="email" data-validate="required,email" />
						</fieldset>
					</div>
					<div class="col-6">
						<fieldset>
							<label>CUIL/CUIT</label>
							<input type="text" id="cuilInput" name="cuil" data-validate="required,number"/>
						</fieldset>
					</div>
					<div class="col-6">
						<fieldset>
							<label>Confirme su email</label>
							<input type="email" id="email2Input" name="email2" data-validate="compare:emailInput" />
						</fieldset>
					</div>
				</div>
				<div class="align-center">
					<input type="submit" class="reservar submit btn btn-confirmar-reserva" id="confirmarReserva" name="confirmarReserva" value="CONFIRMAR RESERVA" />
				</div>
				<div class="success" style="display:none">
					Gracias por tu reserva. En breve te contactaremos...
				</div>
			</form>
		</div>
	</section>
</article>
<?php get_footer(); ?>