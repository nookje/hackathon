<!DOCTYPE html>
    <!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Robmet</title>
        
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
                    <div class="eight columns">
                        <div id="logo">
                            <a href="/"><img src="/static/images/robmet_logo_web.png" alt="logo" /></a>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- Social / Contact -->
                    <div class="eight columns">
                    	<a href="?change_language=en"><img src="/static/images/en.png" style="float:right; "></a>
                    	<a href="?change_language=ro"><img src="/static/images/ro.png" style="float:right; margin-right:5px;"></a>
                    
                        <div class="clear"></div>
                        <!-- Contact Details -->
                        <div id="contact-details">
                            <ul>
                                <li><i class="mini-ico-envelope"></i><a href="#">contact@robmet.ro</a></li>
                                <li><i class="mini-ico-user"></i>+40 233 233 460</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Header / End -->
            
                <!-- Navigation -->
                <div class="sixteen columns">
                    <div id="navigation">
                        <ul id="nav">
                            <li><a <?php if ($page == 'home') { ?> class="active" <?php } ?> href="/<?= $translations[40] ?>"><?= $translations[30] ?></a></li>
                            <li><a <?php if ($page == 'despre-noi') { ?> class="active" <?php } ?> href="/<?= $translations[41] ?>"><?= $translations[31] ?></a></li>
                            <li><a <?php if ($page == 'produse') { ?> class="active" <?php } ?> href="/<?= $translations[42] ?>"><?= $translations[32] ?></a></li>
                            <li><a <?php if ($page == 'noutati') { ?> class="active" <?php } ?> href="/<?= $translations[43] ?>/lista"><?= $translations[33] ?></a></li>
                            <li><a <?php if ($page == 'download') { ?> class="active" <?php } ?> href="/<?= $translations[44] ?>"><?= $translations[34] ?></a></li>
                            <li><a <?php if ($page == 'contact') { ?> class="active" <?php } ?> href="/<?= $translations[45] ?>"><?= $translations[35] ?></a></li>
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
                        <?= $translations[36] ?>
                        <div id="scroll-top-top"><a href="#"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer / End -->
    
    </body>
</html>
