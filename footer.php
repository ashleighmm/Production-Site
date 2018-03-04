<div class="container-fluid lg-margin-top">
	<footer class="text-center">
      <div class="container lg-margin-top">
        <div class="row">
          <div class="col-xs-12 md-margin-bottom">
            <a href="index.php"><img src="assets/images/logo_95x20.png"></a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <ul class="list-inline footer-links">
            	<li><a href="people-main.php"><h5 class="black">PEOPLE</h5></a></li>
                <li><a href="things-main.php"><h5 class="black">THINGS</h5></a></li>
                <li><a href="contact.php"><h5 class="black">CONTACT</h5></a></li>
                <!--<li><h5 class="black">SUBSCRIBE</h5></li>-->
            </ul>
          </div>
        </div>
      </div>
    </footer>
</div>

<footer class="navbar navbar-default dark-bg no-margin-bottom border-bottom">
    <div class="container">
    	<div class="navbar social-icons">
            <ul class="nav navbar-nav center-nav">
                <li><a href="https://www.facebook.com/Gunga7com-616234865192834/" target="_blank"><i class="fa fa-2x fa-facebook white"></i></a></li>
                <li><a href="https://twitter.com/Gunga7_com" target="_blank"><i class="fa fa-2x fa-twitter white"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCnvEWPkbYa5yEL-NBPLGMmA" target="_blank"><i class="fa fa-2x fa-youtube white"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="assets/js/vendor/holder.min.js"></script>
<script type="text/javascript">
    $('.dropdown-menu').click(function(e) {
          e.stopPropagation();
    });
	$('.dropdown-toggle').dropdownHover(options);
	
	//Carousel / Slider time interval
	$('.carousel').carousel({
  		interval: 1000	
  	});
	
	//Toogle descriptions
	
	
</script>

  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="assets/slick/slick.min.js"></script>
  
  <script type="text/javascript">
		/*$(document).ready(function() {
			$("#playlist-big").youtube_video({
				playlist: 'PLcj6TX5WbOkDwJWWDtsx6r5OaNQhoLhQX',
				channel: false,
				user: false,
				videos: false,
				shuffle: false,
				max_results: 50,
				pagination: true,
				continuous: true,
				first_video: 0,
				show_playlist: 'auto',
				playlist_type: 'vertical',
				show_channel_in_playlist:true,
				show_channel_in_title: true,
				width: false,
				show_annotations: false,
				now_playing_text: 'Now Playing',
				load_more_text: 'Load More',
				autoplay: false,
				force_hd: false,
				hide_youtube_logo: false,
				play_control: true,
				time_indicator: 'full',
				volume_control: true,
				share_control: true,
				fwd_bck_control: true,
				youtube_link_control: true,
				fullscreen_control: true,
				playlist_toggle_control:true,
				volume: false,
				show_controls_on_load: true,
				show_controls_on_pause: true,
				show_controls_on_play: false,
				player_vars: {},
				colors: {},

				on_load: 			function(snippet) { set_log('loaded', snippet) },
				on_done_loading: 	function(videos) { set_log('videos', videos) },
				on_state_change:	function(state) { set_log('state', state) },
				on_seek: 			function(seconds) { set_log('seek', seconds) },
				on_volume: 			function(volume) { set_log('volume', volume) },
				on_time_update: 	function(seconds) { set_log('time', seconds) },

			});
			$("#playlist-small").youtube_video({
				playlist: 'PLcj6TX5WbOkDwJWWDtsx6r5OaNQhoLhQX',
				channel: false,
				user: false,
				videos: false,
				shuffle: false,
				max_results: 50,
				pagination: true,
				continuous: true,
				first_video: 0,
				show_playlist: 'auto',
				playlist_type: 'horizontal',
				show_channel_in_playlist:true,
				show_channel_in_title: true,
				width: false,
				show_annotations: false,
				now_playing_text: 'Now Playing',
				load_more_text: 'Load More',
				autoplay: false,
				force_hd: false,
				hide_youtube_logo: false,
				play_control: true,
				time_indicator: 'full',
				volume_control: true,
				share_control: true,
				fwd_bck_control: true,
				youtube_link_control: true,
				fullscreen_control: true,
				playlist_toggle_control:true,
				volume: false,
				show_controls_on_load: true,
				show_controls_on_pause: true,
				show_controls_on_play: false,
				player_vars: {},
				colors: {},

				on_load: 			function(snippet) { set_log('loaded', snippet) },
				on_done_loading: 	function(videos) { set_log('videos', videos) },
				on_state_change:	function(state) { set_log('state', state) },
				on_seek: 			function(seconds) { set_log('seek', seconds) },
				on_volume: 			function(volume) { set_log('volume', volume) },
				on_time_update: 	function(seconds) { set_log('time', seconds) },

			});
		});
*/
		function set_log(title, val) {
			$(".log").html('<div><span>'+title+'</span>'+val+'</div>'+$(".log").html());
		}
		
		
// Enable link to tab
var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
    $('.navbar-nav li a[href='+hash.replace(prefix,"")+']').tab('show');
} 

// Change hash for page-reload
$('.navbar-nav li a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});

/*$(document).ready( function(){
  $("#my-iframe").attr("src", $(".playlist li a:first").attr("href"));
});*/

</script> 
</body>
</html>