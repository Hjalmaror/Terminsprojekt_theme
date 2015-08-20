<div id="sidebar-category">
	<ul>
		<?php
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) :
		?>
		herp
		<?php
		endif; ?>
	</ul>
</div>