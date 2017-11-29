<?php

/*
 * ======================================================
 * 					JS Plugins
 * ======================================================
 */

//jQuery Plugins
function wpmaterial_scripts_with_jquery()
{
	wp_register_script('custom-script', get_template_directory_uri().'/js/jquery-3.2.1.min.js', array('jquery'));
	wp_enqueue_script('custom-script');
}
add_action( 'wp_enqueue_scripts', 'wpmaterial_scripts_with_jquery');

//Framework JS
function wpmaterial_script_framework()
{
	wp_register_script('custom_frame', get_template_directory_uri().'/js/materialize.min.js', array('jquery'));
	wp_enqueue_script('custom_frame');
}
add_action('wp_enqueue_scripts', 'wpmaterial_script_framework');


//init function JS
function wpmaterial_script_init()
{
	wp_register_script('custom_init', get_template_directory_uri().'/js/init.js', array('jquery'));
	wp_enqueue_script('custom_init');
}
add_action('wp_enqueue_scripts', 'wpmaterial_script_init');

/*
 * ======================================================
 * 					Widgets Init
 * ======================================================
 */
 
function wpmaterial_widgets_init()
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpmaterial' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div class="row"><div id="%1$s" class="widget %2$s"><div class="col s12 l12"><div class="card-panel center-align">',
		'after_widget'  => '</div></div></div></div>',
		'before_title'  => '<div class="teal lighten-2 pad"><span class="white-text"><h5>',
		'after_title'   => '</h5></span></div>',
   	));
	//First Footer
	register_sidebar(array(
		'name'          => __( 'Footer 1', 'wpmaterial' ),
		'id'            => 'footer-first',
		'description'   => __( 'First footer column', 'wpmaterial' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="white-text">',
		'after_title'   => '</h5>',
	));

	//Second Footer
	register_sidebar( array(
	    'name'          => __( 'Footer 2', 'wpmaterial' ),
	    'description'   => __( 'Second footer column', 'wpmaterial' ),
	    'id'            => 'footer-second',
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h5 class="white-text">',
		'after_title'   => '</h5>',
    ));

	// Third Footer 
	register_sidebar( array(
	    'name'          => __( 'Footer 3', 'wpmaterial' ),
	    'description'   => __( 'Third footer column', 'wpmaterial' ),
	    'id'            => 'footer-third',
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h5 class="white-text">',
		'after_title'   => '</h5>',
	));
}
add_action( 'widgets_init', 'wpmaterial_widgets_init' );

?>