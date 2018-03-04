<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
<?php $loop = new WP_Query( array( 'post_type' => 'sliders', 'posts_per_page' => 1, 'cat' => 6, )); ?>
<div class="container">
 <div id="myCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
       
    <!-- Carousel items --> 
    <div class="carousel-inner">
    	<?php 
		if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
		/* Fetch the post ID for each post */
		$postid = get_the_ID();
		
		$field_id = 'media_file';
		?>
        <div class="active item" >
            <div class="item-bg" >
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($postid) ); ?> " class="img-responsive"/>
            </div>  
        </div>
        <?php /*?><?php echo rwmb_meta( 'personal' ); ?>
		<?php echo rwmb_meta( 'media_file', 'type=file_input', $postid ); ?><?php */?>
		<?php  endwhile; endif;?>
        
    </div>
    <!-- Left and Right Controls -->
        <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fa fa-3x fa-angle-left vertically-align"></i>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fa fa-3x fa-angle-right vertically-align"></i>
        </a>-->
        <hr class="transition-timer-carousel-progress-bar" />
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">SHOWS</h1><div class="row">
                 <?php $loop = new WP_Query( array( 'post_type' => 'show' )); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); 
                /* Fetch the post ID for each post */
                    $postid = get_the_ID(); ?>
                
                <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="thumb md-margin-bottom">
                        <?php if (class_exists('MultiPostThumbnails')
						 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2')) :
						 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); endif;?>
                         
                        <div class="title-overlay">
                            <div class="row">
                                <div class="valign">
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        
                                        <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                    </div>
                                   
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <a href="show.php?post_id=<?php echo $postid ?>" >
                        <div class="overlay">
                            <div class="valign">
                               
                                <h5 class="text-left"><?php echo the_title(); ?></h5>
                                <hr class="black-object">
                                <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                
                            </div>
                            <div class="valign-bottom">
                               <img src="assets/images/ico_play_active.png" class="text-right"/>
                            </div>
                        </div>
                        </a>
                    </div>
                 </div>
                  <?php endwhile; wp_reset_query(); ?>
              </div>
         </div>
     </div>
</div>

<div class="container md-margin-top">
    <div class="row">
        <div class="col-md-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">STAND-UP</h1><div class="row">
                 <?php $loop = new WP_Query( array( 'post_type' => 'standup' )); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); 
                /* Fetch the post ID for each post */
                    $postid = get_the_ID(); ?>
                
                <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="thumb ">
                        <?php if (class_exists('MultiPostThumbnails')
						 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2')) :
						 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL /*, 'add class name here' */ ); endif;?>
                         
                        <div class="title-overlay">
                            <div class="row">
                                <div class="valign">
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <p class="white"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                        <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                    </div>
                                   
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <a href="set.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="set.php?post_id=<?php echo $postid ?>" >
                        <div class="overlay">
                            <div class="valign">
                                <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                <h5 class="text-left"><?php echo the_title(); ?></h5>
                                <hr class="black-object">
                                <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                
                            </div>
                            <div class="valign-bottom">
                                <img src="assets/images/ico_play_active.png" class="text-right"/>
                            </div>
                        </div>
                        </a>
                    </div>
                 </div>
                  <?php endwhile; wp_reset_query(); ?>
              </div>
         </div>
     </div>
</div>

<?php
require 'footer.php';
?>
