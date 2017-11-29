<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo site_url(); ?>" class="brand-logo"><img src="<?php echo get_template_directory_uri()?>/images/logo.png"></a>
      <ul class="right hide-on-med-and-down">
        <?php wp_list_pages(array('title_li' => '')); ?>
      </ul>

      <div id="nav-mobile" class="side-nav">
	      <div class="row">
			<div class="col s12">
			  <blockquote>
				<h4 class="teal-text"><?php bloginfo('name'); ?></h4>
			  </blockquote>
			</div>
		  </div>

		  <div class="row">
		  	<div class="col s12">
			  	<ul>
		        	<?php wp_list_pages(array('title_li' => '')); ?>
		      	</ul>
	        </div>
		  </div>
      </div>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>