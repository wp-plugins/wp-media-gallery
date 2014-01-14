<?php
function wp_media_gallery_content($content) {
	global $post;

	if( $post->post_type == 'gallery' )
	{
		$args = array(
			'order'				=> 'ASC',
			'orderby'			=> 'menu_order',
			'post_type'			=> 'attachment',
			'post_parent'		=> $post->ID,
			'post_mime_type'	=> 'image',
			'numberposts'		=> -1
		);
		$attachments = get_posts($args);

		$content .= '<div class="wp-media-gallery">';
		foreach($attachments as $attachment)
		{
			$content_gallery = '<a href="' . wp_get_attachment_url($attachment->ID) . '" rel="gallery[' . $post->ID . ']">' . wp_get_attachment_image( $attachment->ID, 'thumbnail') . '</a>';
			$content .= apply_filters('wp_media_gallery_content', $content_gallery, $attachment);
		}
		$content .= '</div>';
	}
	return $content;
}
add_filter('the_content', 'wp_media_gallery_content');