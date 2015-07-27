<?php
for($j=1; $j<=5; $j++){
	if($j == 1){
		$num = '';
	}else{
		$num = $j;
	}
?>

<?php if(get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true)){ ?>

<?php $hotel_name = get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true); ?>

<div class="clearfix hotel" id="hotel-<?php echo $hotel_name; ?>">
	<div class="hotel-col-left">
		<div class="clearfix">
			<div class="rating">
				<?php
					$stars = get_post_meta($post->ID, 'htmld_hotel'. $num .'_estrellas', true);	
					for($i=1; $i<=5; $i++){
						if($i <= $stars){
							echo '<span class="icon star full"></span>';
						}else{
							echo '<span class="icon star"></span>';
						}
					}
				?>
			</div>
			<h3 class="destino-title"><span class="icon icon-hotel"></span><?php echo $hotel_name; ?></h3>
		</div>
		<div class="hotel-url">
			<a href="<?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_url', true); ?>" target="_blank" class="url"><?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_url', true); ?></a>
		</div>
		<div class="slider slide-hotel">
		<?php if(get_post_meta($post->ID, 'htmld_hotel_foto1', true)){ ?>
		  <ul>
		  	<?php 
		  	$first = true;
		  	for($f = 1; $f <= 5; $f++){
		  		if($foto = get_post_meta($post->ID, 'htmld_hotel'. $num .'_foto'.$f, true)){ 
		  			if($first){
		  				$first = false;
		  				echo '<li style="left:0%">';
		  			}else{
		  				echo '<li>';
		  			}
		  			?>

						<img src="<?php echo get_bloginfo('url').'/wp-content/uploads/hoteles/'.$foto; ?>" class="responsive" />

					<?php echo '</li>';
					}
				} ?>
		  </ul>
		  <div class="slide-paginator" style="display: none;"></div>
		<?php } ?>
		</div>
	</div>
	<div class="hotel-col-right">
		<div class="clearfix hotel-description">
			<div class="hotel-description-col-left">
				<h4>Descripción / Servicios</h4>
				<?php echo wpautop(get_post_meta($post->ID, 'htmld_hotel'. $num .'_descripcion', true)); ?>
			</div>
			<div class="hotel-description-col-right">
				<h4>Ubicación</h4>
				<?php echo get_post_meta($post->ID, 'htmld_hotel'. $num .'_ubicacion', true); ?>
			</div>
		</div>
		<?php if(get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes1', true)){ ?>
		<table class="hotel-precios">
			<thead>
				<tr>
					<th>Mes</th>
					<th>Días de salida</th>
					<th><span class="icon icon-p icon-2p"></span></th>
					<th><span class="icon icon-p icon-3p"></span></th>
					<th><span class="icon icon-p icon-4p"></span></th>
					<th><span class="icon icon-p icon-0p"></span></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$moneda = get_post_meta($post->ID, 'htmld_moneda', true);
		  	for($m = 1; $m <= 3; $m++){
		  		if(get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m, true)){
		  			echo '<tr>';
		  				echo '<td>';
		  				echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m, true);
		  				echo '</td>';
		  				echo '<td>';
		  				echo get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m.'_dias', true);
		  				echo '</td>';
		  				echo '<td>';
		  				echo $moneda . get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m.'_doble', true);
		  				echo '</td>';
		  				echo '<td>';
		  				echo $moneda . get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m.'_triple', true);
		  				echo '</td>';
		  				echo '<td>';
		  				echo $moneda . get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m.'_cuadruple', true);
		  				echo '</td>';
		  				echo '<td>';
		  				echo $moneda . get_post_meta($post->ID, 'htmld_hotel'. $j .'_mes'.$m.'_menor', true);
		  				echo '</td>';
		  			echo '</tr>';
					}
				} ?>
			</tbody>
		</table>
		<?php } ?>
		<div class="hotel-actions">
			<?php $reservasLink = get_permalink( get_page_by_title( 'Reservas' ) );
				$thisLink = get_permalink() . '#hotel-' . $hotel_name;
			?>
			<a href="">Consultar <span class="icon icon-hotel-actions icon-hotel-consultar"></span></a>
			<a href="<?php echo $reservasLink; ?>/?id=<?php echo base64_encode(get_the_title().'#'.get_post_meta($post->ID, 'htmld_hotel'. $num .'_nombre', true).'#'.$thisLink); ?>">Reservar <span class="icon icon-hotel-actions icon-hotel-reservar"></span></a>
		</div>
	</div>
</div>
<?php } ?>
<?php } ?>
