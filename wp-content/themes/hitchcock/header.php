<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
 
		<?php wp_head(); ?>
	    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.4/css/ol.css" type="text/css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <script src="https://openlayers.org/en/v4.6.4/build/ol.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	    <!-- <script src="<?php echo get_template_directory_uri(); ?>/js/ol-debug.js"></script> -->
	    <script src="<?php echo get_template_directory_uri(); ?>/js/editor.js"></script>
	
	</head>
	
	<body <?php body_class(); ?>>
		
		<div class="navigation">
			
			<div class="section-inner">
				
				<ul class="main-menu">
																		
					<?php 
					if ( has_nav_menu( 'primary' ) ) {

						$nav_args = array( 
							'container' 		=> '',
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary',
						);
																		
						wp_nav_menu( $nav_args );

					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> ''
						);

						wp_list_pages( $list_pages_args );

					} 
					?>
					
				</ul>
				
				<div class="clear"></div>
				
			</div><!-- .section-inner -->
			
			<div class="nav-toggle">
					
				<div class="bars">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
				
			</div><!-- .nav-toggle -->
			
			<div class="mobile-navigation">
			
				<ul class="mobile-menu">
																			
					<?php 
					
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( $nav_args );
					} else {
						wp_list_pages( $list_pages_args );
					}
					?>
					
				</ul>
				
				<?php get_search_form(); ?>
			
			</div><!-- .mobile-navigation -->
			
		</div><!-- .navigation -->

		<?php $image_image_url = get_header_image() ? get_header_image() : get_template_directory_uri() . '/images/bg.jpg'; ?>
		
		<div class="header-image" style="background-image: url( <?php echo $image_image_url; ?> );"></div>
	
		<div class="header section-inner">
		
			<?php if ( get_theme_mod( 'hitchcock_logo' ) ) : ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_theme_mod( 'hitchcock_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php else : 
				
				$title_type = is_singular() ? '2' : '1';
				?>
		
				<h<?php echo $title_type; ?> class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h<?php echo $title_type; ?>>
				
			<?php endif; ?>
			
			<?php if ( get_bloginfo( 'description' ) ) : ?>
			
				<p class="blog-description"><?php echo bloginfo( 'description' ); ?></p>
			
			<?php endif; ?>
			
			<?php if ( has_nav_menu( 'social' ) ) : ?>
			
				<ul class="social-menu">
							
					<?php 
					wp_nav_menu( array(
						'theme_location'	=>	'social',
						'container'			=>	'',
						'container_class'	=>	'menu-social',
						'items_wrap'		=>	'%3$s',
						'menu_id'			=>	'menu-social-items',
						'menu_class'		=>	'menu-items',
						'depth'				=>	1,
						'link_before'		=>	'<span class="screen-reader-text">',
						'link_after'		=>	'</span>',
						'fallback_cb'		=>	'',
					) );
					?>
					
				</ul><!-- .social-menu -->
			
			<?php endif; ?>
			
		</div><!-- .header -->