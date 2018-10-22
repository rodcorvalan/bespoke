<?php

function add_stylesheets() 
{
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700' );
	wp_enqueue_style( 'armix-style', get_template_directory_uri() . '/stylesheets/style.css' );
}

add_action( 'wp_enqueue_scripts', 'add_stylesheets', 100 );