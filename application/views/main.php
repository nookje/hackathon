<!DOCTYPE html>
    <!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Hackathon</title>
        
        <!-- Mobile Specific
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" type="text/css" href="/static/css/style.css">
        <!--
        included in custom.css to avoid to many requests
        <link rel="stylesheet" type="text/css" href="/static/css/boxed.css" id="layout">
        <link rel="stylesheet" type="text/css" href="/static/css/colors/red.css" id="colors">
        -->
        <link rel="stylesheet" type="text/css" href="/static/css/custom.css" id="custom">
        <!-- Java Script
        ================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="/static/js/custom.js"></script>
        <script src="/static/js/selectnav.js"></script>
        <script src="/static/js/flexslider.js"></script>
        <script src="/static/js/twitter.js"></script>
        <script src="/static/js/tooltip.js"></script>
        <script src="/static/js/effects.js"></script>
        <script src="/static/js/fancybox.js"></script>
        <script src="/static/js/carousel.js"></script>
        <script src="/static/js/isotope.js"></script>
    </head>
	<?php 
		switch (get_class($body_model)) {
			case "Homepage_model":
				$page = "home";
				break;
			case "Despre_model":
				$page = "despre-noi";
				break;
			case "Contact_model":
				$page = "contact";
				break;				
			case "Produse_model":
				$page = "produse";
				break;				
			case "Noutati_model":
				$page = "noutati";
				break;				
			case "Download_model":
				$page = "download";
				break;				
			default:
				$page = "";				
				break;
		}
	?>
    <body id="<?= $page ?>">
        <!-- Wrapper Start -->
        <div id="wrapper">
            <!-- 960 Container -->
            <div class="container ie-dropdown-fix">
                <!-- Header -->
                <div id="header">
                    <!-- Logo -->
                    <!-- Social / Contact -->
                    <div class="eight columns">
                    	<a href="?change_language=en"><img src="/static/images/en.png" style="float:right; "></a>
                    	<a href="?change_language=ro"><img src="/static/images/ro.png" style="float:right; margin-right:5px;"></a>
                    
                        <div class="clear"></div>
                        <!-- Contact Details -->
                    </div>
                </div>
                <!-- Header / End -->
            
                <!-- Navigation -->
                <div class="sixteen columns">
                    <div id="navigation">
                        <ul id="nav">
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- Navigation / End -->
            </div>
        	<!-- 960 Container / End -->
        
            <?php     
                if (isset($pass_along)) {
                    $body_model->display($pass_along);
                } else {
                    $body_model->display();
                }
            ?>
        </div>
        <!-- Wrapper / End -->
    
        <!-- Footer Start -->
        <div id="footer">
            <div class="container">
                <div class="sixteen columns">
                    <div id="footer-bottom">
                        <div id="scroll-top-top"><a href="#"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer / End -->
    
    </body>
</html>
