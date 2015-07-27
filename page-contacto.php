<?php
/*
 *  Template name: Contacto
 */
get_header();
?>

<article id="main-article" class="reservas-page">
		<section class="jumbo jumbo-category">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-2.jpg" class="responsive unlimited jumbo-bg">
			<div class="wrap"><?php get_search_form(); ?></div>
		</section>
		<div class="wrap top-shadow">
			<img src="<?php bloginfo('template_url'); ?>/img/top-shadow.png" class="responsive">
		</div>
		<section class="wrap section-contacto">
			<div class="section-col left">
				<?php get_sidebar(); ?>
			</div>
			<div class="section-col right">
				<h1><span class="icon icon-contacto-title"></span><?php the_title();?></h1>
				<h2><span>Nuestro equipo</span></h2>
				<?php 
					$equipo = array(
							"p1" => array(
								"title" => "Gte. de Operaciones",
								"name" => "Ángel Santacruz",
								"email" => "angels",
								"tel" => "",
								"img" => "1"
							),
							"p2" => array(
								"title" => "Director Ejecutivo",
								"name" => "Pablo Espinola",
								"email" => "pabloe",
								"tel" => "",
								"img" => "2"
							),
							"p3" => array(
								"title" => "Gerente Comercial",
								"name" => "José Quevedo",
								"email" => "joseq",
								"tel" => "",
								"img" => "3"
							),
							"p4" => array(
								"title" => "Estudiantil y Social Media",
								"name" => "Fernando Segovia",
								"email" => "fers",
								"tel" => "",
								"img" => "4"
							),
							"p5" => array(
								"title" => "Gte. de Eventos y Congresos",
								"name" => "Ronier Cabrera",
								"email" => "ronierc",
								"tel" => "595 5896321",
								"img" => "5"
							),
							"p6" => array(
								"title" => "Depto. de Ventas",
								"name" => "Ismael Salgueiro",
								"email" => "ismaels",
								"tel" => "",
								"img" => "6"
							),
							"p7" => array(
								"title" => "Depto. de Ventas y Congresos",
								"name" => "Oscar Amarilla",
								"email" => "oscara",
								"tel" => "",
								"img" => "7"
							),
							"p8" => array(
								"title" => "Depto. Administrativo",
								"name" => "Bernardino Domínguez",
								"email" => "bernard",
								"tel" => "",
								"img" => "8"
							),
							"p9" => array(
								"title" => "Depto. Receptivo",
								"name" => "Julio Miranda",
								"email" => "juliom",
								"tel" => "",
								"img" => "9"
							),
							"p10" => array(
								"title" => "Encargada en Suc. Encarnación",
								"name" => "Stefy Condoretty",
								"email" => "stefyc",
								"tel" => "0986 372960",
								"img" => "10"
							)
						);
					$equipo_length = count($equipo);
				?>



				<div class="row">
					<?php for($i = 1;$i <= $equipo_length; $i++){ ?>
					<div class="col-4">
						<div class="clearfix contact-card">
							<h3><?php echo $equipo['p'.$i]['title']; ?></h3>						
							<img src="<?php bloginfo('template_url'); ?>/img/equipo/<?php echo $equipo['p'.$i]['img']; ?>.jpg" width="85" height="85">
							<div class="contact-card-text">								
								<p class="name"><?php echo $equipo['p'.$i]['name']; ?></p>
								<p class="email"><a href="mailto:<?php echo $equipo['p'.$i]['email']; ?>@setur.com.py"><?php echo $equipo['p'.$i]['email']; ?>@setur.com.py</a></p>
								<p class="tel"><?php echo $equipo['p'.$i]['tel']; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<h2><span>Acercate a nuestras oficinas</span></h2>
				<div class="contact-maps">
					<ul class="contact-tabs">
						<li class="current">Asunción</li>
						<li>Encarnación</li>
					</ul>
					<div class="contact-map-container current">
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.932904197134!2d-58.38311605186573!3d-34.608656899908205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacf19459af7%3A0xf8e533bc9e4a4c27!2s9+de+Julio!5e0!3m2!1ses!2sar!4v1436794048306" width="890" height="278" frameborder="0" style="border:0" allowfullscreen></iframe>
					<!---->
					</div>
					<div class="contact-map-container">
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.932904197134!2d-58.38311605186573!3d-34.608656899908205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacf19459af7%3A0xf8e533bc9e4a4c27!2s9+de+Julio!5e0!3m2!1ses!2sar!4v1436794048306" width="890" height="278" frameborder="0" style="border:0" allowfullscreen></iframe>
					<!---->
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<h4>Dirección</h4>
						<p>Charles de Gaulle 432 c/Dr. Hasler</p>
					</div>
					<div class="col-6 align-right">
						<h4>Teléfonos</h4>
						<p>595 21 622912 //  609 680</p>
					</div>
				</div>
				<form id="form-contact-page" action="<?php bloginfo('template_directory'); ?>/procesar-page-contacto.php">
					<h4>Envianos tu consulta</h4>
					<fieldset>
						<label class="lab-inp">Nombre y apellido *</label>
						<div class="contact-input-wrap">
							<input type="text" value="" id="nombreContactInput" data-validate="required">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Localidad</label>
						<div class="contact-input-wrap">
							<input type="text" value="" id="localidadContactInput">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Provincia</label>
						<div class="contact-input-wrap">
							<input type="text" value="" id="provinciaContactInput">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Teléfono</label>
						<div class="contact-input-wrap">
							<input type="text" value="" id="telefonoContactInput">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Email *</label>
						<div class="contact-input-wrap">
							<input type="email" value="" id="emailContactInput" data-validate="required,email">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Fecha de viaje</label>
						<div class="contact-input-wrap">
							<input type="text" value="" id="fechaContactInput">
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Cantidad de personas</label>
						<div class="clearfix contact-input-wrap">
							
								<div class="col-cant-pers1">
									<input type="text" value="" id="numPersonasContactInput">
								</div>
								<div class="col-cant-pers2">
									<span class="type-label">Presupuesto limitado</span> <input type="radio" name="limitadoContactInput" id="limitadoContactInputSi" value="sí" checked><label for="limitadoContactInputSi">Sí</label>
									<input type="radio" name="limitadoContactInput" id="limitadoContactInputNo" value="no"><label for="limitadoContactInputNo">No</label>
								
							</div>
							
						</div>						
					</fieldset>
					<fieldset>
						<label class="lab-inp">Consulta *</label>
						<div class="contact-input-wrap">
							<textarea value="" id="consultaContactInput" data-validate="required"></textarea>
						</div>						
					</fieldset>
					<p class="contact-input-wrap req">* Campos obligatorios</p>
					<div class="contact-input-wrap">
						<input type="submit" value="ENVIAR" id="enviarContactInput" class="btn btn-primary">
					</div>
					<div class="success" style="display:none">
						Su consulta ha sido enviada
					</div>
				</form>
		</div>
	</section>
</article>
<?php get_footer(); ?>