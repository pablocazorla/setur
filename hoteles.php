<?php
for($j=1; $j<=5; $j++){
	if($j == 1){
		$num = '';
	}else{
		$num = $j;
	}
?>

<?php if(get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true)){ ?>

<h2><?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true); ?></h2>

<?php
	$stars = get_post_meta($post->ID, 'htmld_hotel'. $num .'_estrellas', true);	
	for($i=1; $i<=5; $i++){
		if($i <= $stars){
			echo '<img src="'.get_bloginfo('template_directory').'/images/star-hover.png" alt="star" />';
		}else{
			echo '<img src="'.get_bloginfo('template_directory').'/images/star-icon.png" alt="star" />';
		}
	}
?>
<strong>URL:</strong> <?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_url', true); ?><br>

<hr>
Slide de fotos:
<div style="width:100px;">
<?php if(get_post_meta($post->ID, 'htmld_hotel_foto1', true)){ ?>
  <ul>
  	<?php for($f = 1; $f <= 5; $f++){
  		if($foto = get_post_meta($post->ID, 'htmld_hotel'. $num .'_foto'.$f, true)){ ?>

				<li><img src="<?php echo get_bloginfo('url').'/wp-content/uploads/hoteles/'.$foto; ?>" class="responsive" /></li>

			<?php }
		} ?>
  </ul>
<?php } ?>
</div>

<strong>descripcion/servicios:</strong><br>
<?php echo wpautop(get_post_meta($post->ID, 'htmld_hotel'. $num .'_descripcion', true)); ?>
<strong>ubicacion:</strong><br>
<?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_ubicacion', true); ?>

<div class="content-scroll">
<ul>

<li>
<div class="single-reservar-triff1">Mes</div>
<div class="single-reservar-triff2-1">Días de salida</div>
<div class="single-reservar-triff6"><img src="<?php bloginfo('template_directory'); ?>/images/two-person.png" alt="2 personas" /></div>
<div class="single-reservar-triff7"><img src="<?php bloginfo('template_directory'); ?>/images/3-person.png" alt="3 personas" /></div>
<div class="single-reservar-triff8"><img src="<?php bloginfo('template_directory'); ?>/images/4-person.png" alt="4 personas" /></div>
<div class="single-reservar-triff9"><img src="<?php bloginfo('template_directory'); ?>/images/2-person.png" alt="menores" /></div>
</li>
<?php if(get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1', true)){ ?>
<li>
<div class="single-reservar-triff1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1', true); ?></div>
<div class="single-reservar-triff2-1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1_dias', true); ?></div>
<div class="single-reservar-triff6"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1_doble', true); ?></div>
<div class="single-reservar-triff7"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1_triple', true); ?></div>
<div class="single-reservar-triff8"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1_cuadruple', true); ?></div>
<div class="single-reservar-triff9"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1_menor', true); ?></div>
</li>
<?php } ?>
<?php if(get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2', true)){ ?>
<li>
<div class="single-reservar-triff1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2', true); ?></div>
<div class="single-reservar-triff2-1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2_dias', true); ?></div>
<div class="single-reservar-triff6"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2_doble', true); ?></div>
<div class="single-reservar-triff7"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2_triple', true); ?></div>
<div class="single-reservar-triff8"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2_cuadruple', true); ?></div>
<div class="single-reservar-triff9"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes2_menor', true); ?></div>
</li>
<?php } ?>
<?php if(get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3', true)){ ?>
<li>
<div class="single-reservar-triff1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3', true); ?></div>
<div class="single-reservar-triff2-1"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3_dias', true); ?></div>
<div class="single-reservar-triff6"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3_doble', true); ?></div>
<div class="single-reservar-triff7"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3_triple', true); ?></div>
<div class="single-reservar-triff8"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3_cuadruple', true); ?></div>
<div class="single-reservar-triff9"><?php echo get_post_meta($post->ID, 'htmld_moneda', true); ?><?php echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes3_menor', true); ?></div>
</li>
<?php } ?>

</ul>
</div>
<div class="content-scroll-control">
<ul>
<li class="content-leftslide"><img src="<?php bloginfo('template_directory'); ?>/images/prev-arrow.png" alt="arrow"></li>
<li class="content-rightslide"><img src="<?php bloginfo('template_directory'); ?>/images/next-arrow.png" alt="arrow"></li>
</ul>
</div>

<?php $reservasLink = get_permalink( get_page_by_title( 'Reservas' ) );?>
<a href="<?php echo $reservasLink; ?>/?id=<?php echo base64_encode(get_the_title().'#'.get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true)); ?>">reservar</a>


<?php } ?>
<?php } ?>
