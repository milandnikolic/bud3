<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" >

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700|Noto+Sans:400,700|Oswald:300,400,700&amp;subset=latin-ext" rel="stylesheet">

		<?php wp_head(); ?>
		<script>conditionizr.config({assets:'<?php echo get_template_directory_uri(); ?>',tests:{}});</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-20723910-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-20723910-1');
		</script>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<?php if ( !wp_is_mobile() ):  ?>
			<header class="header clear" role="banner">
				
				<div class="container flex flex-vertical-center flex-end">

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
					</nav>
					<!-- /nav -->
					<?php get_template_part('template-parts/socials'); ?>
					
					<?php get_template_part('searchform'); ?>
				</div>
								
			</header>
			<?php endif; ?>
			<!-- /header -->

			<div class="body-content">

				<div class="main-body">
				
					<?php if ( !wp_is_mobile() ):  ?>
					<div class="main-navigation-wrapper">
						<div class="main-navigation flex flex-vertical-center">
							<div class="sticky-container flex flex-vertical-center">
							
								<!-- logo -->
								<div class="logo">
									<a href="<?php echo home_url(); ?>">						
										<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="BUD3" class="logo-img" >
									</a>
									<?php if( is_single() || is_page_template('templates/page-tpl-about.php') ): ?>
										<img style="display: block;" src="<?php echo get_template_directory_uri(); ?>/img/BUD3-Slogan-02.png" alt="REKREACIJA ZA UBR3ANU GENERACIJU" class="slogan">
									<?php else: ?>
										<img style="display: block;" src="<?php echo get_template_directory_uri(); ?>/img/BUD3-Slogan-01.png" alt="REKREACIJA ZA UBR3ANU GENERACIJU" class="slogan">
									<?php endif; ?>
								</div>
								<!-- /logo -->


								<!-- nav -->
								<nav class="nav" role="navigation">
									<?php bud3_nav(); ?>
								</nav>
								<!-- /nav -->

								 <div class="br-search-field search-sticky"> 
									<?php get_template_part('searchform'); ?>
								 </div> 
							
							</div><!-- /sticky-container -->
						</div><!-- /main-navigation-wrapper -->
					</div>
					<?php else: ?>	
					<div class="container flex flex-vertical-center flex-space-between mobile-header">
				
						<div class="mob-logo">
							<a href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo-mob.png" alt="BUD3" class="logo-img">
							</a>
							<?php if( is_single() || is_page_template('templates/page-tpl-about.php') ): ?>
										<img style="display: block;" src="<?php echo get_template_directory_uri(); ?>/img/BUD3-Slogan-02.png" alt="REKREACIJA ZA UBR3ANU GENERACIJU" class="slogan">
								<?php else: ?>
										<img style="display: block;" src="<?php echo get_template_directory_uri(); ?>/img/BUD3-Slogan-01.png" alt="REKREACIJA ZA UBR3ANU GENERACIJU" class="slogan">
							<?php endif; ?>
						</div>

						<i class="fas fa-bars"></i>

					</div>
						<?php get_template_part('template-parts/mobile-menu');  ?>
						
					<?php endif; ?>