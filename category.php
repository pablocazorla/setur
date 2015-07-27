<?php get_header(); ?>
<article id="main-article" class="category-page">
		<section class="jumbo jumbo-category">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-2.jpg" class="responsive unlimited jumbo-bg">
			<div class="wrap"><?php get_search_form(); ?></div>
		</section>
		<div class="wrap top-shadow">
			<img src="<?php bloginfo('template_url'); ?>/img/top-shadow.png" class="responsive">
		</div>
		<section class="wrap section-category">
			<div class="section-col left">
				<div class="category-menu-container">
					<h3>Paquetes</h3>
				<?php wp_nav_menu( array('menu' => 'paquetes','container' => false)); ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
			<div class="section-col right">
				<h1><span class="icon icon-category-title"></span> <?php single_cat_title(); ?></h1>
				<ul class="row list-destinos">
				<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
					<li class="col-4">
						<a href="<?php the_permalink(); ?>" rel="<?php the_ID();?>" >
						<?php $src_a = wp_get_attachment_image_src( get_post_thumbnail_id(),'destino-thumb'); 
							$src = $src_a[0];
							if(!$src){
								$src = get_bloginfo('template_url') . '/img/default-thumbnail.jpg';
							}
						?>
						<img src="<?php echo $src; ?>" class=""/>
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
				<?php
				endwhile;
				else :
					echo '<li class="col-12"><h3>No se encuentran destinos para esta categoría.</h3></li>';
				endif;
				?>
				</ul>
				<nav class="pagination"><?php echo paginate_links(array('prev_text' => '','next_text' => '')); ?></nav>
				
			</div>
		</section>
</article>
<?php get_footer(); ?>