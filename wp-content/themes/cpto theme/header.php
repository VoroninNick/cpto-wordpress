<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

	<link
  href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,cyrillic'
  rel='stylesheet' type='text/css'>

	<link rel="icon" href="/wp-content/uploads/2013/10/favicon.ico" type="image/x-icon" />

	<link rel="shortcut icon"href="/wp-content/uploads/2013/10/favicon.ico" type="image/x-icon" />


    <meta charset="utf-8" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>	


	<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" media="all" /> 

	
	<link href="<?php bloginfo('template_directory'); ?>/css/layerslider.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing-1.3.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquerytransit.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/layerslider.transitions.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/layerslider.kreaturamedia.jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js" rel="stylesheet" ></script>

</head>
 <body>
   <div class="padding_top_to_header"></div>
	<div class="page_header">
		<div class="page_header_top">
			<div class="page_header_top_pading_for_logo"></div>
			<div class="page_header_top_navigation">
				<div class=" nav_item"><a href="/" ><img src="<?php bloginfo('template_directory'); ?>/img/home.png" title="На головну"/></a></div>

				<div class=" nav_item"><a href="mailto:nazariy.papizh@gmail.com" ><img src="<?php bloginfo('template_directory'); ?>/img/mail.png" title="Написати листа"/></a></div>

				<div class=" nav_item"><a href="/site-map/" ><img src="<?php bloginfo('template_directory'); ?>/img/site_map.png" title="Карта сайту"/></a></div>

				<div class=" nav_item"><a href="/kontakty/" class="img_search" ><img src="<?php bloginfo('template_directory'); ?>/img/phone.png" title="Контакти"/></a></div>

				<div class=" nav_item dropclick"><a><img src="<?php bloginfo('template_directory'); ?>/img/search.png" title="Пошук"/></a></div>



			</div>

			<div class="searchform">



				<form method="get" id="searchform" class="go_to_left" action="<?php bloginfo('home'); ?>">

    <input type="text" value="Пошук по сайту.." name="s" class="input" onfocus="if (this.value == 'Пошук по сайту..') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Пошук по сайту..';}"/>

<input type="submit" id="searchsubmit" value="Шукати" class="findButton" />

</form>



			</div>

			<div class="page_header_top_phone_number">			

				<p>+38 (032) 232 22 62</p>

			</div>

			<div class="page_header_top_blue_line"></div>

		</div>

		<div class="page_header_bottom">

			<div class="page_header_logo">

				<div class="page_header_logo_img">

					<a href="/">

					<img src="<?php bloginfo('template_directory'); ?>/img/page_header_logo.png" title="На головну"/>

					</a>

				</div>

				<div class="page_header_logo_text">

					<a href="/">

					<p>Львівський центр ПТО ДСЗ</p>

					</a>

				</div>

			</div>

			<div class="page_header_main_menu">

				<?php wp_nav_menu( array('menu' => 'Головне меню' )); ?>  

			</div>

		</div>

	</div>