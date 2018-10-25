<?php
$args = array(
	'menu' => 'main_menu',
	'container' => '',
	'items_wrap' => '%3$s',
);
?>
<nav class="main-menu">
	<ul>
		<?php wp_nav_menu($args); ?>
	</ul>
</nav>