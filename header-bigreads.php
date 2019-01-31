<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700|Noto+Sans|Oswald:400,700&amp;subset=latin-ext" rel="stylesheet">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

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


		<?php if ( !wp_is_mobile() ):  ?>
			<!-- header -->
			<header class="header clear" role="banner">
				<div class="bigreads-container">
				<div class="main-navigation pos-relative container flex flex-vertical-center flex-center">
					<div class="flex">
						<a class="logo-link" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
						<!-- nav -->
						<nav class="nav" role="navigation">
							<?php bud3_nav(); ?>
						</nav>
						<!-- /nav -->
						<div class="br-search-field">
						<?php get_template_part('searchform'); ?>
						</div>
					</div>
				</div>	
				</div>
			</header>
			<!-- /header -->
			<?php else: ?>
			<!-- mobile nav-->
			<div class="container flex flex-vertical-center flex-space-between mobile-header bigreads">
			
				<div class="mob-logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-mob.png" alt="BUD3" class="logo-img">
					</a>
				</div>

				<i class="fas fa-bars"></i>

			</div>
				<?php get_template_part('template-parts/mobile-menu');  ?>
			<!-- end of mobile nav -->
			<?php endif;?>

