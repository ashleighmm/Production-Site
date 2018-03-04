<?php /* Fetch the post ID for each post */

if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(array('show'), 'secondary-image')) : 
$main_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image', NULL,  'secondary-featured-thumbnail');
endif;

?> 

