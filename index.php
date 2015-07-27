<?php get_header(); ?>
	<article id="main-article" class="home-page">
		<section class="jumbo jumbo-home">
			<img src="<?php bloginfo('template_url'); ?>/img/landscape-1.jpg" class="responsive unlimited jumbo-bg">
			<?php get_search_form(); ?>
			<div class="slider-multiple" id="home-slider-destinos">
				<div class="slider-multiple-wrap">
				<ul>
					<?php
					function slideContent($catName,$imgName,$po){
						if($po=='post'){
							$p = get_page_by_title('Camboriu');
							$catLink = get_page_link($p->ID);
						}else{
							$catId = get_cat_ID($catName);
							$catLink = get_category_link($catId);
						}						
						$src = get_bloginfo('template_url') . '/img/home/slide-destinos/'.$imgName.'.jpg';
						return array(
								'name' => $catName,
								'href' => $catLink,
								'src' => $src
							);
					}

					$list = array(
						's1' => slideContent('Egresados','img1','post'),
						's2' => slideContent('Argentina','img2','cat'),
						's3' => slideContent('Brasil','img3','cat'),
						's4' => slideContent('Internacional','img4','cat'),
						's5' => slideContent('Europa','img5','cat'),
						's6' => slideContent('Caribe','img6','cat'),
						's7' => slideContent('EEUU','img7','cat'),
						's8' => slideContent('Uruguay','img8','cat')
						);
					$listCount = count($list);

					for($j = 1; $j <= $listCount; $j++){
						$item = $list['s'.$j];
					?>
					<li>
						<a href="<?php echo $item['href'];?>">
							<img src="<?php echo $item['src'];?>">

							<span><?php echo $item['name'];?></span>
						</a>
					</li>
					<?php } ?>
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
				<div class="home-grey-col grey-box home-box-testimonios testimonios-container">
					<h3>Testimonios</h3>
					<div class="testimonios">
						<?php include 'testimonios.php';?>
						<div class="testimonios-arrow testimonios-prev"><span></span></div>
						<div class="testimonios-arrow testimonios-next"><span></span></div>
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