<?php get_header(); ?>
	<article id="main-article" class="home-page">
		<section class="jumbo jumbo-home">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-1.jpg" class="responsive unlimited jumbo-bg">
			<?php get_search_form(); ?>
			<div class="slider-multiple" id="home-slider-destinos">
				<div class="slider-multiple-wrap">
				<ul>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img1.jpg">
							<span>egresados</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img2.jpg">
							<span>argentina</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img3.jpg">
							<span>brasil</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img4.jpg">
							<span>internacional</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img5.jpg">
							<span>europa</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img6.jpg">
							<span>caribe</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img7.jpg">
							<span>eeuu</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="<?php bloginfo('template_url'); ?>/img/home/slide-destinos/img8.jpg">
							<span>uruguay</span>
						</a>
					</li>					
				</ul>
				</div>
			</div>
		</section>
		<section class="home-grey">
			<div class="wrap">
				<div class="home-grey-col grey-box">
					<h3>Promociones</h3>
					<div class="home-registracion">
					<?php show_post_content('registracion'); ?>
					</div>
				</div>
				<div class="home-grey-col grey-box">
					<h3>Testimonios</h3>
					<div class="testimonios">
						<ul>
							<li>
								<p>Susana Lopez</p>
								<p class="message">Estamos plenamente satisfechos con los servicios de "SETUR".	La organización y coordinación de las excursiones, los traslados 
								y diversas actividades fue excelente. Muchas gracias por el nivel 
								de profesionalismo y la cálida atención al cliente.!</p>
								<p class="date">Marzo 2015</p>
							</li>
						</ul>
					</div>
					
				</div>
			</div>
		</section>
		<section class="home-detacados">
			<div class="wrap-wide home-detacados-title">
				<h2><span class="icon icon-destacados-title"></span>Destinos destacados</h2>
			</div>
			<div class="wrap">
			<?php	$the_query = new WP_Query('category_name=destacados');
			if ( $the_query->have_posts() ) {
				echo '<ul class="row list-destinos">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
				<li class="col-4">
					<a href="<?php the_permalink(); ?>" rel="<?php the_ID();?>" >
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(),'destino-thumb'); ?>
					<img src="<?php echo $src[0]; ?>" class="responsive unlimited"/>
					<figcaption class="ld-caption">
						<h3><?php the_title(); ?></h3>
					</figcaption>
					<?php if(get_post_meta($post->ID, 'htmld_precio', true)){ ?>
					<div class="ld-price">
						<span><?php echo get_post_meta($post->ID, 'htmld_moneda', true).'</span> '.get_post_meta($post->ID, 'htmld_precio', true); ?>
					</div>
					<?php } ?>
					</a>
				</li>
			<?php	}
				echo '</ul>';			
			} else {
				echo '<h3>No se encuentran destinos para esta categoría.</h3>';
			}
			/* Restore original Post Data */
			wp_reset_postdata(); ?>

			</div>
		</section>

		<div class="wrap">
			<div class="slider-multiple" id="home-slider-companies">
				<div class="slider-multiple-wrap">
				<ul>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c1.png">
					</li>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c2.png">
					</li>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c3.png">
					</li>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c4.png">
					</li>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c5.png">
					</li>
					<li>
						<img src="<?php bloginfo('template_url'); ?>/img/home/slide-companies/c6.png">
					</li>
				</ul>
				</div>
			</div>
		</div>

	</article>
<?php get_footer(); ?>