<?php

// Remove Emojis

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 

// Remove Several

//remove_filter( 'template_redirect', 'redirect_canonical'); 
//remove_action( 'wp_head', 'wp_shortlink_wp_head');
//remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
//remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
//remove_action( 'wp_head', 'index_rel_link' ); // index link
//remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
//remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
//emove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

// Remove Version

function armix_remove_wp_ver_css_js( $src ) 
{
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

add_filter( 'style_loader_src', 'armix_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'armix_remove_wp_ver_css_js', 9999 );