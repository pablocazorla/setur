<?php get_header(); ?>
CATEGORY_PHP

<?php wp_nav_menu( array('menu' => 'paquetes','container' => false)); ?>	

<h1><span><?php single_cat_title(); ?></span></h1>

	<div class="destinos">
<ul>

<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<div class="destinos-img">				
				<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium'); ?>
				<img src="<?php echo $src[0]; ?>" class="responsive"/>
			<div class="destinos-text">
				<div class="destinos-price"><?php echo get_post_meta($post->ID, 'htmld_moneda', true).''.get_post_meta($post->ID, 'htmld_precio', true); ?></div>
				<h3><?php the_title(); ?></h3> 
				<div class="destinos-more">más</div>
			</div>
		</div></a>
	</li>
<?php
endwhile;
else :
	echo '<li>No hay paquetes en esta categoría.</li>';
endif;
?>

</ul>







<?php get_footer(); ?>