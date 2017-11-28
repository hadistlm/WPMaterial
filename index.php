<?php get_header();

if (have_posts()){
	while (have_posts()) {
	    the_post();
	    the_content();
	}
}else{
?>
	<div class="card-panel red darken-1">
      <span class="blue-text text-darken-2"> Oops!, the page you're looking isn't exist </span>
    </div>
<?php 
}
get_footer(); ?>
