<?php 
/**
 * The Header
 *
 * @package niek
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="image_src" href="http://niekdegreef.com/wp-content/themes/niekdegreef_v1/images/site-pic.jpg" / >
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<script src="//use.typekit.net/bzc2eti.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 9]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience. While I aim to provide the best cross-browser & backward support for my client-sites, this one's done in my limited spare time.</p>
<![endif]-->
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header group" role="banner">

		<div class="center_container">	

			<nav id="site-navigation" class="main-navigation" role="navigation">
				
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->

			<?php
			    if ( is_home() ) {
			    ?>

					<h1 class="tagline">
						 I design websites, books and their covers for <span>journalists</span>, <span>authors</span>, <span>artists</span>, <span>academics</span> and <span>businesses</span>.
					</h1>
			    
				<?php } 

				else { 
					// title?
				}
			?>


		</div>	

		<?php // echo get_bloginfo ( 'description' );  ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content group">