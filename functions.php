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
 * 					Theme Supprot
 * ======================================================
 */

//Register Custom Header
$defaults = array(
    'default-image' => '',
    'random-default' => false,
    'width' => 1920,
    'height' => 1280,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
    'video' => false,
    'video-active-callback' => 'is_front_page'
);
add_theme_support( 'custom-header', $defaults );

//Register custom bg
$data = array(
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'default-color' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
);

//Register Custom COmments sec
function coment_arg(){
	$comments_args = array(
	    'label_submit'=>'Submit',
	    'class_submit'=>'btn waves-effect waves-light extmar',
	    'title_reply'=>'Leave a Comment',
	    'comment_notes_after' => '',
	    'comment_field' => ' 
	        <div class="input-field col s12"><textarea class="materialize-textarea" placeholder="Comments" rows="10" id="comment" name="comment" aria-required="true"></textarea></div>',
	    'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' =>
			    '<div class="input-field col s6">' .
			    '<input class="form-control floating-label" placeholder="Name" id="author" name="author" type="text" size="30" aria-required="true" /></div>',

			'email' =>
			    '<div class="input-field col s6">' .
			    '<input class="validate" placeholder="Email" id="email" name="email" type="text" size="30" aria-required="true"/></div>',

			'url' =>
			    '<div class="input-field col s12">'.
			    '<input class="form-control floating-label" placeholder="Website" id="url" name="url" type="text" size="30" /></div>'
			)
		),
	);

	return $comments_args;
}


add_theme_support( 'custom-background', $data );

//register dynamic menus
register_nav_menus(array(
    'primary' => __('Primary Menu', 'wpmaterial')
));

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

	//Widget Home page
	register_sidebar(array(
		'name' 			=> esc_html__( 'Main 1', 'wpmaterial' ),
		'id'            => 'main-menu-one',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="center">',
		'after_title'   => '</h5>',
	));

	//Widget Home page
	register_sidebar(array(
		'name' 			=> esc_html__( 'Main 2', 'wpmaterial' ),
		'id'            => 'main-menu-two',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="center">',
		'after_title'   => '</h5>',
	));

	//Widget Home page
	register_sidebar(array(
		'name' 			=> esc_html__( 'Main 3', 'wpmaterial' ),
		'id'            => 'main-menu-third',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="center">',
		'after_title'   => '</h5>',
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