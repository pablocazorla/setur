<!doctype HTML>
<!--[if IE 7]>    <html class="ie7 ie-lt-8 ie-lt-9 ie-lt-10" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie-lt-9 ie-lt-10" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 ie-lt-10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="es"> <!--<![endif]-->
<head>	
	<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	echo ", $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' - ' . sprintf( 'Page %s', max( $paged, $page ) );
	?></title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="resource-type" content="document" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="es-ar" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />	
	<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url'); ?>"></script>
	<script type="text/javascript">
		ltIE9 = true;
	</script>
	<![endif]-->
	<script type="text/javascript">
		baseURL = "<?php bloginfo( 'url' ); ?>";
		baseTemplateURL = "<?php bloginfo('template_url'); ?>";
	</script>	
	<?php wp_head(); ?>	
</head>
<body>
	<header id="main-header">
		<a href="<?php bloginfo( 'url' ); ?>" id="main-brand" class="brand">
			<img src="<?php bloginfo('template_url'); ?>/img/setur-logo.png" class="img-responsive">
		</a>
		<div class="wrap">
			<menu id="main-menu" class="clearfix">
				<?php wp_nav_menu( array('theme_location' => 'main_left','container' => false, 'menu_class' => 'clearfix main-menu-left')); ?>				
				<?php wp_nav_menu( array('theme_location' => 'main_right','container' => false, 'menu_class' => 'clearfix main-menu-right')); ?>
			</menu>
		</div>	
	</header>