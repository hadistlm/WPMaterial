<?php /* Template Name: Payments */ ?>

<?php get_header() ?>

<?php 
global $wp, $wpdb;

$current_url = home_url(add_query_arg(array(),$wp->request));
$id = explode('/', $current_url);

$user_id = get_current_user_id();
$user = get_userdata( $user_id );

$myrows = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE (post_Id =".$id[6]." AND meta_key='_order_total')");
$data = $wpdb->get_results( "SELECT payments FROM wp_payments WHERE payments_id=".$id[6]);
$bacs = $wpdb->get_results("SELECT * FROM wp_options WHERE option_name='woocommerce_bacs_accounts'");

$ext = explode('.', $myrows[0]->meta_value);
$rev = explode('"', $bacs[0]->option_value);

foreach ($data as $value) {
	$sum += $value->payments;
}

$jml = (int)$ext[0] - $sum;

?>
	<div class="container">
		<div class="row">
			<div class="col l12">
				<h1><?php the_title() ?> for #<?php echo $id[6] ?></h1>
				<p> Your Remaining Payments : <?php do_action( 'curformat', $jml ); ?></p>

				<form class="woocommerce-EditAccountForm edit-account" action="" method="post" enctype="multipart/form-data">
					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
					</p>
					<div class="clear"></div>

					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
					</p>

					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="date"> Date <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input input-text datepicker" name="date" id="date">
					</p>

					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="payment"> Your Amount <span class="required">*</span></label>
						<div class="row">
							<span class="col l1">Rp.</span>
							<span class="col l11"><p class="range-field"><input type="range" id="payment" name="pay" min="0" max="<?= $jml ?>" /></p></span>
						</div>
					</p>

					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="back-acc"> Bank Account <span class="required">*</span></label>
						<select name="bank" class="woocommerce-Input input-text" id="back-acc">
						 	<option value="<?php echo $rev[7]; ?>"> <?php echo $rev[11]; ?> </option>
						 	<option value="<?php echo $rev[31]; ?>"> <?php echo $rev[35]; ?> </option>
						 	<option value="<?php echo $rev[55]; ?>"> <?php echo $rev[59] ?> </option>
						</select>
					</p>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<div class="file-field input-field">
					      <div class="btn">
					        <span>Transfer Note</span>
					        <input type="file" name="fileToUpload" id="fileToUpload">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>
					</p>

					<?php if ( $sum < (int)$ext[0]) : ?>
						<button type="submit" name="submit" class="btn">Submit</button>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
	

<?php
	if ( isset( $_POST["submit"] ) ) {
		global $wpdb;	
	   	$table = $wpdb->prefix."payments";

	   	$name 	= $_POST["account_first_name"];
	   	$last 	= $_POST["account_last_name"];
	   	$email 	= $_POST["account_email"];
	   	$pay 	= $_POST["pay"];
	   	$date 	= $_POST["date"];
	   	$bacaccount = $_POST['bank'];

	   	$data = array( 
	  	    'first_name' 	=> $name,
	  	    'last_name'		=> $last,
	  	    'user_email'	=> $email,
	  	    'payments'		=> $pay,
	  	    'date'			=> $date,
	  	    'bank_account'	=> $bacaccount,
	  	    'payments_id'	=> $id[6]
	   	);

	   	if (!empty($pay) && $pay <= $jml) {
	   		$status = $wpdb->insert($table, $data);	
	   	}

	   	//Upload Transfer Note
	   	if (!empty($_FILES['fileToUpload'])) {
	   		$uploaddir = ABSPATH.'wp-content/uploads/images/'; 
			$file = $uploaddir . substr(md5(rand()), 0, 7) . basename($_FILES['fileToUpload']['name']); 
			$separator = explode("/", $file);

			if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file)) { 
			    $upload = array(
			    	'payments_id' => $id[6],
			    	'transfer_note' => $separator[4]
			    );

			    $wpdb->insert('wp_payments_status', $upload);
			}
	   	}

	   	// Check this on the future #Redirect kehalaman sebelumnya
	   	if ($status == 1) {
	   		redirect(site_url()."/my-account/orders");	
	   	}
	}
?>

<?php get_footer() ?>