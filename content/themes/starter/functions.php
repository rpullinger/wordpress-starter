<?php

// Require chester
require_once(dirname(__FILE__).'/lib/chester/require.php');



/*
Header menu - Register one header menu
 */
function register_header_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );


/*
Register a dynamic sidebar
 */
function register_sidebar() {
	register_sidebar(array(
	    'before_widget' => '<div class="l-sidebar-widget"><div class="sidebar-widget">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h2 class="title">',
	    'after_title' => '</h2>',
	));
}
add_action( 'init', 'register_sidebar' );


/*
Add support for post thumbnails
 */
add_theme_support( 'post-thumbnails' ); 


/*
Make it easier to responsify post embeds
 */
function modify_embed_output($html){
	
	// Pattern for removing width and height attributes
	$attr_pattern = '/(width|height)="[0-9]*"/i';
	$whitespace_pattern = '/\s+/';
	$embed = preg_replace($attr_pattern, "", $html);
	$embed = preg_replace($whitespace_pattern, ' ', $embed); // Clean-up whitespace
	$embed = trim($embed);

	// Add container
	$html = "<p class='post-embed'>$embed</p>\n";
	
	return $html;
}
add_filter('embed_oembed_html', 'modify_embed_output');


/*
Clean up images added to the editor
 */
function remove_thumbnail_dimensions($html){

    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    $html = "<div class='news-image'>$html</div>\n";
    return $html;
}
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );


/*
Add Home page bag to menu
 */
function home_page_menu_args( $args ) {
	$args['show_home'] = 'Home';
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

?>