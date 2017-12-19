<?php get_header(); ?>
<?php $query = new WP_Query( array('post_type' => 'food_review', 'posts_per_page' => 5 ) ); ?>
	
  <div class="container">
	<div class="row">
	  <div class="col l9 s9">

	  	<?php if (get_the_title() == 'Food Reviews'): ?>
	  		<h4 class="center-align teal-text"><?php the_title(); ?></h4>

	  		<?php 
				if (!empty($query)) : while ( $query->have_posts() ) : $query->the_post() ;?>
 				<div class="card-panel">
					<div class="row">
						<div class="col s11 l11">
							<h5 class="extmar"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<blockquote style="text-align:justify;">
								<p>&nbsp; <?php echo wp_trim_words( get_the_content(), 40, ' ...' ); ?> </p>
								<p><em><?php the_time('l, F jS, Y'); ?></em></p>
							</blockquote>		
						</div>
					</div>
				</div>
 			<?php endwhile;endif;?>

	  	<?php else: ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h4 class="center-align teal-text"><?php the_title(); ?></h4>
			  	<p> <?php the_content(); ?> </p>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	  </div>
	  <div class="col l3 s3">
	  	<?php get_sidebar(); ?>
	  </div>
	</div>
   </div>

<?php get_footer(); ?>