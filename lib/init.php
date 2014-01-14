<?php
function wp_media_gallery_create_post_type_taxonomy() {
	register_post_type(
		'gallery',
		array(
			'labels' => array(
			'name' 			=> __('Galleries', 'wp-media-gallery'),
			'singular_name' => __('Gallery', 'wp-media-gallery'),
			'add_new' 		=> __('Add new gallery', 'wp-media-gallery'),
			'new_item' 		=> __('New gallery', 'wp-media-gallery'),
			'edit_item'		=> __('Edit gallery', 'wp-media-gallery'),
			'add_new_item' 	=> __('Add new gallery', 'wp-media-gallery'),
			'search_items' 	=> __('Search gallerys', 'wp-media-gallery'),
		),
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 9,
		'has_archive' => 'album-list',
		'rewrite' => array(
			'slug' => 'gallery',
			'with_front' => false,
			'feeds' => false,
			'pages' => false
		),
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail'
		),
		'_builtin' => false,
		'menu_icon' => false,
		'hierarchical' => false 
		)
	);

	register_taxonomy(
		'album',
		array(
			'gallery'
		),
		array(
			'hierarchical' => true,
			'label' => __('Albums', 'wp-media-gallery'),
			'rewrite' => array(
				'slug' => 'album',
				'with_front' => true,
				'hierarchical' => true
			)
		)
	);

	add_post_type_support( 'gallery', 'author' );
	register_taxonomy_for_object_type('post_tag', 'gallery');

	flush_rewrite_rules();
}
add_action('init', 'wp_media_gallery_create_post_type_taxonomy');