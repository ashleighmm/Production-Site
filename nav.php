<!-- Fixed navbar -->
<?php

?>
<nav class="navbar navbar-default navbar-fixed-top no-margin-bottom dark-bg">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand md-margin-left" href="http://www.gunga7.com/" ><img src="assets/images/gunga7.png"></a> </div>
        <div id="navbar" class="navbar-collapse collapse dropdown ">
        <ul class="nav navbar-nav navbar-left">
    	<li >Watch your favourite African comedy</li>
    </ul> 
            <ul class="nav navbar-nav navbar-right md-margin-right">
                <li class="dropdown"> <a id="dLabel" role="button"  data-hover="dropdown" class="btn btn-primary" data-target="#" href="things-main.php">
                    <h4>WATCH</h4>
                    </a>
                    <ul class="dropdown-menu multi-level " role="menu" aria-labelledby="dropdownMenu">
                        
                        <li class="dropdown-submenu"> <a tabindex="-1" href="things-main.php" class="dropdown-toggle disabled" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">
                            <h4 class="submenu-list-item">SHOWS</h4>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <?php $loop1 = new WP_Query( array( 'post_type' => 'show')); ?>
                                <?php while ( $loop1->have_posts() ) : $loop1->the_post(); 
								$postid = get_the_ID();
								//$my_meta = get_post_meta($postid,'_my_meta',TRUE);
								//$main_show = $my_meta['main_show'];
								//if ($main_show) {
								/* Fetch the post ID for each post */
								 ?>
                                <li><a href="show.php?post_id=<?php echo $postid ?>">
                            <h4 class="submenu-list-item"><?php echo the_title(); ?></h4></a></li>
                            	
                                <?php // } 
								endwhile; ?>
                            </ul>
                        </li>
                        <li class="dropdown-submenu "> <a tabindex="-1" href="things-main.php" class="dropdown-toggle disabled" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">
                            <h4 class="submenu-list-item">STAND-UP</h4>
                            </a>
                            <ul class="dropdown-menu">
                                <?php $loop1 = new WP_Query( array( 'post_type' => 'standup')); ?>
                                <?php while ( $loop1->have_posts() ) : $loop1->the_post(); 
			
								/* Fetch the post ID for each post */
								$postid = get_the_ID(); ?>
                                <li><a href="set.php?post_id=<?php echo $postid ?>">
                            <h4 class="black submenu-list-item"><?php echo the_title(); ?></h4></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                	<a href="people-main.php"><h4>PEOPLE</h4></a>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search nav-search"></i></a>
                <ul class="dropdown-menu dropdown-search dropdown-messages">
                    <li class="sm-padding-top sm-padding-bottom">
                        <div class="input-group custom-search-form container">
                            <form role="search" method="get" id="searchform" action="search-results.php">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Search..." value="" name="s" id="s" >
                                       

                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="submit" name="search" id="searchsubmit" class="form-control submit" value="Find it for me" />
                                        <input type="hidden" name="post_type[]" value="artists" />
                                    </div>
                                </div>
                                <?php /*?><div class="row xs-margin-top">
                            <div class="form-inline">
                            <div class="form-group col-md-5 text-left">
                                <div class="row">
                                    <label class="col-sm-4 control-label" for="formGroupInputSmall" >I'm looking for:</label>
                                    <div class="col-sm-8">
                                    <?php
											// output all of our Categories
											// for more information see http://codex.wordpress.org/Function_Reference/wp_dropdown_categories
											$swp_cat_dropdown_args = array(
													'taxonomy' => 'show-titles',
													'show_option_all'  => __( 'Select an option' ),
													'name'             => 'swp_category_limiter',
													'class' 		   => 'form-control'
												);
											wp_dropdown_categories( $swp_cat_dropdown_args );
										?>
                                        
                                    </div>
                                 </div>
                            </div>
                            <div class="form-group col-md-5 text-left">
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="formGroupInputSmall" >Featuring</label>
                                    <div class="col-sm-9">
                                    <?php
											// output all of our Categories
											// for more information see http://codex.wordpress.org/Function_Reference/wp_dropdown_categories
											$swp_cat_dropdown_args = array(
													'taxonomy' => 'show-categories',
													'show_option_all'  => __( 'Select an option' ),
													'name'             => 'swp_category_limiter',
													'class' 		   => 'form-control'
												);
											wp_dropdown_categories( $swp_cat_dropdown_args );
										?>
                                        <!--<select name="type" id="formGroupInputSmall" class="form-control">
                                            <option>Kagiso Ladiga</option>
                                            <option>Loyiso Madinga</option>
                                            <option>Loyiso Gola</option>
                                        </select>-->
                                    </div>
                                 </div>
                            </div>
                            
                            
                          </div>
                        </div><?php */?>
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
        <!--/.nav-collapse --> 
        
    </div>
