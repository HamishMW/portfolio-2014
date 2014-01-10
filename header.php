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
		<!-- <meta name="MobileOptimized" content="320"> -->
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

	<body class="spmenu-push" <?php body_class(); ?>>

	<header class="tab-bar tab-bar-left tab-bar-active" id="showLeftPush">
      <i id="menu-icon" class="icon-list"></i>
      <a class="logo-small"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_40px.png" alt="small logo"/></a>
    </header>

    <nav class="spmenu spmenu-left" id="spmenu-s1">
      <div class="nav-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_150px.png" alt="large logo"/></div>
      <div class="nav-list">
        <ul class="no-bullet">
          <li class="nav-current has-dropdown"><a href="index.html">Portfolio <span class="icon-"></span></a></li>
          <li><a href="#">Journal</a></li>
          <li><a href="#">Details</a></li>
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
      <h2>Awesome. I have it.</h2> 
      <hr>
      <form data-abide> 
        <div class="name-field top-reveal-field"> 
          <label>Your name*</label> 
          <input type="text" required pattern="[a-zA-Z]+"> 
          <small class="error">Your name is required.</small> 
        </div> 
        <div class="email-field top-reveal-field"> 
          <label>Email*</label> 
          <input type="email" required> 
          <small class="error">A valid email address is required.</small> 
        </div> 
        <div class="textarea-field">
          <label>Message*</label>
          <textarea required pattern="alpha_numeric" placeholder="Throw me a message" ></textarea>
          <small class="error">You need to write a message.</small> 
        </div>
        <button class="submit-btn btn-border" type="submit">Send Message</button>
        <!-- <button id="close-btn" class="close-reveal-modal">Close</button> -->
      </form>
      <a class="close-reveal-modal">&#215;</a> 
    </div>
			
