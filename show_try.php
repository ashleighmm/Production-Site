<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
define('WP_USE_THEMES', false);
/* Don't remove this line. */
require('./cms/wp-blog-header.php');
require 'head.php';
require 'nav.php';

$postid = $_GET["post_id"];
//$season = $_GET["custom_term"];
//Get the YouTube Video ID, Title and Duration from the post meta
$my_meta = get_post_meta($postid,'_my_meta',TRUE);
$format1 = $my_meta['format1'];
$format2 = $my_meta['format2'];
$format3 = $my_meta['format3'];

/*$order = $my_meta['order'];*/
$post_title = get_the_title( $postid );
$post_subtitle = get_secondary_title( $postid );
$text = apply_filters('the_content', get_post_field('post_content', $postid));

/*Get the show titles using the custom registered taxonomy
$term_list = wp_get_post_terms($postid, 'show-titles');
$show_title = $term_list[0]->term_id;*/

?>

<div class="container">
    <div id="myCarousel" class="carousel slide" data-interval="false" data-ride="carousel"> 
        
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item" >
                <div class="item-bg" > <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($postid) ); ?> " class="img-responsive"/> </div>
            </div>
            <?php  if (!empty($text)): ?>
            <div class="desc-overlay">
                <div class="col-md-12">
                    <div class="desc-overlay-p">
                        <p><strong><?php echo $post_title; ?></strong><br>
                            <?php echo $text; ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <hr class="transition-timer-carousel-progress-bar" />
    </div>
</div>
<?php /*?><?php 

$taxonomy     = 'show-titles';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$empty        = 0;

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty,
  
);
?>
<ul>
<?php wp_list_categories( $args ); 
?><?php */?>
<?php /*?></ul> 
<?php   // Get terms for post
 $terms = get_the_terms( $postid , $taxonomy );
 // Loop over each item since it's an array
 if ( $terms != null ){
 foreach( $terms as $term ) {
 // Print the name method from $term which is an OBJECT
 print $term->slug ;
 // Get rid of the other data stored in the object, since it's not needed
 unset($term);
} } ?>
<?php
$taxonomy = 'concerts';
$queried_term = get_query_var($taxonomy);
$terms = get_terms($taxonomy, 'slug='.$queried_term);
if ($terms) {
  foreach($terms as $term) {
    echo '<p> This is the Term name ' . $term->name . 'and description '. $term->description . '</p> ';
  }
}
?>

<?php 
//Returns All Term Items for "my_taxonomy".
$term_list = wp_get_object_terms( $postid, 'show-titles');
print_r( $term_list );
 
// Returns Array of Term Names for "my_taxonomy".
$term_list = wp_get_post_terms( $postid, 'show-titles', array( 'fields' => 'names' ) );
print_r( $term_list );
 
// Returns Array of Term ID's for "my_taxonomy".
$term_list = wp_get_post_terms( $postid, 'show-titles', array( 'fields' => 'ids' ) );
print_r( $term_list );

 $terms = get_the_term_list( $postid, 'show-titles', '', ', ', '');
   print_r($terms);
   
   foreach ( $terms as $term ) {
 echo $term->name;
}<?php */
/*?><div class="container">
    <div class="row">
        <div class="col-xs-12">
        	<h1 class="xs-padding-left xs-padding-top sm-padding-bottom"><?php echo $post_title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
        	<div class="row video-content" >
            <div class="container" style="margin: auto;">

                <div id="playlist-big" class="hidden-xs"></div>
                 <div id="playlist-small" class="visible-xs"></div>
        
               <!-- <a class="button" href="#" onclick='$("#playlist").youtube_video_play(); return false;'>Play</a>
                <a class="button" href="#" onclick="$('#playlist').youtube_video_pause(); return false;">Pause</a>
                <a class="button" href="#" onclick="$('#playlist').youtube_video_stop(); return false;">Stop</a>
                &nbsp;&nbsp;-->
        
            </div>
        </div><!--row-->
        </div>
    </div>
</div><?php 

$taxonomy = 'show-titles';
$queried_term = get_query_var($taxonomy);
$terms = get_terms($taxonomy, 'slug='.$queried_term);
if ($terms) {
  echo '<ul>';
  foreach($terms as $term) {
  	echo '<li><a href="'.get_term_link($term->slug, $taxonomy).'">'.$term->name.'</a></li>';
  }
  echo '</ul>';
}

echo get_the_term_list( get_the_ID(), $taxonomy, 'Product:' );
*/?>
<script type="text/javascript">
	$('.read-more').click(function(){
			$('i').toggleClass('fa-chevron-down fa-chevron-up');
		});
		
		$('#myCarousel').hover( function() {
	  $('.desc-overlay').fadeToggle();
	} );
