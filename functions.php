<?php
/***********************************************
* REMOVE ADMIN BAR
***********************************************/
add_filter('show_admin_bar', '__return_false');
/***********************************************
* MENUS
***********************************************/
if ( function_exists( 'add_theme_support' ) ){
    add_theme_support( 'nav-menus' );
	register_nav_menus(array(
		'main_left' => 'Menú a la izquierda del logo',
        'main_right' => 'Menú a la derecha del logo',
        'paquetes' => 'Menú de paquetes (categorías de destinos)',
        'main_footer' => 'Menú del footer'
    ));
}

/***********************************************
* POST THUMBNAILS
***********************************************/
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

/* Custom image sizes */
add_image_size( 'destino-thumb', 400, 280, array( 'center', 'top' ) );
/*add_image_size( 'custom-medium', 1200, 10000, false);
add_image_size( 'custom-large', 1880, 15000, false);*/

/* URL THUMBNAILS */
function url_thumbnail($id, $tamagno){
	$src = wp_get_attachment_image_src( $id , 'medium');
	echo $src[0];
}

// Override img caption shortcode to fix 10px issue.
function fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="max-width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

/***********************************************
* CUSTOM LENGTH EXCERPT
***********************************************/
function custom_excerpt_length( $length ) {
    global $post;
    if ($post->post_type == 'post'){
        return 14;
    } else if ($post->post_type == 'illustration'){
        return 50;
    }
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**********************************************
* To remove <p> before category description
**********************************************/
remove_filter('term_description','wpautop');

/***********************************************
* SIDEBAR
***********************************************/
function sidebar_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar( array(
        'name' => 'Primary Widget',
        'id' => 'primary-widget-area',
        'description' => 'The primary widget area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'Secondary Widget',
        'id' => 'secondary-widget-area',
        'description' => 'The secondary widget area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sidebar_init' );
add_theme_support( 'html5', array( 'search-form' ) );


/***********************************************
* Show post content
***********************************************/
function show_post_content($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}

// Dependencies
function setur_dependencies(){
    // CSS
    wp_enqueue_style( 'ubuntu_fonts', 'http://fonts.googleapis.com/css?family=Ubuntu:400,700,300,300italic', array(), '1');
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css', array(), '1');

    wp_enqueue_style( 'style', get_stylesheet_uri());

    // JS
    wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/libs/html5-3.4-respond-1.1.0.min.js', array(), '1');
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    
    wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ),'1' );    
}

add_action( 'wp_enqueue_scripts', 'setur_dependencies' );

?>