<?php get_header(); ?>
	
	<div class="container">
		<div class="row">
			<div class="col l9">
				<?php if (have_posts()) : ?>
					<header class="center-align">
						<h4 class="teal-text"><?php printf( __( 'Search Results for: %s', 'wpmaterial' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
					</header>
					<?php while ( 	have_posts() ) : the_post(); ?>
						<blockquote><h4 class="teal-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></blockquote>
		  				<p> <?php echo wp_trim_words( get_the_content(), 40, ' ...' ); ?> </p>
					<?php endwhile; ?>
				<?php else: ?>
					<header class="center-align">
						<h4 class="teal-text"><?php printf( __( 'Search Results for: %s', 'wpmaterial' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
					</header>
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

						<p class="center-align"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wpmaterial' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

					<?php elseif ( is_search() ) : ?>

						<p class="center-align"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wpmaterial' ); ?></p>
						<?php get_search_form(); ?>

					<?php else : ?>

						<p class="center-align"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wpmaterial' ); ?></p>
						<?php get_search_form(); ?>

					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col l3">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>