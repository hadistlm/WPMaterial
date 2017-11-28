<?php get_header();?>

	<div class="container">
		<div class="row">
			<div class="col l9 s9">
				<h4 class="center-align teal-text">Blog</h4>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<blockquote style="text-align:justify;">
						<p>&nbsp; <?php echo wp_trim_words( get_the_content(), 40, ' ...' ); ?> </p>
						<p><em><?php the_time('l, F jS, Y'); ?></em></p>
					</blockquote>
				<?php endwhile; else: ?>
	      			<p><?php _e('Sorry, there are no posts.'); ?></p>
	    		<?php endif; ?>
			</div>

			<div class="col l3 s3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer();?>