<?php get_header();?>
<article id="main-article" class="page">
	<section class="jumbo jumbo-category">
		<img src="<?php bloginfo('template_url'); ?>/img/landscape-2.jpg" class="responsive unlimited jumbo-bg">
		<div class="wrap"><?php get_search_form(); ?></div>
	</section>
	<div class="wrap top-shadow">
		<img src="<?php bloginfo('template_url'); ?>/img/top-shadow.png" class="responsive">
	</div>
	<section class="wrap section-page">
		<div class="section-col left">
			<?php get_sidebar(); ?>
		</div>
		<div class="section-col right">
			<?php while ( have_posts() ): the_post(); ?>
			<div class="the-content">
				<h1><?php the_title();?></h1>	
				<?php the_content(); ?>				
			</div>
			<?php endwhile; ?>		
		</div>
	</section>
</article>
<?php get_footer(); ?>