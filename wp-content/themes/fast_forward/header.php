<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title() ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/style.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/js/slick/slick.css"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,600' rel='stylesheet' type='text/css'>

    <!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
    <!--[if lte IE 9]>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <?php gravity_form_enqueue_scripts(1, true); ?>
    <?php wp_head() ?>
    
</head>
<body<?php if (is_front_page()): ?> id="home"<?php endif ?>>
    <!--header-->
    <?php $siteLogo=get_option('upload_image');
 $twitterUrl=get_option('Twitter');
 $vimeoUrl=get_option('Vimeo');
 $facebookUrl=get_option('facebook');
 $amzonLink=get_option('AmzonUkLink');
 $amzoncomLink=get_option('AmzoncomLink');
?>

    <header id="header">
        <div class="container">
            <h1 id="home-link">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $siteLogo; ?>"> </a>
            </h1>
            <nav class="amazon">
                <ul>
                    <li><a href="<?php echo $amzonLink; ?>" target="_blank" class="uk">
                            <img src="<?php bloginfo('template_directory') ?>/images/amazon-uk.svg" alt="amazon.co.uk" /></a></li>
                            <li><a href="<?php echo $amzoncomLink; ?>" class="usa">
                                    <img src="<?php bloginfo('template_directory') ?>/images/amazon-usa.svg" alt="amazon.com" /></a>
                    </li>
                </ul>
            </nav>

            <nav class="social">
                <ul>
                    <li>
                        <a href="<?php echo $twitterUrl; ?>" target="_blank">Twitter</a></li>
                    <li><a href="<?php echo $facebookUrl; ?>" class="fb" target="_blank">Facebook</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!--/header-->
    <!-- nav -->
    <nav id="nav">
	 <div class="container">
	<a id="mobile-menu" class="">Menu</a>
        <?php wp_nav_menu(array('menu' => 'Navigation Menu')); ?>
      </div>
    </nav>
