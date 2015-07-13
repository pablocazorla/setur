<?php
/*
 * Template name: Empresa
 */

get_header(); ?>

	<section class="page-container">
		<div class="banner">
			<img src="<?php bloginfo('template_directory'); ?>/images/header-page-contacto.jpg" alt="" />
		</div>
		<div class="clearfix"></div>
		
		<div class="container">
			<div class="main-container nohome">
				<div class="middle-page-content">
					<div class="bottom-sec">
						<div class="bottom-sec-left">
							<?php get_sidebar(); ?>
						</div>
						
						<?php while ( have_posts() ): the_post(); ?>
						<div class="bottom-sec-right page">
							<h3><?php the_title(); ?></h3>
							
							<div class="content-box less-margin">
								<div class="content-heading"><img src="<?php bloginfo('template_directory'); ?>/images/icon-empresa.png" alt="img" /><span>Nuestra Empresa</span></div>
								
								<?php the_content(); ?>
								
								<div class="clearfix"></div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>

<?php get_footer(); ?>