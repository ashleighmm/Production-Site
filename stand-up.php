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
<?php $loop = new WP_Query( array( 'post_type' => 'sliders', 'posts_per_page' => 1, 'cat' => 37, )); ?>
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
        <div class="col-xs-12">
            <!-- This has left padding because of the "before: \" in the css ------>
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">STAND-UP</h1>
        </div>
    </div>	
		<ul id="filters" class="clearfix">
			<li style="display:none;"><span class="filter" data-filter="all"><h5>ALL</h5></span></li>
            <li><span class="filter active" data-filter="errthang"><h5>ALL</h5></span></li>
			<li><span class="filter" data-filter="new"><h5>NEW</h5></span></li>
			<li><span class="filter" data-filter="popular"><h5>POPULAR</h5></span></li>
            
		</ul>

		<div id="portfoliolist">
        
        <?php $loop1 = new WP_Query( array( 'post_type' => 'standup')); ?>
			<?php while ( $loop1->have_posts() ) : $loop1->the_post(); 
            /* Fetch the post ID for each post */
            $postid = get_the_ID(); ?>
            
			<div class="portfolio errthang" data-cat="errthang">
				<div class="portfolio-wrapper">				
					<?php if (class_exists('MultiPostThumbnails')
					 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
					 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL /*, 'add class name here' */ ); 
					 endif;?>
					 <a href="set.php?post_id=<?php echo $postid ?>">
					<div class="title-overlay">
                        <div class="row">
                            <div class="valign">
                                <div class="col-md-9">
                                    <p class="white"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                </div>
                               
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="valign-bottom">
                            <img src="assets/images/ico_play.png"/>
                        </div>
                    </div>
                    </a>
                    <a href="set.php?post_id=<?php echo $postid ?>" >
                    <div class="overlay">
                        <div class="valign">
                            <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                            <hr class="black-object">
                            <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                           <!-- <p class="text-right black">1:20</p>-->
                        </div>
                        <div class="valign-bottom-active ">
                            <img src="assets/images/ico_play_active.png" />
                        </div>
                    </div>
                    </a>
				</div>
                 
			</div>				
			<?php endwhile; wp_reset_query(); ?>
			
		<?php $loop2 = new WP_Query( array( 'post_type' => 'standup', 'cat' => 2, )); ?>
			<?php while ( $loop2->have_posts() ) : $loop2->the_post(); 
            /* Fetch the post ID for each post */
            $postid = get_the_ID(); ?>
            
			<div class="portfolio new" data-cat="new">
				<div class="portfolio-wrapper">				
					<?php if (class_exists('MultiPostThumbnails')
					 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
					 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL /*, 'add class name here' */ ); 
					 endif;?>
					  <a href="show.php?post_id=<?php echo $postid ?>">
					<div class="title-overlay">
                        <div class="row">
                            <div class="valign">
                                <div class="col-md-9">
                                    <p class="white"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                </div>
                               
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="valign-bottom">
                           <img src="assets/images/ico_play.png"/>
                        </div>
                    </div>
                    </a>
                    <a href="set.php?post_id=<?php echo $postid ?>" >
                    <div class="overlay">
                        <div class="valign">
                            <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                            <hr class="black-object">
                            <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                            <!--<p class="text-right black">1:20</p>-->
                        </div>
                        <div class="valign-bottom-active ">
                            <img src="assets/images/ico_play_active.png" />
                        </div>
                    </div></a>
				</div>
                 
			</div>				
			<?php endwhile; wp_reset_query(); ?>
            
         <?php $loop3 = new WP_Query( array( 'post_type' => 'standup', 'cat' => 4, )); ?>
            <?php while ( $loop3->have_posts() ) : $loop3->the_post(); 
            /* Fetch the post ID for each post */
            $postid = get_the_ID(); ?>
            
			<div class="portfolio popular" data-cat="popular">
				<div class="portfolio-wrapper">				
					<?php if (class_exists('MultiPostThumbnails')
					 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
					 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL /*, 'add class name here' */ ); 
					 endif;?>
					 <a href="show.php?post_id=<?php echo $postid ?>">
					<div class="title-overlay">
                        <div class="row">
                            <div class="valign">
                                <div class="col-md-9">
                                    <p class="white"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                </div>
                               
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="valign-bottom">
                            <img src="assets/images/ico_play.png"/>
                        </div>
                    </div>
                    </a>
                    <a href="set.php?post_id=<?php echo $postid ?>" >
                    <div class="overlay">
                        <div class="valign">
                            <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                            <hr class="black-object">
                            <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                            <!--<p class="text-right black">1:20</p>-->
                        </div>
                        <div class="valign-bottom-active ">
                            <img src="assets/images/ico_play_active.png" />
                        </div>
                    </div>
                    </a>
				</div>
                 
			</div>				
			<?php endwhile; wp_reset_query(); ?>
            
            <?php //$loop3 = new WP_Query( array( 'post_type' => 'standup', 'orderby' => 'ASC' )); ?>
            <?php //while ( $loop3->have_posts() ) : $loop3->the_post(); 
            /* Fetch the post ID for each post */
            //$postid = get_the_ID(); ?>
            
			<?php /*<div class="portfolio sort" data-cat="sort">
				<div class="portfolio-wrapper">				
					<?php if (class_exists('MultiPostThumbnails')
					 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
					 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL /*, 'add class name here'  ); */
					/* endif; /*?>
					<div class="title-overlay">
                        <div class="row">
                            <div class="valign">
                                <div class="col-md-9">
                                    <p class="white"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                </div>
                               
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="valign-bottom">
                            <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                        </div>
                    </div>
                    <div class="overlay">
                        <div class="valign">
                            <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                            <hr class="black-object">
                            <p class="text-right black">1:20</p>
                        </div>
                        <div class="valign-bottom-active ">
                            <a href="show.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" /></a>
                        </div>
                    </div>
				</div>
                 
			</div>	*/ ?>			
			<?php //endwhile; wp_reset_query(); ?>
		</div>
		
	</div><!-- container -->

<?php
//require 'shows.php';
?>

<?php
require 'footer.php';
?>
