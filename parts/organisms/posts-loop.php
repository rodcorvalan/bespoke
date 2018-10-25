<?php

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 1,
	'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);

query_posts($args); 

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include TD . '/parts/molecules/posts-item.php'; ?>

<?php endwhile; include TD . '/parts/molecules/pagination.php'; endif; wp_reset_query();  ?>