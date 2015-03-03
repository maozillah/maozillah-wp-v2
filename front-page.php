<!-- start header -->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<!-- <body <?php body_class(); ?> > -->
<body class="cbp-spmenu-push">
<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', '_mbbasetheme' ); ?></button>
			
			<div class="buttons">


					<button id="showLeftPush">home left</button>
					<button id="showRightPush">home right</button>

			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div class="image-area">
<?php
$args = array( 'numberposts' => -1, 'post_type' => 'project');
$lastposts = get_posts( $args );
foreach ( $lastposts as $post ) :
  setup_postdata( $post ); ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_post_thumbnail(); ?>
	</a>
<?php endforeach; 
wp_reset_postdata(); ?>

	</div>

	<div id="content" class="site-content">

		<!-- end header -->

	<div id="primary" class="home-content">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- sidebar start -->
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<!-- sidebar end -->

<?php get_footer(); ?>
