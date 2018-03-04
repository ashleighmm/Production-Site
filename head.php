<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="What's your favourite African comedy?">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>GUNGA7</title>

<link rel="stylesheet" href="assets/css/layout.css">

<!-- youtube video player -->
    <!-- Icons 
    <link rel="stylesheet" type="text/css" media="screen" href="youtube-video-player/packages/icons/css/icons.min.css" />-->
     
    <!-- Main Stylesheet 
    <link rel="stylesheet" type="text/css" media="screen" href="youtube-video-player/css/youtube-video-player.min.css" />-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     
    <!-- Main Javascript 
    <script type="text/javascript" src="youtube-video-player/js/youtube-video-player.jquery.min.js"></script>-->
     
    <!-- Perfect Scrollbar
    <link rel="stylesheet" type="text/css" media="screen" href="youtube-video-player/packages/perfect-scrollbar/perfect-scrollbar.css" />
    <script type="text/javascript" src="youtube-video-player/packages/perfect-scrollbar/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="youtube-video-player/packages/perfect-scrollbar/perfect-scrollbar.js"></script> -->
    
    <!-- /youtube video player -->

<!-- sortable portfolio -->
	<script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>	
    <script type="text/javascript" src="assets/js/jquery.mixitup.min.js"></script>
    
    <script type="text/javascript">
    $(function () {
        
        var filterList = {
        
            init: function () {
            
                // MixItUp plugin
                // http://mixitup.io
				
                $('#portfoliolist').mixitup({
					
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
					filter: '.errthang'
					
                    // call the hover effect
                    //onMixEnd: filterList.hoverEffect()
					
                });				
            
            },
            
            hoverEffect: function () {
            
                // Simple parallax effect
                $('#portfoliolist .portfolio').hover(
                    function () {
                        $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                        $(this).find('img').stop().animate({top: 0}, 500, 'easeOutQuad');				
                    },
                    function () {
                        $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeInQuad');
                        $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
                    }		
                );				
            
            }
    
        };
        
        // Run the show!
        filterList.init();
        
        
    });	
</script>

<!-- /sortable portfolio -->

<!-- slick thumbnails carousel -->

    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css"/>
    
    <script>
        
    $(document).ready(function(){
       
	$('.autoplay').slick({
		  dots: false,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			  }
			},
			{
			  breakpoint: 992,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			  }
			},
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				infinite: true,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
		});
  });
    </script>

<!-- /slick thumbnails carousel -->

<!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>