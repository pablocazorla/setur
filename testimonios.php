<!--
	<li>
		<p>Susana Lopez</p>
		<p class="message">Estamos plenamente satisfechos con los servicios de "SETUR".	La organización y coordinación de las excursiones, los traslados 
		y diversas actividades fue excelente. Muchas gracias por el nivel 
		de profesionalismo y la cálida atención al cliente.!</p>
		<p class="date">Marzo 2015</p>
	</li>
-->
<?php	$the_query = new WP_Query('post_type=testimonio');
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
	<li>

		<?php $cont = get_the_content(); 
			$cont = mb_strimwidth($cont, 0, 200, "...");
			$date = get_the_excerpt(); 
			$date = mb_strimwidth($date, 0, 20, "");
			?>



		<div class="tit"><?php the_title(); ?></div>
		<div class="message"><?php echo $cont; ?></div>
		<div class="date"><?php echo $date; ?></div>
	</li>
<?php	}
	echo '</ul>';			
} else {
	echo '<ul><li></li></ul>';
}
wp_reset_postdata(); ?>