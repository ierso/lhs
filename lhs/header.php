<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LHS
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php bloginfo( 'url' ); ?>">
    			<img id="logo" src="<?php bloginfo('template_directory'); ?>/img/header/logo.svg" alt="logo">
    			<p id="company">Lee H. Smith & Company</p>
		    </a>
		    <nav id="mobile-nav">
				<div class="hamburger">&#9776;</div>
		  		<div class="cross">&#735;</div>
			</nav>
		</div>
		
		<div class="menu">
			<nav id="main-nav" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
			</nav>
		</div>

	</header>

	<div id="content" class="site-content">