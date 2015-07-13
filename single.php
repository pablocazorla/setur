<?php get_header(); ?>


<?php while ( have_posts() ): the_post(); ?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

<hr>
Dynamic_Featured_Image
<?php
	if(class_exists('Dynamic_Featured_Image') ) {
		global $dynamic_featured_image;
		$featured_images = $dynamic_featured_image->get_featured_images( $postId );

		if($img = $featured_images[0]['full']){
			echo '<img src="'.$img.'" class="show wp-post-image" alt="">';
		}else{
			the_post_thumbnail('full',array('class' => "show"));
		}
	}
?>
<hr>

Desde 
<?php echo get_post_meta($post->ID, 'htmld_moneda', true).''.get_post_meta($post->ID, 'htmld_precio', true); ?>

<a href="<?php bloginfo('url'); ?>/reservar/?id=<?php echo base64_encode(get_the_title().'#No definido'); ?>">reservar</a>

<hr>
Imagenes attachadas
<ul>
	<?php
		$exclude = get_post_thumbnail_id().','.$featured_images[0]['attachment_id'];
		$attachments = get_children(array('post_parent' => $post->ID,
								'post_status' => 'inherit',
								'post_type' => 'attachment',
								'post_mime_type' => 'image',
								'order' => 'ASC',
								'orderby' => 'menu_order ID',
								'exclude' => $exclude) //excluye las 2 featured (listados y titular del paquete)
								);

		foreach($attachments as $att_id => $attachment) {
			$full_img_url = wp_get_attachment_image_src($attachment->ID,'full');
			$full_img_url_thumb = wp_get_attachment_image_src($attachment->ID,'medium');
			
			echo '<li><a href="'.$full_img_url_thumb[0].'" class="colorbox"><img src="'.$full_img_url_thumb[0].'" /></a></li>';
		}
	?>	
</ul>
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

<hr>
HOTELES
<?php include('hoteles.php'); ?>
<hr>

<?php endwhile; ?>						

<?php get_footer(); ?>