</script>

<div class="container">
    <div class="row">
    	<!--Show show title-->
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom"><?php echo $post_title; ?></h1>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
        <?php 
			//Get the SEASONS
			$terms = get_terms( 'season', array(
				'orderby'    => 'count',
				'hide_empty' => true,
				'order' => 'desc'
			) );
			echo '<div id="links" class="btn-group pull-right">';
			
			// Define the query        
			foreach( $terms as $term ) {
				$args = array(
				'post_type' => 'episode',
				'season' => $term->slug,
				'show-titles' => $post_title, 
				'post__not_in' => array($postid),
				'hide_empty' => true
			);
			$query = new WP_Query( $args );
			
			//Show only term names that have posts in them, NO EMPTY TERMS
			while ( $query->have_posts() ) : $query->the_post(); 
				$termsa[$term->slug] = '<div class="btn btn-default">'.$term->name.'</div>';
			endwhile;
			}
			echo implode($termsa,'');
			
			echo '</div>';
		?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="embed-responsive embed-responsive-4by3">
                <iframe name="my-iframe"  class="embed-responsive-item" src="http://www.youtube.com/embed/<?php echo $format1 ?>?autoplay=1" allowfullscreen="allowfullscreen"></iframe>
            </div>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> <br>
                <div class="social-align">
                    <div class="fb-like" data-href="https://www.facebook.com/Gunga7com-616234865192834/" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
                </div>
                <div class="social-align"> <a href="https://twitter.com/Gunga7_com" class="twitter-follow-button" data-show-screen-name="false" data-lang="en" data-show-count="false">Follow @Gunga7_com</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                    <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </div>
                <div class="social-align"> 
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-size="tall" data-annotation="none" data-href="https://plus.google.com/102545959188135710840/posts"></div>
                    
                    <!-- Place this tag after the last +1 button tag. --> 
                    <script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script> 
                </div>
                <!--<div class="social-align">
<a class="a2a_button_whatsapp"></a>
</div>-->
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
            </div>
        </div>
        <div class="col-md-5 pre-scrollable">
            <?php //Get episodes(posts) under the show title ?>
            <ul class="list-group playlist">
                <!--Now playing-->
                <?php $loop = new WP_Query( array( 'post_type' => 'episode', 'show-titles' => $post_title, 'post__not_in' => array($postid), 'posts_per_page' => 200,"order"=>"DESC")); ?>
                <?php 
					if($postid) { 
					
					?>
					<li class="list-group-item playlist-item active "><a href="http://www.youtube.com/embed/<?php echo $format1; ?>" target="my-iframe" class="truncate-playlist "><?php echo $format2; ?> <span class="playlist-item-title"><?php echo $post_title; ?></span><span class="pull-right">
						<?php if($format3) { echo $format3; }?>
						</span></a></li>
					<?php };
				//Get the selected season
				//$term_list = wp_get_post_terms($postid, 'season', array("fields" => "all"));
				//foreach($term_list as $term_single) {
				
			 
					echo '<div id="toShow">';
					foreach( $terms as $term ) {
		
						// Define the query
						$args = array(
							'post_type' => 'episode',
							'season' => $term->slug,
							'show-titles' => $post_title, 
							'post__not_in' => array($postid), 
							'posts_per_page' => 200,
							'hide_empty' => true,
							'orderby' => 'title',
							'order' => 'DESC'
						);
						$query = new WP_Query( $args );
							
					echo '<div>';
					
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
					 
						$postid = get_the_ID();
				
						//Get the YouTube Video ID that 
						$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
						$format1 = $my_meta['format1'];
						$format2 = $my_meta['format2'];
						$format3 = $my_meta['format3'];
					?>
                        <li class="list-group-item playlist-item <?php echo $term->slug ?>"> <a href="http://www.youtube.com/embed/<?php echo $format1; ?>" target="my-iframe" style="display:inline-block;" class="truncate-playlist "><?php echo get_secondary_title($postid, $prefix, $suffix); ?> - <span class="playlist-item-title"><?php echo $post_title; ?></span></a> <a href="http://www.youtube.com/embed/<?php echo $format1; ?>" target="my-iframe" style="display:block;" class="pull-right">
                    <?php if($format3) { echo $format3; }?>
                    </a></li>
                <?php endwhile;

                echo '</div>';

                // use reset postdata to restore orginal query
                

            } 
			
			echo '</div>';
			 
			 ?>
            </ul>
        </div>
    </div>
