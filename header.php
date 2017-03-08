    <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title('/'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/main.css?v=1.0.3">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700' rel='stylesheet' type='text/css'>
        <script src="<?php bloginfo('template_directory') ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- jquery -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- Fliplightbox-->
        <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/fliplightbox.min.js"></script>
        
        <!-- Collage plus -->
        <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.collagePlus.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.removeWhitespace.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.collageCaption.min.js"> </script>
        
        <script type="text/javascript"> 

		// All images need to be loaded for this plugin to work so
            // we end up waiting for the whole window to load in this example
            $(window).load(function () {
                $(document).ready(function(){
                    collage();
                    $('.Collage').collageCaption();
                });
            });


            // Here we apply the actual CollagePlus plugin
            function collage() {
                $('.Collage').removeWhitespace().collagePlus(
                    {
                        'fadeSpeed'     : 200,
                        'targetHeight'  : 300,
                        'direction'     : 'vertical',
                        'allowPartialLastRow' : true,
                    }
                );
            };

             // This is just for the case that the browser window is resized
            var resizeTimer = null;
            $(window).bind('resize', function() {
                // set a timer to re-apply the plugin
                if (resizeTimer) clearTimeout(resizeTimer);
                resizeTimer = setTimeout(collage, 200);
            });

        </script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            <h1><?php bloginfo('name'); ?></h1>
        </header>
        <div id="wrapper">
            
            <?php wp_nav_menu( array( 'menu_class' => 'menu', 'depth' => 1 , 'container' => 'nav', 'container_class' => 'main-menu', 'container_id' => 'main-menu', 'fallback_cb' => false) ); ?>

<code><?php if(function_exists('chi_display_header')) { chi_display_header(); } ?></code>