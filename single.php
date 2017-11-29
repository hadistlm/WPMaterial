<?php get_header() ?>
	<div class="container">
		<div class="row">
			<div class="col l9 s9">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
				<blockquote><h4> <?php the_title() ?> </h4></blockquote>
				<p><em><?php the_time('l, F jS, Y'); ?></em></p>
				<div style="text-align: justify;"> <?php the_content(); ?></div>
				<hr>
				<?php comments_template(); ?>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
			</div>

			<div class="col l3 s3">
				<?php get_sidebar()?>
			</div>
		</div>
	</div>
<?php get_footer()?>