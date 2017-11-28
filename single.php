<?php get_header() ?>
	<div class="container">
		<div class="row">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
				<h4> <?php the_title() ?> </h4>
				<p><em><?php the_time('l, F jS, Y'); ?></em></p>

				<p> <?php the_content(); ?></p>
				<hr>
				<?php comments_template(); ?>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer()?>