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
$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
$format1 = $my_meta['format1'];
$format2 = $my_meta['format2'];
$format3 = $my_meta['format3'];
$post_title = get_the_title( $postid ); 

$text = apply_filters('the_content', get_post_field('post_content', $postid));
//echo $post_title;
?>

<div class="container">
 <div id="myCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
       
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item" >
            <div class="item-bg" >
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($postid) ); ?> " class="img-responsive"/>
                
            </div>  
        </div>
    </div>
    
        <hr class="transition-timer-carousel-progress-bar" />
	</div>
</div>


<script type="text/javascript">
$('.read-more').click(function(){
		$('i').toggleClass('fa-chevron-down fa-chevron-up');
	});
	</script>
<div class="container">
    <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h1 class="xs-padding-left xs-padding-top sm-padding-bottom">SHOWS FT. <?php echo $post_title; ?></h1>
        </div>
        <?php /*?><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
        	<?php  if (!empty($text)): ?>
                <button class="btn btn-primary read-more" data-toggle="collapse" data-target="#collapsible">LEARN MORE ABOUT <?php echo $post_title; ?> <i class="fa fa-chevron-down"></i></button>  
                <?php endif; ?> 
        </div><?php */?>
      </div>
       <?php  if (!empty($text)): ?>
    <div class="row">	
        <div class="col-xs-12">
        	<div class="collapse" id="collapsible"> 
                <p><?php echo $text; ?><br><br></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
      <div class="row">
        
                <?php /*Change artist post title to slug */
				$post_title = strtolower($post_title);
				$post_title = str_replace(" ", "-", $post_title);?>
                <div class="xs-padding-left xs-padding-right">
                    <div class="row">
                        <div class="col-md-6">
                             <?php $loop = new WP_Query( array( 'post_type' => 'featured', 'posts_per_page' => 1, 'category_slug' => 'featured-video', )); ?>
                                <?php 
                                
                                if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                                
                                /* Fetch the post ID for each post */
                                $postid = get_the_ID();
                                
                                ?>
                                <div class="thumb-lg">
                                    <div class="embed-responsive embed-responsive-4by3">
                                      <iframe name="my-iframe"  class="embed-responsive-item" src="http://www.youtube.com/embed/<?php if($format1) { echo $format1; }?>?autoplay=1" allowfullscreen="allowfullscreen"></iframe>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>
                              <?php wp_reset_query(); ?>
                        </div>
                        <div class="col-md-6">
                        
                            <div class="row">
                                <?php $loop = new WP_Query( array( 'post_type' => 'show', 'posts_per_page' => -1, 'show-categories' => $post_title)); ?>
                                 <?php 
                                       if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
									   $postid = get_the_ID();
                                      /* Fetch the post ID for each post */
                                        ?>
                                        
                                        <div class="col-md-6 xs-margin-bottom ">
                                            <div class="thumb">
                                            
                                                 <?php if (class_exists('MultiPostThumbnails')
												 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2')) :
												 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); endif;?>
                                                 
                                                <div class="title-overlay">
                                                    <div class="row">
                                                        <div class="valign">
                                                            <div class="col-md-9">
                                                                <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="overlay">
                                                    <div class="valign">
                                                        <!--<p class="text-left black">EPISODE 1</p>-->
                                                        <h5 class="text-left"><?php echo the_title(); ?></h5>
                                                        <hr class="black-object">
                                                        <!--<p class="text-right black">1:20</p>-->
                                                    </div>
                                                    <div class="valign-bottom">
                                                        <a href="show.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; endif; ?>
                            <?php wp_reset_query(); ?>
            <?php /*?><?php echo rwmb_meta( 'personal' ); ?>
            <?php echo rwmb_meta( 'media_file', 'type=file_input', $postid ); ?><?php */?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>
</div>

<?php
//require 'shows.php';
?>

<?php
require 'footer.php';
?>