</div>
<!-- 4:3 aspect ratio -->

<div class="container md-margin-top">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">RECOMMENDED</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="myCarousel2" class="carousel slide thumbs xs-padding-left xs-padding-right"> 
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="autoplay">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'episode', 'show', 'standup', 'set' ), 'cat' => 38 )); 
						?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        /* Fetch the post ID for each post */
                            $postid = get_the_ID();
							$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
							$format1 = $my_meta['format1'];
							 ?>
                        <a href="show.php?post_id=<?php echo $postid ?>">
                        <div class="thumb">
                            <?php if (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 
								 elseif ($post->post_type == 'episode') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/maxresdefault.jpg) center center no-repeat; background-size:cover;"></div>';
								 
								
									
								elseif (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL );
								 
								 
								
									
								 elseif ($post->post_type == 'set') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/0.jpg) center center no-repeat;"></div>';
								 endif;?>
                            <div class="title-overlay">
                                <div class="row">
                                    <div class="valign">
                                        <div class="col-md-9">
                                            <p class="white truncate"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                            <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                </div>
                                <div class="valign-bottom"> <img src="assets/images/ico_play.png"/> </div>
                            </div>
                            <div class="overlay">
                                <div class="valign">
                                    <p class="text-left black "><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left"><?php echo the_title(); ?></h5>
                                    <hr class="black-object">
                                    <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                    <!--<p class="text-right black">1:20</p>--> 
                                </div>
                                <div class="valign-bottom-active "> <img src="assets/images/ico_play_active.png" /> </div>
                            </div>
                        </div>
                        </a>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">RANDOM</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="myCarousel2" class="carousel slide thumbs xs-padding-left xs-padding-right"> 
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="autoplay">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'episode', 'show', 'standup', 'set' ), 'orderby' => 'rand', )); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        /* Fetch the post ID for each post */
                            $postid = get_the_ID(); 
                            $my_meta = get_post_meta($postid,'_my_meta',TRUE); 
							$format1 = $my_meta['format1'];
							global $post;
                            get_post_type( $post );?>
                        <a href="show.php?post_id=<?php echo $postid ?>">
                        <div class="thumb">
                            <?php if (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 
								 elseif ($post->post_type == 'episode') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/maxresdefault.jpg) center center no-repeat; background-size:cover;"></div>';
								 
								
									
								elseif (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL );
								 
								 elseif ($post->post_type == 'set') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/0.jpg) center center no-repeat;"></div>';
								 endif;?>
                            <div class="title-overlay">
                                <div class="row">
                                    <div class="valign">
                                        <div class="col-md-9">
                                            <p class="white truncate"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                            <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                </div>
                                <div class="valign-bottom"> <img src="assets/images/ico_play.png"/> </div>
                            </div>
                            <div class="overlay">
                                <div class="valign">
                                    <p class="text-left black" ><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                    <h5 class="text-left"><?php echo the_title(); ?></h5>
                                    <hr class="black-object">
                                    <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                    <!--<p class="text-right black">1:20</p>--> 
                                </div>
                                <div class="valign-bottom-active "> <img src="assets/images/ico_play_active.png" /> </div>
                            </div>
                        </div>
                        </a>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AddToAny BEGIN --> 
<script async src="https://static.addtoany.com/menu/page.js"></script> 
<script src="//cdn.jsdelivr.net/whatsapp-sharing/1.3.3/whatsapp-button.js"></script> 
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
<!-- AddToAny END --> 
<script type="text/javascript">
 $("li").on("click", function() {
      $("li.playlist-item").removeClass("active");
      $(this).addClass("active");
    });
	
	$("li.playlist-item").click(function() {
     
  $(this).parent().prepend($(this));
  
});

$('#toShow>div:gt(0)').hide(); // hide all but first
$('#links div').on('click',function(e){
  $('#toShow>div:eq('+$(this).index()+')').show(1700).siblings('div').stop(1).hide(1700);
  //return false;
});
</script>
<?php
require 'footer.php';
?>
