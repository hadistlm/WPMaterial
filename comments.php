<div id="comments" class="card-panel">
	<div class="row">
		<div class="col s12">
			<h5 class="extmar light">
				<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wpmaterial' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h5>
			<div class="extmar">
			    <?php wp_list_comments( array( 'style' => 'div' ) ); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col s12">
			<?php comment_form(coment_arg()); ?>
		</div>
	</div>
</div><!-- #comments -->
