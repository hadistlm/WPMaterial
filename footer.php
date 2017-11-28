<footer class="page-footer teal">
  <?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) ) : ?>
    <div class="container">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-first' )) : ?>
        <div class="col l6 s12">
          <?php dynamic_sidebar( 'footer-first' ); ?>
        </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-second' )) : ?>
        <div class="col l3 s6">
          <?php dynamic_sidebar( 'footer-second' ); ?>
        </div>
        <?php endif;?>

        <?php if ( is_active_sidebar( 'footer-third' ) ) : ?>
        <div class="col l3 s6">
          <?php dynamic_sidebar( 'footer-third' ); ?>
        </div>
        <?php endif;?>
      </div>
    </div>
  <?php endif;?>

    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
    
  </footer>

  <!--  Scripts -->
  <?php wp_footer(); ?>
  </body>
</html>