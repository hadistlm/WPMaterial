<?php get_header();?>

	<div class="container">
		<div class="row">
			<div class="col s12 l9">
				<?php 
				$query = new WP_Query( array('post_type' => 'food_review', 'posts_per_page' => 5 ) );?>

				<?php if (!empty($query)) : while ( $query->have_posts() ) : $query->the_post() ;?>
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
 				<?php endwhile;endif;?>

				<?php if(empty($query) && empty(have_posts())){?>
					<div class="card-panel red darken-1 center-align">
				      <span class="white-text"> Oops!, the page you're looking isn't exist </span>
				    </div>
				<?php } ?>
			</div>

			<div class="col s12 l3">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
