<?php

function add_javascripts() 
{

	// Register Lib	
	
	//wp_register_script( 'picturefill', 'https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.2/picturefill.min.js', array(), false, true );
	//wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), false, true );
	//wp_register_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array(), false, true );
	//wp_register_script( 'jquery.validate', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js', array('jquery'), false, true );
	//wp_register_script( 'jquery.matchHeight', get_template_directory_uri() . '/javascripts/jquery.matchHeight-min.js', array(), false, true );
	//wp_register_script( 'google.maps', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyBP91ViWU22VCzyYoHNFi2mwEUKWZ7WnO8', array(), false, true );
	//wp_register_script( 'jquery.cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array(), false, true );
	//wp_register_script( 'jquery.scrollTo', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js', array(), false, true );
	//wp_register_script( 'jquery.slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), false, true );
	//wp_register_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), false, true );
	//wp_register_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), false, true );
	//wp_register_script( 'lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js', array(), false, true );
	
	// Register Theme
	
	wp_register_script( 'armix.header', get_template_directory_uri() . '/javascripts/armix.header.js', array( 'jquery' ), false, true );
	
}

add_action( 'wp_enqueue_scripts', 'add_javascripts' );