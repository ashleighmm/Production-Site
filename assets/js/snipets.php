<!-- begin custom related loop, isa -->
 <?php
/*
 * This example fetches the related posts for the current post ID and displays the output in a custom format restricted by the 'news' category 
 *
 
global $post;
$terms = wp_get_post_terms( $postid, 'category');
print_r($terms); #displays the output
*/
 /*$tax_tags = get_terms(array('post_tag'));
   foreach($tax_tags as $tag){
	   
     ?>
     
     <?php /*<?php echo ucfirst($tag->taxonomy).' : ' ?>
         ?><a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name ?></a><?php 
        query_posts("tag=kagiso"); 
		
		?>
        
        
         
         <?php
			if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			
				echo the_title(); 
			endwhile;
			else :
			echo wpautop( 'Sorry, no posts were found' );
			endif;
			}*/
			?>

         
         
       
      
     <?php

// get the custom post type's taxonomy terms
//$custom_taxterms = wp_get_object_terms( $postid, 'post_tag', array('fields' => 'all') );
// arguments
/*$args = array(
'post_type' => 'shows',
'post_status' => 'publish',
'posts_per_page' => 3, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => 'bantu-hour'
    )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<ul>';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>
    <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php include 'secondary-ft-img.php';?>
   
    
<?php
endwhile;
echo '</ul>';
endif;
// Reset Post Data
wp_reset_postdata();*/
?>
 
 
<!-- end custom related loop, isa -->