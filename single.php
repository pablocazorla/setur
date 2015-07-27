<?php get_header(); ?>
<article id="main-article" class="detail-page">
		<section class="jumbo jumbo-category">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-2.jpg" class="responsive unlimited jumbo-bg">
			<div class="wrap"><?php get_search_form(); ?></div>
		</section>
		<div class="wrap top-shadow">
			<img src="<?php bloginfo('template_url'); ?>/img/top-shadow.png" class="responsive">
		</div>
		<section class="wrap section-detail">
			<div class="section-col left">
				<?php get_sidebar(); ?>
			</div>
			<div class="section-col right">
				<?php while ( have_posts() ): the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div class="clearfix destino-summary">
					<div id="detail-contact">
						<h3 class="detail-contact-h3-1"><span class="icon icon-detail-contact"></span>Envianos<br>tu consulta</h3>
						<h3 class="detail-contact-h3-2">Enseguida te<br>contactaremos</h3>
						<p class="detail-contact-text-1">fácil y rápido, sacate tus dudas!!</p>
						<p class="detail-contact-text-2">Sólo faltan tus datos</p>
						<?php include 'contact-form.php';?>
						<button class="btn-continuar">Continuar</button>
					</div>
					<div class="slider" id="detail-slider">
						<ul>
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
								echo '<li style="left:0"><img src="'.$src[0].'" class="responsive unlimited"/></li>';

								if(class_exists('Dynamic_Featured_Image') ) {
									global $dynamic_featured_image;
									$featured_images = $dynamic_featured_image->get_featured_images( $postId );
									$length = count($featured_images);
									
									if($length >0){							
										for($j = 0;$j < $length;$j++ ){
											$src = $featured_images[$j]['full'];
											echo '<li><img src="'.$src.'" class="responsive unlimited"/></li>';
										}
									}
								}
							?>
						</ul>
						<div class="arrow arrow-left" style="display: none;"></div>
						<div class="arrow arrow-right"></div>
					</div>					
				</div>

				<section class="destino-content">
					<h3 class="destino-title"><span class="icon icon-content"></span>Detalles</h3>
					<div class="destino-content-box"><?php the_content(); ?></div>
				</section>
				<!--
				Desde 
				<?php echo get_post_meta($post->ID, 'htmld_moneda', true).''.get_post_meta($post->ID, 'htmld_precio', true); ?>

				<a href="<?php bloginfo('url'); ?>/reservar/?id=<?php echo base64_encode(get_the_title().'#No definido'); ?>">reservar</a>

				<hr>
				Transporte<br>
				<strong>Clase</strong> <?php echo get_post_meta($post->ID, 'htmld_transporte_clase', true); ?><br>
				<strong>Empresa</strong> <?php echo get_post_meta($post->ID, 'htmld_transporte_empresa', true); ?><br>
				<br>
				Detalles<br>
				<strong>Duración</strong> <?php echo get_post_meta($post->ID, 'htmld_duracion', true); ?><br>
				<strong>Menores</strong><?php echo get_post_meta($post->ID, 'htmld_menores', true); ?><br>
				<strong>Salidas</strong> <?php echo get_post_meta($post->ID, 'htmld_salidas', true); ?><br>
				<strong>Desde</strong> <?php echo get_post_meta($post->ID, 'htmld_desde', true); ?><br>
			-->				
				<?php // HOTELES
					include('hoteles.php');
				?>
				<?php endwhile; ?>				
			</div>
		</section>
</article>
<?php get_footer(); ?>











