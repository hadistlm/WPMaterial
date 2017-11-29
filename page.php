<?php get_header(); ?>
	
  <div class="container">
	<div class="row">
	  <div class="col l9 s9">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h4 class="center-align teal-text"><?php the_title(); ?></h4>
		  	<p> <?php the_content(); ?> </p>
		<?php endwhile; else: ?>
			<p><?php _e('Sorry, this page does not exist.'); ?></p>
		<?php endif; ?>

	  </div>
	  <div class="col l3 s3">
	  	<?php get_sidebar(); ?>
	  </div>
	</div>
   </div>

<?php get_footer(); ?>