<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">
  <title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?></title>
  <!-- mobile meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- icons & favicons -->
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-touch.png"> 
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <![endif]-->
  <meta name="msapplication-TileColor" content="#1cbb9b">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/icons/win8-tile-icon.png">
  <link rel="author" href="https://www.google.com/+HamishWilliams" content="Hamish Williams – designer and evil mastermind."/>
  <?php wp_head(); ?>
  <!-- Google Analytics -->
    <?php include_once("php/analyticstracking.php") ?>
  <!-- end analytics -->
</head>

<body <?php body_class('spmenu-push'); ?>>

  <header class="tab-bar tab-bar-left tab-bar-active" id="showLeftPush">
    <span id="menu-icon" class="icon-list"></span>
    <a class="logo-small"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_40px.svg" alt="small logo"/></a>
  </header>

  <nav class="spmenu spmenu-left" id="spmenu-s1">
    <div class="nav-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_150px.svg" alt="large logo"/></div>
    <div class="nav-list">
      <ul class="no-bullet">
        <?php wp_list_pages('title_li=');?>
        <li><a href="#" id="hideLeftPush" data-reveal-id="contactModal">Contact</a></li>
      </ul>
    </div>

    <div class="socialism">
      <ul>
        <li><a href="http://lnkd.in/bbXaTCd" target="_blank" class="icon-linkedin"><span class="screen-reader-text">linked in</span></a></li>
        <li><a href="http://www.youtube.com/user/Yamanotaka" target="_blank" class="icon-youtube-play"><span class="screen-reader-text">youtube</span></a></li>
        <li><a href="https://twitter.com/hamishMW" target="_blank" class="icon-twitter"><span class="screen-reader-text">twitter</span></a></li>
        <li><a href="https://www.google.com/+HamishWilliams?rel=author" target="_blank" class="icon-gplus"><span class="screen-reader-text">google plus</span></a></li>
      </ul>
    </div>

    <div class="copyright">
      <small>© Hamish Williams 2014.</small>
    </div>
  </nav>
    
  <div id="contactModal" class="reveal-modal" data-reveal> 
    <?php include (TEMPLATEPATH . '/contact.php'); ?>
  </div>
  <div id="konami" class="reveal-modal large" data-reveal> </div>
