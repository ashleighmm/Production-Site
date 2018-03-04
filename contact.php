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
<?php $loop = new WP_Query( array( 'post_type' => 'sliders', 'posts_per_page' => 1, 'cat' => 7, )); ?>
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
        <div class="col-xs-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">CONTACT US</h1>
            <div class="xs-padding-left xs-padding-right">
            	
                <div class="row md-margin-top">
                	<div class="col-md-6">
                    	<?php echo do_shortcode('[contact-form-7 id="189" title="Contact form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>
