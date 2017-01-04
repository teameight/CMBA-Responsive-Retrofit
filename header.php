<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html class="custom" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php elegant_titles(); ?></title>

<?php elegant_description(); ?>

<?php elegant_keywords(); ?>

<?php elegant_canonical(); ?>



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/colorpicker.css" type="text/css" media="screen" />



<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>

<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>

<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'/>



<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<!--[if lt IE 7]>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>

	<script type="text/javascript">DD_belatedPNG.fix('img#logo, span.overlay, a.zoom-icon, a.more-icon, #menu, #menu-right, #menu-content, ul#top-menu ul, #menu-bar, .footer-widget ul li, span.post-overlay, #content-area, .avatar-overlay, .comment-arrow, .testimonials-item-bottom, #quote, #bottom-shadow, #quote .container');</script>

<![endif]-->

<!--[if IE 7]>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />

<![endif]-->

<!--[if IE 8]>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8style.css" />

<![endif]-->



<script type="text/javascript">

	document.documentElement.className = 'js';

</script>



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>

<script type="text/javascript" src="http://www.lansrv030.com/js/86420.js" ></script>
<noscript><img src="http://www.lansrv030.com/86420.png" style="display:none;" /></noscript>

<div style="background-image: url('http://www.cmba.com/wp-content/uploads/2013/05/gradient-bar.png'); background-repeat: none; position: absolute; width: 100%; height: 50px; top: 100px;">&nbsp;</div>

	<div id="et-wrapper">

		<div id="header">

			<div class="container clearfix">

				<?php

					global $default_colorscheme;

					$colorSchemePath = '';

					$colorScheme = get_option('leanbiz_color_scheme');

					if ( $colorScheme <> $default_colorscheme ) $colorSchemePath = strtolower($colorScheme) . '/';

				?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

					<?php $logo = (get_option('leanbiz_logo') <> '') ? esc_attr(get_option('leanbiz_logo')) : get_template_directory_uri() . '/images/' . $colorSchemePath . 'logo.png'; ?>

					<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="logo"/>

				</a>

				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php 
wp_nav_menu(array(
  'menu' => 'Main Menu', 
  'container_id' => 'cssmenu', 
  'walker' => new CSS_Menu_Maker_Walker()
)); 
?>










				
				
				
				
				
				
				
				
				
				
				
				
				
				

				<div id="utility-menu" style="float: right;">

					<a href="http://www.cmba.com/find-a-member/" title="Find A Member" >Find A Member</a> | <a href="https://cmba.ps.membersuite.com/" title="My Account" target="_blank">My Account</a> | <a href="http://store.mortgagebankers.org/stHome.aspx?skin=CA" title="Education" >MBA Education</a> | <a href="http://www.cmba.com/contact-us/" title="Contact Us">Contact Us</a> <span class="social-icons"><a href="https://www.facebook.com/californiamortgage.bankersassociation?ref=tn_tnmn" title="CMBA's Facebook" target="_blank" class="facebook">&nbsp;</a><a href="http://www.linkedin.com/pub/california-mortgage-bankers-association/11/29b/331/" title="CMBA's LinkedIn" target="_blank" class="linked-in">&nbsp;</a><a href="http://twitter.com/CAMortgBankers" title="CMBA's Twitter" target="_blank" class="twitter">&nbsp;</a><a href="http://youtube.com/CAMortgageBankers" title="CMBA's Youtube" target="_blank" class="youtube">&nbsp;</a></span>

				</div> <!-- end #search-form -->



				<?php do_action('et_header_top'); ?>

			</div> <!-- end .container -->

		</div> <!-- end #header -->



		<?php global $et_show_featured_slider;

			$et_show_featured_slider = is_home() && get_option('leanbiz_featured') == 'on';

		?>



		<div id="featured"<?php if ( $et_show_featured_slider ) echo ' class="home-featured-slider"'; ?>>

			<div id="featured-a">

				<div id="featured-b">

					<?php

						$et_slider_settings_class = '';

						if ( $et_show_featured_slider ) {

							$et_slider_auto = 'on' == get_option('leanbiz_slider_auto') ? ' et_slider_auto' : '';



							$et_slider_auto_speed = false !== get_option('leanbiz_slider_autospeed') ? get_option('leanbiz_slider_autospeed') : '7000';

							$et_slider_auto_speed = ' et_slider_autospeed_' . $et_slider_auto_speed;



							$et_slider_pause = 'on' == get_option('leanbiz_slider_pause') ? ' et_slider_pause' : '';



							$et_slider_settings_class = $et_slider_auto . $et_slider_auto_speed . $et_slider_pause;

						}

					?>

					<div <?php if ( $et_show_featured_slider ) echo ' id="main-featured-slider"'; ?> class="container<?php echo esc_attr( $et_slider_settings_class ); ?>">

						<?php if ( $et_show_featured_slider ) get_template_part('includes/featured','home'); ?>