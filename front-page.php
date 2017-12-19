<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		  <div id="index-banner" class="parallax-container">
		    <div class="section no-pad-bot">
		      <div class="container">
		        <br><br>
		        <h1 class="header center teal-text text-lighten-2"><?php bloginfo('name'); ?></h1>
		        <div class="row center">
		          <h5 class="header col s12 light"><?php bloginfo('description'); ?></h5>
		        </div>
		        <br><br>

		      </div>
		    </div>
		    <div class="parallax"><img src="<?php echo( get_header_image() ); ?>" alt="Unsplashed background img 1"></div>
		  </div>

		  <?php if (is_active_sidebar('main-menu-one') || is_active_sidebar('main-menu-one') || is_active_sidebar('main-menu-one')) : ?>
		  <div class="container">
		    <div class="section">

		      <!--   Icon Section   -->
		      <div class="row">
		        <div class="col s12 m4">
		          <div class="icon-block">
		            <?php dynamic_sidebar( 'main-menu-one' ); ?>
		          </div>
		        </div>

		        <div class="col s12 m4">
		          <div class="icon-block">
		            <?php dynamic_sidebar( 'main-menu-two' ); ?>
		          </div>
		        </div>

		        <div class="col s12 m4">
		          <div class="icon-block">
		            <?php dynamic_sidebar( 'main-menu-third' ); ?>
		          </div>
		        </div>
		      </div>

		    </div>
		  </div>


		  <div class="parallax-container valign-wrapper">
		    <div class="section no-pad-bot">
		      <div class="container">
		        <div class="row center">
		          <h5 class="header col s12 light"><?php bloginfo('description'); ?></h5>
		        </div>
		      </div>
		    </div>
		    <div class="parallax"><img src="<?= get_option('img') ?>" alt="Unsplashed background img 2"></div>
		  </div>
		  <?php endif; ?>

		  <div class="container">
		    <div class="section">
		      <div class="row">
		        <div class="col s12 center">
		          <h3><i class="mdi-content-send brown-text"></i></h3>
		          <div style="text-align: justify;" class="light"><?php the_content(); ?></div>
		        </div>
		      </div>
		    </div>
		  </div>

		  <div class="parallax-container valign-wrapper">
		    <div class="section no-pad-bot">
		      <div class="container">
		        <div class="row center">
		          <h5 class="header col s12 light"><?php bloginfo('description'); ?></h5>
		        </div>
		      </div>
		    </div>
		    <div class="parallax"><img src="<?= get_option('imgs') ?>" alt="Unsplashed background img 3"></div>
		  </div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>