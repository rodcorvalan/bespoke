<?php

if ( function_exists('acf_add_options_page') ) 
{
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración',
		'menu_title'	=> 'Configuración',
		'menu_slug' 	=> 'site_options',
		'capability'	=> 'edit_posts',
		'position' 		=> '20.3',
		'icon_url' 		=> false,
		'redirect'		=> true,
		'post_id' 		=> 'options'
	));
}