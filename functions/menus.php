<?php

// Add Menu

function armix_add_menus()
{
	register_nav_menu( 'main_menu', 'Main Menu' );
}

add_action( 'init', 'armix_add_menus' );