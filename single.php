<?php get_header() ?>
	<div class="container">
		<div class="row">
			<div class="col l9 s9">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="card-panel">
					<div class="row">
						<div class="col s12 l12">
							<blockquote><h4> <?php the_title() ?> </h4></blockquote>
							<div class="padd">
								<p><em><?php the_time('l, F jS, Y'); ?></em></p>
								<div style="text-align: justify;"> <?php the_content(); ?></div>
							</div>
							
						</div>
					</div>
				
					<div class="row">
						<div class="col s12">
							<ul class="navigation">
								<?php previous_post_link('<li class="col s2 l3 left kiri">&laquo;<strong class="white-text"> %link </strong></li>'); ?>
								<?php echo next_post_link('<li class="col s2 l3 right kanan"><strong> %link </strong>&raquo;</li>'); ?>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<?php comments_template(); ?>
					</div>
				</div>

				
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