<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12"> <a href="people-main.php">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">PEOPLE</h1>
            </a>
            <div class="">
                <?php /*?><div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <?php //$loop = new WP_Query( array( 'post_type' => 'artists', 'posts_per_page' => 3 ,  'orderby' => 'rand')); ?>
                            <?php $loop = new WP_Query( array( 'post_type' => 'artists', 'posts_per_page' => 4 ,  'orderby' => 'rand')); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        
                            $postid = get_the_ID(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 md-margin-bottom ">
                                <div class="thumb">
                                    <?php if (class_exists('MultiPostThumbnails')
     && MultiPostThumbnails::has_post_thumbnail('artists', 'feature-image-2')) :
     MultiPostThumbnails::the_post_thumbnail('artists', 'feature-image-2', NULL  ); endif;?>
                                    <div class="title-overlay">
                                        <div class="row">
                                            <div class="valign">
                                                <div class="col-md-9">
                                                    <h5 class="text-left white"><?php echo the_title(); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="valign-bottom"> <a href="people.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a> </div>
                                    </div>
                                    <a href="people.php?post_id=<?php echo $postid ?>" >
                                    <div class="overlay">
                                        <div class="valign">
                                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                                            <hr class="black-object">
                                            <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                        </div>
                                        <div class="valign-bottom-active "> <img src="assets/images/ico_play_active.png" /> </div>
                                    </div>
                                    </a> </div>
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                          
                        </div>
                    </div>
                </div><?php */?>
                <div class="row">
                    <div class="col-md-12">
                        <div id="myCarousel2" class="carousel slide thumbs"> 
                            <!-- Carousel items -->
                            <div class="carousel-inner ">
                                <div class="autoplay">
                                    <?php 
									$loop = new WP_Query( array( 'post_type' => 'artists' ,  'orderby' => 'rand')); 
									
						?>
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        /* Fetch the post ID for each post */
                            $postid = get_the_ID(); 
							
							$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
							$format1 = $my_meta['format1'];
							?>
                                    <div class="thumb">
                                     <?php if (class_exists('MultiPostThumbnails')
     && MultiPostThumbnails::has_post_thumbnail('artists', 'feature-image-2')) :
     MultiPostThumbnails::the_post_thumbnail('artists', 'feature-image-2', NULL /*, 'add class name here' */ ); endif;?>
                                        <a href="people.php?post_id=<?php echo $postid ?>">
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
                                        </a> <a href="people.php?post_id=<?php echo $postid ?>" >
                                        <div class="overlay">
                                            <div class="valign">
                                                <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                                <h5 class="text-left"><?php echo the_title(); ?></h5>
                                                <hr class="black-object">
                                                <?php /*?><?php if($format3) { ?><p class="text-right black"><?php echo $format3; ?></p><?php }?><?php */?>
                                            </div>
                                            <div class="valign-bottom-active "> <img src="assets/images/ico_play_active.png" /> </div>
                                        </div>
                                        </a> </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
