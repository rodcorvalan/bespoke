<?php

class Armix_Posts
{
	// Menu
	public static $menu_slug = 'site_options_relations';
	public static $menu_parent_slug = 'site_options';
	// Args
	public static $params;
	public static $taxonomies;


	public static function configuration($params,$taxonomies=array())
	{
		self::$params = $params;
		self::$taxonomies = $taxonomies;
		add_action('init', array('Armix_Posts','option_page'));
		add_action('init', array('Armix_Posts','fields'));
		add_action('init', array('Armix_Posts','custom_post_type'));
		add_action('init', array('Armix_Posts','rewrite'));
		add_action('template_redirect', array('Armix_Posts','redirect'));
		if (!empty(self::$taxonomies)) add_action('init', array('Armix_Posts','taxonomies'));
	}

	public static function option_page()
	{
		if ( function_exists('acf_add_options_page') ) 
		{
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Relaciones',
				'menu_title' 	=> 'Relaciones',
				'parent_slug' 	=> self::$menu_parent_slug,
				'menu_slug'		=> self::$menu_slug,
				'capability'	=> 'manage_options',
			));
		}
	}
	
	public static function fields()
	{

		if( function_exists('acf_add_local_field_group') ) 
		{

			$args = array (
				'key' => 'group_armix_page_relations',
				'title' => 'Relaciones',
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => self::$menu_slug,
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			);

			foreach (self::$params as $param)
			{
				$args['fields'][] = array (
					'key' => 'armix_'.$param['post_type'].'_page',
					'label' => $param['post_type_name'],
					'name' => 'armix_'.$param['post_type'].'_page',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'page',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				);
			}

			acf_add_local_field_group($args);

			foreach (self::$params as $param)
			{

				$args = array (
					'key' => 'group_featured_'.$param['post_type'],
					'title' => $param['post_type_name'] . ' Destacados',
					'fields' => array (
						array (
							'key' => 'featured_'.$param['post_type'],
							'label' => $param['post_type_name'] . ' Destacados',
							'name' => 'featured_'.$param['post_type'],
							'type' => 'relationship',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => array (
								0 => $param['post_type'],
							),
							'taxonomy' => array (
							),
							'filters' => '',
							'elements' => '',
							'min' => $param['featured_amount'],
							'max' => $param['featured_amount'],
							'return_format' => 'id',
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'left',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
				);

				if ( is_array($param['featured_template']) )
				{

					foreach ( $param['featured_template'] as $template )
					{
						$args['location'][][] = array (
							'param' => 'page_template',
							'operator' => '==',
							'value' => $template
						);
					}

				}

				acf_add_local_field_group($args);
			
			}

		}
	}
	
	public static function custom_post_type()
	{

		foreach( self::$params as $param )
		{
			if ( $param['post_type'] != 'post')
			{
				$args = array(
					'label'                 => $param['post_type_name'],
					'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
					'hierarchical'          => true,
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_position'         => 5,
					'menu_icon'             => (isset($param['menu_icon'])) ? $param['menu_icon'] : null,
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,		
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'capability_type'       => 'page',
					'rewrite' 				=> (isset($param['rewrite'])) ? $param['rewrite'] : null,
				);
				
				register_post_type( $param['post_type'], $args );
			
			}
		}
	}

	public static function archive_query($post_type='post',$amount=8)
	{
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'order' => 'DESC',
			'orderby' => 'post_date',
			'paged' => $paged,
			'post_status' => 'publish',
			'post_type' => $post_type,
			'posts_per_page' => $amount,
		);

		query_posts( $args ); 
	}

	public static function featured_posts_query($post_type='post')
	{
		$featured_posts = get_field('featured_'.$post_type);

		$args = array(
			'orderby' => 'post__in',
			'post_type' => $post_type,
			'post__in' => $featured_posts
		);

		query_posts( $args );
	}

	public static function related_posts_query($post_type='post',$tax='post_tag',$amount=3)
	{

		global $post;

		$terms_array = array();
		$terms = wp_get_post_terms( $post->ID, $tax );
		$posts_ids = array();

		// 
		// Terms
		// 

		if ($terms) 
		{
			foreach ($terms as $term) $terms_array[] = $term->term_id;
			// Query Tags
			$args = array(
				'order' => 'DESC',
				'orderby' => 'post_date',
				'post_status' => 'publish',
				'post_type' => $post_type,
				'posts_per_page' => $amount,
				'post__not_in' => array($post->ID),
				'tax_query' => array(
			        array (
			            'taxonomy' => $tax,
			            'field' => 'term_id',
			            'terms' => $terms_array,
			        )
			    )
			);

			$posts_array = get_posts( $args );
			foreach ($posts_array as $post_by_tags)
			{
				$posts_ids[] = $post_by_tags->ID;
			}

		}

		//
		// Recent
		//

		if ( count($posts_ids) < $amount )
		{
			// Query Tags
			$args = array(
				'order' => 'DESC',
				'orderby' => 'post_date',
				'post_status' => 'publish',
				'post_type' => $post_type,
				'posts_per_page' => $amount - count($posts_ids),
				'post__not_in' => array($post->ID)
			);
			$posts_array = get_posts( $args );
			foreach ($posts_array as $post_by_tags)
			{
				$posts_ids[] = $post_by_tags->ID;
			}
		}

		$args = array(
			'orderby' => 'post__in',
			'post_status' => 'publish',
			'post_type' => $post_type,
			'posts_per_page' => $amount,
			'post__not_in' => array($post->ID),
			'post__in' => $posts_ids
		);

		query_posts( $args );

	}

	public static function last_posts_query($post_type='post',$amount=3)
	{
		$args = array(
			'order' => 'DESC',
			'orderby' => 'post_date',
			'post_status' => 'publish',
			'post_type' => $post_type,
			'posts_per_page' => $amount,
		);
		query_posts( $args ); 
	}

	public static function rewrite()
	{
		global $wp_rewrite;
	    $wp_rewrite->pagination_base = 'p';
	    $wp_rewrite->flush_rules();
	}

	public static function redirect()
	{
		global $wp_query;

		if ( isset($wp_query->query['name']) && $wp_query->query['name'] == 'category' && $wp_query->query['page'] == "" )
		{
			wp_redirect( home_url( '/' ) );
			exit();
		}
		if ( isset($wp_query->query['name']) && $wp_query->query['name'] == 'tag' && $wp_query->query['page'] == "" )
		{
			wp_redirect( home_url( '/' ) );
			exit();
		}
	}


	public static function taxonomies()
	{

		foreach (self::$taxonomies as $tax)
		{

			$labels = array(
				'name' => $tax['name']
			);

			$args = array(
				'labels'					 => $labels,
				'hierarchical'               => $tax['hierarchical'],
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			);
			
			register_taxonomy( $tax['slug'], $tax['post_types'], $args );

		}
	}

}

$args = array();

$args['post'] =	array(
	'post_type' => 'post',
	'post_type_name' => 'Entradas',
	'featured_amount' => 0,
	'featured_template' => array(),
);

Armix_Posts::configuration($args,$taxonomies);