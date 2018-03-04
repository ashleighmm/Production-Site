<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="xs-padding-left xs-padding-top sm-padding-bottom">POPULAR</h1>
            <div class="row">
                <div id="myCarousel2" class="carousel slide thumbs"> 
                    <!-- Carousel items -->
                    <div class="carousel-inner ">
                        <div class="autoplay">
                            <?php $loop = new WP_Query( array( 'post_type' => array( 'post', 'show', 'standup', 'set', 'episode'),'cat' => 4, )); ?>
                            <?php 
							while ($loop->have_posts()) : $loop->the_post(); 
								/* Fetch the post ID for each post */
								$postid = get_the_ID();
								
										$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
										$format1 = $my_meta['format1'];
							?>
                			
                            <div class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom" >
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
								 
								 
								 
								 endif;?>
                                    <div class="title-overlay">
                                        <div class="row">
                                            <div class="valign">
                                                <div class="col-md-9">
                                                    <p class="white truncate"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                                    <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="valign-bottom">
                                            <?php
                                /*CHeck post type of single post in the loop*/
                                if ( 'episode' == get_post_type() ) {
                                ?>
                                            <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                            <?php
                                } elseif ( 'set' == get_post_type() ) {
                                ?>
                                            <a href="stand-up.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                            <?php
                                } elseif ( 'show' == get_post_type() ) {
                                ?>
                                            <a href="show.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                            <?php
                                } elseif ( 'standup' == get_post_type() ) {
                                ?>
                                            <a href="stand-up.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                            <?php
                                }
                                
                                ?>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <div class="valign">
                                            <p class="text-left black"><?php echo get_secondary_title($postid, $prefix, $suffix); ?></p>
                                            <h5 class="text-left"><?php echo the_title(); ?></h5>
                                            <hr class="black-object">
                                        </div>
                                        <div class="valign-bottom-active">
                                            <?php
							/*CHeck post type of single post in the loop*/
							if ( 'episode' == get_post_type() ) {
							?>
                                            <a href="show.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                            <?php
							} elseif ( 'set' == get_post_type() ) {
							?>
                                            <a href="stand-up.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                            <?php
							} elseif ( 'show' == get_post_type() ) {
							?>
                                            <a href="show.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                            <?php
							} elseif ( 'standup' == get_post_type() ) {
							?>
                                            <a href="stand-up.php?post_id=<?php echo $postid ?>" ><img src="assets/images/ico_play_active.png" class="text-right"/></a>
                                            <?php
							}
							
							?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
