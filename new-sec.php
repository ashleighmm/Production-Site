<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- This has left padding because of the "before: \" in the css ------>
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">VIDEOS</h1>
        </div>
    </div>	
    <div class="row">
        <div class="col-md-12">
            <div id="myCarousel2" class="carousel slide thumbs">
                <!-- Carousel items -->
                <div class="carousel-inner ">
                    <div class="autoplay">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'artists', 'episode', 'show', 'standup', 'set' ), 'cat' => 2, )); 
						?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        /* Fetch the post ID for each post */
                            $postid = get_the_ID(); 
							
							$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
							$format1 = $my_meta['format1'];
							?>
                            
                            <div class="thumb">
                            	<?php if (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); 
								 
								 elseif ($post->post_type == 'episode') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/maxresdefault.jpg) center center no-repeat; background-size:cover;"></div>';
								 
								elseif ($post->post_type == 'set') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/maxresdefault.jpg) center center no-repeat; background-size:cover;"></div>';
									
								elseif (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('standup', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('standup', 'feature-image-2', NULL );
								 
								 
									
								 elseif ($post->post_type == 'set') :
								 echo '<div class="thumb-episode" style="background:#333 url(http://img.youtube.com/vi/'.$format1.'/0.jpg) center center no-repeat;"></div>';
								 endif;?>
     <a href="show.php?post_id=<?php echo $postid ?>">
                                <div class="title-overlay">
                                    <div class="row">
                                        <div class="valign">
                                            <div class="col-md-9">
                                                <p class="white truncate"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                                <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
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
                                 <a href="show.php?post_id=<?php echo $postid ?>" >
                                <div class="overlay">
                                    <div class="valign">
                                        <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                        <h5 class="text-left"><?php echo the_title(); ?></h5>
                                        <hr class="black-object">
                                        <?php /*?><?php if($format3) { ?><p class="text-right black"><?php echo $format3; ?></p><?php }?><?php */?>
                                    </div>
                                    <div class="valign-bottom-active ">
                                       <img src="assets/images/ico_play_active.png" />
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                          <?php endwhile; wp_reset_query(); ?>
                  </div>
                </div>
                 
            </div>
            
        </div>
	</div>
 </div>