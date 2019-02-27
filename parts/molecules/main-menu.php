<?php
$args = array(
	'menu' => 'main_menu',
	'container' => '',
	'items_wrap' => '%3$s',
	'echo' => false,
	'walker' => new BEMWalkerNavMenu
);
?>
<nav class="menu menu--main-menu">
	<?php echo wp_nav_menu($args); ?>
</nav>