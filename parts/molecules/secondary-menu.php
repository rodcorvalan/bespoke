<?php
$args = array(
	'theme_location' => 'secondary_menu',
	'container' => '',
	'items_wrap' => '%3$s',
	'echo' => false,
	'walker' => new BEMWalkerNavMenu
);
?>
<nav class="menu menu--secondary-menu">
	<?php echo wp_nav_menu($args); ?>
</nav>