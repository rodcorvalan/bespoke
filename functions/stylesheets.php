<?php

function armix_add_stylesheets() 
{
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	wp_enqueue_style( 'armix-style', get_template_directory_uri() . '/stylesheets/style.css' );
}

add_action( 'wp_enqueue_scripts', 'armix_add_stylesheets', 100 );