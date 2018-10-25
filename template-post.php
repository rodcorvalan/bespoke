<?php
/*
Template Name: Post
*/
?>
<?php get_header(); ?>

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 1,
	'paged' => $paged
);

query_posts($args); 

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_title(); ?>

<?php endwhile; endif; ?>

<?php include TD . '/parts/molecules/pagination.php'; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>