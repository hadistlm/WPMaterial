
<aside>
	<?php if ( is_active_sidebar( 'sidebar' )) : ?>
	<div class="card-panel">
		<div class="teal lighten-2 pad">
			<span class="white-text"><h5>&ensp; Title</h5></span>
		</div>
		<div class="padd">
			Lorem ipsum dolor sit amet consectutor
		</div>
    </div>
	<?php else : ?>
	<div class="card-panel">
		<div class="teal lighten-2 pad">
			<span class="white-text"><h5>&ensp; Archives </h5></span>
		</div>
		<div class="padd">
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>
    </div>
<?php endif; ?>
</aside>
