<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/icons/win8-tile-icon.png">

  	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

		<?php wp_head(); ?>
		
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class('spmenu-push'); ?>>

	<header class="tab-bar tab-bar-left tab-bar-active" id="showLeftPush">
      <i id="menu-icon" class="icon-list"></i>
      <a class="logo-small"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_40px.png" alt="small logo"/></a>
    </header>

    <nav class="spmenu spmenu-left" id="spmenu-s1">
      <div class="nav-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_150px.png" alt="large logo"/></div>
      <div class="nav-list">
        <ul class="no-bullet">
          <?php wp_list_pages('title_li=');?>

          <li><a href="#" id="hideLeftPush" data-reveal-id="contactModal">Contact</a></li>
        </ul>
      </div>

      <div class="socialism">
        <ul>
          <li><a href="http://lnkd.in/bbXaTCd" class="icon-linkedin"></a></li>
          <li><a href="http://www.youtube.com/user/Yamanotaka" class="icon-youtube-play"></a></li>
          <li><a href="https://twitter.com/hamishMW" class="icon-twitter"></a></li>
          <li><a href="https://plus.google.com/u/0/+HamishWilliams/" class="icon-gplus"></a></li>
        </ul>
      </div>

      <div class="copyright">
        <small>© Hamish Williams 2014.</small>
      </div>
    </nav>
    
    <div id="contactModal" class="reveal-modal" data-reveal> 
      <?php include (TEMPLATEPATH . '/contact.php'); ?>
    </div>
			
