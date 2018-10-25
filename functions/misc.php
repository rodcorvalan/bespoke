<?php

//
// Get Terms
//

function armix_get_terms($post_id,$taxonomy,$amount=-1)
{
	$terms = wp_get_post_terms( $post_id, $taxonomy ); ?>
	<?php if ( !empty($terms) ) : ?>
	<ul>
		<?php foreach ($terms as $term) : ?>
		<?php if ( $amount == 0 ) break; ?>
		<li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
		<?php $amount--; endforeach; ?>
	</ul>
	<?php endif; ?>
<?php }

//
// Post Views
//

function armix_update_post_count_views()
{
	if ( is_singular() )
	{
		$views = get_post_meta( get_the_ID(), 'views', true );
		if ( empty($views) ) $views = 0;
		$views++;
		update_post_meta( get_the_ID(), 'views', $views );
	}
}
add_action( 'wp', 'armix_update_post_count_views' );

function armix_get_post_count_views($post_id)
{
	$views = get_post_meta($post_id,'views',true); 
	echo ($views) ? $views : 0;
}