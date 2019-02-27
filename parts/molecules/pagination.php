<?php

$args = array(
	'prev_text' => '<',
	'next_text' => '>',
	'type' => 'array'
);

$pagination = paginate_links($args);

if ( !empty($pagination) ) : ?>
<nav class="pagination">
	<ul class="pagination__list">
		<?php foreach ($pagination as $page) : ?>
		<li class="pagination__item"><?php echo $page; ?></li>
		<?php endforeach ?>
	</ul>
</nav>
<?php endif; ?>