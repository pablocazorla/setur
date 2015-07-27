<?php
/*
 *  Template name: Empresa
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
	<section class="wrap section-empresa">
		<div class="section-col left">
			<?php get_sidebar(); ?>
		</div>
		<div class="section-col right">
			<h1><span class="icon icon-empresa-title"></span><?php the_title();?></h1>
			<h2><span>Setur Viajes</span></h2>
			<div class="row">
				<div class="col-6">
					<div class="empresa-intro">
						<p>Hace cinco años nacimos con un sueño, el de posicionarnos como una empresa prestigiosa de turismo a nivel nacional e internacional, ofreciendo la mejor calidad de servicios turísticos. Acompañando a nuestros clientes a lo largo del servicio, transformando de esta manera, sus necesidades en soluciones, así lograr un compromiso de preferencia por nuestra empresa a largo plazo.</p>
						<p>Hoy después de 5 años, gracias a estratégicas alianzas con prestadores especializados en cada punto de tu viaje, transporte de última generación, hoteles en inmejorables ubicaciones, discotecas de primer nivel, la mejor asistencia médica, y el mejor grupo humano, profesionales tanto en el área de atención y venta, como también en logística de trabajo, personal joven, con vasta experiencia en turismo, experimentados coordinadores para grupos de jóvenes quienes realizan su labor con absoluto profesionalismo, hacen que SETUR viajes preste servicios turísticos para egresados de alta calidad. Logrando de esta manera que tus vacaciones sean únicas, reales e inolvidables.</p>
						<p>Colegios de la capital, como del interior de nuestro país, jóvenes, comisiones de padres y educadores quienes dieron confianza en nuestra empresa.</p>
					</div>
					<img src="<?php bloginfo('template_url'); ?>/img/empresa/1.jpg" class="responsive unlimited empresa-img-1">
					<h3>Visión</h3>
					<p>Difundir nuestra filosofía y liderazgo como la empresa líder en el mercado turístico, en todo el territorio nacional y en el mundo. Mediante un modelo de gestión orientado a la creación permanente de valor para nuestros clientes, nuestros accionistas, nuestros empleados y para el país.</p>
				</div>
				<div class="col-6">
					<img src="<?php bloginfo('template_url'); ?>/img/empresa/2.jpg" class="responsive unlimited empresa-img-2">
					<h3>Valores</h3>
					<h4>Misión SETUR VIAJES</h4>
					<p>Posicionarnos como una de las más prestigiosas agencias de viajes a nivel nacional e internacional, ofreciendo la mejor calidad del servicio.</p>
					<h4>Liderazgo</h4>
					<p>Practicamos el LIDERAZGO basado en la confianza, reconocemos el valor de cada persona y lo que esta puede generar, estimulamos la participación, intercambio de ideas y puntos de vista. Nuestros líderes estimulan un ambiente de trabajo en el cual la dignidad de la gente, la alegría en el trabajo y las emociones sean tomadas en cuenta.</p>
					<h4>Integridad</h4>
					<p>Tenemos el compromiso de hacer las cosas bien desde el principio, al ser sinceros con nuestros clientes y transparentes en el manejo de nuestras operaciones. DINAMISMO siendo proactivos y actuando con flexibilidad, nos anticipamos y nos adaptamos a los cambios, estimulamos y apoyamos el trabajo en equipo, abordamos los trabajos y retos como unidades sinérgicas basándonos en una visión compartida, inspirados en el lema “en la unión esta la fuerza”.</p>
					<h4>Fortaleza</h4>
					<p>El equilibrio entre la prudente toma de decisiones y la osadía de la innovación son  nuestra verdadera fortaleza</p>
				</div>
			</div>













		</div>
	</section>
</article>
<?php get_footer(); ?>