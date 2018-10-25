<?php

$args = array(
	'hide_current' => false,
	'display_names_as' => 'slug' //name,slug
);

?>

<nav class="lang-menu">
	<ul>
		<?php pll_the_languages($args); ?>
	</ul>
</nav>