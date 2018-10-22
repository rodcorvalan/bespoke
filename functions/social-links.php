<?php

class Armix_Social_Links {

	public $email;
	public $twitter;
	public $facebook;
	public $instagram;
	public $google_plus;
	public $linkedin;
	public $youtube;

	public $parent_slug;
	public $slug;

	public function __construct()
	{
		$this->email = true;
		$this->twitter = true;
		$this->facebook = true;
		$this->instagram = true;
		$this->google_plus = false;
		$this->linkedin = false;
		$this->youtube = false;

		$this->slug = 'site_options_social_links';

		$this->option_page();
		$this->fields();
	}

	public function option_page()
	{
		if ( function_exists('acf_add_options_page') ) 
		{
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Redes Sociales',
				'menu_title' 	=> 'Redes Sociales',
				'parent_slug' 	=> 'site_options',
				'menu_slug'		=> $this->slug
			));
		}
	}

	public function fields()
	{
		
		if( function_exists('acf_add_local_field_group') )
		{
			$fields = array();

			if ( $this->email ) $fields[] = array (
				'key' => 'email_link',
				'label' => 'Email',
				'name' => 'email_link',
				'type' => 'email',
				'default_value' => 'email@email.com',
				'placeholder' => 'email@email.com',
			);

			if ( $this->facebook ) $fields[] = array (
				'key' => 'facebook_link',
				'label' => 'Facebook',
				'name' => 'facebook_link',
				'type' => 'url',
				'default_value' => 'https://facebook.com/',
				'placeholder' => 'https://facebook.com/usuario',
			);

			if ( $this->twitter ) $fields[] = array (
				'key' => 'twitter_link',
				'label' => 'Twitter',
				'name' => 'twitter_link',
				'type' => 'url',
				'default_value' => 'https://twitter.com/',
				'placeholder' => 'https://twitter.com/usuario',
			);

			if ( $this->linkedin ) $fields[] = array (
				'key' => 'linkedin_link',
				'label' => 'LinkedIn',
				'name' => 'linkedin_link',
				'type' => 'url',
				'default_value' => 'https://linkedin.com/',
				'placeholder' => 'https://linkedin.com/usuario',
			);

			if ( $this->google_plus ) $fields[] = array (
				'key' => 'google_plus_link',
				'label' => 'Google Plus',
				'name' => 'google_plus_link',
				'type' => 'url',
				'default_value' => 'https://plus.google.com/',
				'placeholder' => 'https://plus.google.com/usuario',
			);

			if ( $this->instagram ) $fields[] = array (
				'key' => 'instagram_link',
				'label' => 'Instagram',
				'name' => 'instagram_link',
				'type' => 'url',
				'default_value' => 'https://instagram.com/',
				'placeholder' => 'https://instagram.com/usuario',
			);

			if ( $this->youtube ) $fields[] = array (
				'key' => 'youtube_link',
				'label' => 'Youtube',
				'name' => 'youtube_link',
				'type' => 'url',
				'default_value' => 'https://youtube.com/',
				'placeholder' => 'https://youtube.com/usuario',
			);

			acf_add_local_field_group(array (
				'key' => 'social_links_group',
				'title' => 'Links',
				'fields' => $fields,
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => $this->slug,
						),
					),
				),
				'menu_order' => 1,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'left',
				'instruction_placement' => 'label',
				'active' => 1,
			));

		}
	}

}

$asl_object = new Armix_Social_Links();