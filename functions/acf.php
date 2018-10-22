<?php

function armix_acf_google_map_api( $api )
{
	
	$api['key'] = 'AIzaSyBP91ViWU22VCzyYoHNFi2mwEUKWZ7WnO8';
	return $api;
}

add_filter('acf/fields/google_map/api', 'armix_acf_google_map_api');