</nav>
<script type="text/javascript">
	/**
 * @preserve
 * Project: Bootstrap Hover Dropdown
 * Author: Cameron Spear
 * Version: v2.2.1
 * Contributors: Mattia Larentis
 * Dependencies: Bootstrap's Dropdown plugin, jQuery
 * Description: A simple plugin to enable Bootstrap dropdowns to active on hover and provide a nice user experience.
 * License: MIT
 * Homepage: http://cameronspear.com/blog/bootstrap-dropdown-on-hover-plugin/
 */
;(function ($, window, undefined) {
    // outside the scope of the jQuery plugin to
    // keep track of all dropdowns
    var $allDropdowns = $();

    // if instantlyCloseOthers is true, then it will instantly
    // shut other nav items when a new one is hovered over
    $.fn.dropdownHover = function (options) {
        // don't do anything if touch is supported
        // (plugin causes some issues on mobile)
        if('ontouchstart' in document) return this; // don't want to affect chaining

        // the element we really care about
        // is the dropdown-toggle's parent
        $allDropdowns = $allDropdowns.add(this.parent());

        return this.each(function () {
            var $this = $(this),
                $parent = $this.parent(),
                defaults = {
                    delay: 0,
                    hoverDelay: 0,
                    instantlyCloseOthers: true
                },
                data = {
                    delay: $(this).data('delay'),
                    hoverDelay: $(this).data('hover-delay'),
                    instantlyCloseOthers: $(this).data('close-others')
                },
                showEvent   = 'show.bs.dropdown',
                hideEvent   = 'hide.bs.dropdown',
                // shownEvent  = 'shown.bs.dropdown',
                // hiddenEvent = 'hidden.bs.dropdown',
                settings = $.extend(true, {}, defaults, options, data),
                timeout, timeoutHover;

            $parent.hover(function (event) {
                // so a neighbor can't open the dropdown
                if(!$parent.hasClass('open') && !$this.is(event.target)) {
                    // stop this event, stop executing any code
                    // in this callback but continue to propagate
                    return true;
                }

                openDropdown(event);
            }, function () {
                // clear timer for hover event
                window.clearTimeout(timeoutHover)
                timeout = window.setTimeout(function () {
                    $this.attr('aria-expanded', 'false');
                    $parent.removeClass('open');
                    $this.trigger(hideEvent);
                }, settings.delay);
            });

            // this helps with button groups!
            $this.hover(function (event) {
                // this helps prevent a double event from firing.
                // see https://github.com/CWSpear/bootstrap-hover-dropdown/issues/55
                if(!$parent.hasClass('open') && !$parent.is(event.target)) {
                    // stop this event, stop executing any code
                    // in this callback but continue to propagate
                    return true;
                }

                openDropdown(event);
            });

            // handle submenus
            $parent.find('.dropdown-submenu').each(function (){
                var $this = $(this);
                var subTimeout;
                $this.hover(function () {
                    window.clearTimeout(subTimeout);
                    $this.children('.dropdown-menu').show();
                    // always close submenu siblings instantly
                    $this.siblings().children('.dropdown-menu').hide();
                }, function () {
                    var $submenu = $this.children('.dropdown-menu');
                    subTimeout = window.setTimeout(function () {
                        $submenu.hide();
                    }, settings.delay);
                });
            });

            function openDropdown(event) {
                if($this.parents(".navbar").find(".navbar-toggle").is(":visible")) {
                    // If we're inside a navbar, don't do anything when the
                    // navbar is collapsed, as it makes the navbar pretty unusable.
                    return;
                }

                // clear dropdown timeout here so it doesnt close before it should
                window.clearTimeout(timeout);
                // restart hover timer
                window.clearTimeout(timeoutHover);
                
                // delay for hover event.  
                timeoutHover = window.setTimeout(function () {
                    $allDropdowns.find(':focus').blur();

                    if(settings.instantlyCloseOthers === true)
                        $allDropdowns.removeClass('open');
                    
                    // clear timer for hover event
                    window.clearTimeout(timeoutHover);
                    $this.attr('aria-expanded', 'true');
                    $parent.addClass('open');
                    $this.trigger(showEvent);
                }, settings.hoverDelay);
            }
        });
    };

    $(document).ready(function () {
        // apply dropdownHover to all elements with the data-hover="dropdown" attribute
        $('[data-hover="dropdown"]').dropdownHover();
    });
})(jQuery, window);



</script>