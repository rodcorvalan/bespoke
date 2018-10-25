<?php

function armix_remove_image_sizes($sizes) 
{
	unset( $sizes[ 'medium' ]);
	unset( $sizes[ 'medium_large' ]);
	unset( $sizes[ 'large' ]);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'armix_remove_image_sizes');

function armix_add_image_sizes()
{
	add_image_size( 'post-item-s', 150, 150, true );
	add_image_size( 'post-item-m', 150, 150, true );
	add_image_size( 'post-item-l', 150, 150, true );
	add_image_size( 'post-item-xl', 150, 150, true );
	add_theme_support( 'post-thumbnails' );
}
add_action('init', 'armix_add_image_sizes');

function armix_mime_types($mimes) 
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'armix_mime_types');