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

$postid = $_GET["post_id"];

//Get the YouTube Video ID, Title and Duration from the post meta
$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
$format1 = $my_meta['format1'];
$format2 = $my_meta['format2'];
$format3 = $my_meta['format3'];
$post_title = get_the_title( $postid );
$post_subtitle = get_secondary_title( $postid );

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- This has left padding because of the "before: \" in the css ------>
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">SEARCH RESULTS</h1>
            <h2 class="pagetitle xs-padding-left">Search Result for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&posts_per_page=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('results'); wp_reset_query(); ?></h2><br>
        </div>
    </div>	
    <div class="row">
       
                        
                        <?php 
                        while (have_posts()) : the_post(); 
                            /* Fetch the post ID for each post */
                        ?>
                            <?php 
                           
                            /* Fetch the post ID for each post */
                            $postid = get_the_ID();
					
							$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
							$format1 = $my_meta['format1'];
                            ?>
                            <div class="col-md-3 col-sm-4 col-xs-6 md-margin-bottom">

                            <div class="thumb ">
                                <?php if (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 
								 elseif ($post->post_type == 'episode') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/maxresdefault.jpg) center center no-repeat; background-size:cover;"></div>';
								 
								
									
								elseif (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL );
								 
								 
								 elseif (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('set', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('set', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 elseif (class_exists('MultiPostThumbnails')
						 && MultiPostThumbnails::has_post_thumbnail('artists', 'feature-image-2')) :
						 MultiPostThumbnails::the_post_thumbnail('artists', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 endif;?>
                                 
                                 
                                <div class="title-overlay">
                                    <div class="row">
                                        <div class="valign">
                                            <div class="col-md-9">
                                                 <p class="white truncate"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                                <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="valign">
                                        <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                                <h5 class="text-left"><?php echo the_title(); ?></h5>
                                        <hr class="black-object">
                                    </div>
                                    <div class="valign-bottom">
                                        <a href="show.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                           <?php  endwhile; ?>
                  	</div>
                </div>


<?php
require 'footer.php';
?>
