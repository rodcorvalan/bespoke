<?php

$args = array(
	'post_type' => 'post',
	//'posts_per_page' => 1,
	'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);

query_posts($args); 

?>

<?php if ( have_posts() ) : ?>
<section class="posts-loop">
		
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php include TD . '/parts/molecules/posts-item.php'; ?>
		<?php endwhile; ?>
		<?php include TD . '/parts/molecules/pagination.php'; ?>
	</div>

</section>
<?php endif; wp_reset_query();  ?>