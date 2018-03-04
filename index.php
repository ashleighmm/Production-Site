<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
define('WP_USE_THEMES', false);
/* Don't remove this line. */
require('./cms/wp-blog-header.php');
?>
<?php
require 'head.php';
?>
<?php
require 'nav.php';
?>

<!--Call 'Homepage Slider' post from 'Sliders'-->
<?php $loop = new WP_Query( array( 'post_type' => 'show', 'cat' => 7, )); ?>
<div class="container">
 
<div id="myCarousel" class="carousel slide">
       
    <!-- Carousel items -->
    <div class="carousel-inner">
    	<?php 
		if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
		/* Fetch the post ID for each post */
		$postid = get_the_ID();
		?>
        <div class="item">
            <a href="show.php?post_id=<?php echo $postid ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($postid) ); ?> " class="img-responsive"/></a>
            <a href="show.php?post_id=<?php echo $postid ?>" class="btn btn-watch-now"><p >WATCH NOW&nbsp;&nbsp;&nbsp;</p><img src="assets/images/ico_play.png" /></a>
            </div>
	   <?php endwhile; endif;?>
         
    </div>
    <hr class="transition-timer-carousel-progress-bar" />
    <!-- Left and Right Controls -->
   
       <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fa fa-3x fa-angle-left "></i>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fa fa-3x fa-angle-right "></i>
        </a>
        
	</div>
</div>

<?php
require 'new-sec.php';
?>

<?php
require 'pop-sec.php';
?>

<?php
require 'people-sec.php';
?>


<script>
jQuery(document).ready(function(){
  $(".carousel-inner .item:first").addClass("active");
});
</script>


<?php
require 'footer.php';
?>
