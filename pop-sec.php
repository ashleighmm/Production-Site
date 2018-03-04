<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="things-main.php"><h1 class="xs-padding-left xs-padding-top sm-padding-bottom">POPULAR</h1></a>
            <div class="">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 md-margin-bottom">
						 <?php $loop = new WP_Query( array( 'post_type' => 'show', 'posts_per_page' => 1, 'cat' => 171, )); ?>
                            <?php 
                            
                            while ($loop->have_posts()) : $loop->the_post(); 
                            $postid = get_the_ID();
                            /* Fetch the post ID for each post */
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="thumb thumb-lg">
                                        <?php if (class_exists('MultiPostThumbnails')
								 && MultiPostThumbnails::has_post_thumbnail('show', 'feature-image-2') ) :
								 MultiPostThumbnails::the_post_thumbnail('show', 'feature-image-2', NULL /*, 'add class name here' */ ); endif;?>
                                       
                                            <div class="title-overlay">
                                                <div class="row">
                                                    <div class="valign">
                                                        <div class="col-md-9"> 
                                                            <h5 class="text-left white truncate"><?php echo the_title(); ?></h5>
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                </div>
                                                <div class="valign-bottom">
                                                    <a href="people.php?post_id=<?php echo $postid ?>"><img src="assets/images/ico_play.png"/></a>
                                                </div>
                                            </div>
                                         <a href="show.php?post_id=<?php echo $postid ?>" >
                                            <div class="overlay">
                                                <div class="valign">
                                                    
                                                    <h5 class="text-left"><?php echo the_title(); ?></h5>
                                                    <hr class="black-object">
                                                    <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                                    
                                                </div>
                                                <div class="valign-bottom-active ">
                                                    <img src="assets/images/ico_play_active.png" />
                                                </div>
                                            </div>
                                       </a>
                                    	</div>
                                 </div>
                             </div>
                          <?php  endwhile;?>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'post', 'show', 'standup', 'set', 'episode'),'cat' => 4, 'posts_per_page' => 4 )); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                        /* Fetch the post ID for each post */
                            $postid = get_the_ID(); 
							$my_meta = get_post_meta($postid,'_my_meta',TRUE); 
										$format1 = $my_meta['format1'];
							?>
    
                            <div class="col-md-6 col-sm-6 col-xs-6 md-margin-bottom ">
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
                                        <h5 class="text-right"><?php echo get_the_date(); ?></h5>
                                        <?php /*?><?php if($format3) { ?><p class="text-right black"><?php echo $format3; ?></p><?php }?><?php */?>
                                    </div>
                                    <div class="valign-bottom-active ">
                                       <img src="assets/images/ico_play_active.png" />
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
        </div>
    </div>	
</div>