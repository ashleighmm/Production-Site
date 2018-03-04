<?php
/**
 * Template for displaying all single posts
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */

	get_header(); ?>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <?php get_template_part( 'loop', 'single' ); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); 
       $postid = get_the_ID(); 


$url = (isset($postid['url'][0]))?$postid['url'][0]:"";

var_dump($postid);

echo "<br/>url=".$url;
?>
      </div><!-- /.row -->
      
	<?php get_footer(); ?>