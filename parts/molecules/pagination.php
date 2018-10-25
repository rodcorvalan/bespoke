<?php

$args = array(
	'prev_text' => '<',
	'next_text' => '>',
	'type' => 'array'
);

$pagination = paginate_links($args);

if ( !empty($pagination) ) : ?>
<nav class="pagination">
	<ul>
		<?php foreach ($pagination as $page) : ?>
		<li><?php echo $page; ?></li>
		<?php endforeach ?>
	</ul>
</nav>
<?php endif; ?>