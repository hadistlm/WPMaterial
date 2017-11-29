
<aside>
	<?php if ( is_active_sidebar( 'sidebar' )) : ?>
	<div class="row">
		<div class="col s12 m12">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div>
	<?php else : ?>
	<div class="card-panel">
		<div class="teal lighten-2 pad">
			<span class="white-text"><h5>&ensp; Archives </h5></span>
		</div>
		<div class="padd">
			<ul>
				<?php wp_get_archives( 'type=daily' ); ?>
			</ul>
		</div>
    </div>
	<?php endif; ?>
</aside>
