<?php get_header(); ?>
	<main role="main">
		<!-- section -->
		<section class="archive-container">
			<div class="sticky-scroll">
				<span>ARHIVA</span>
			</div>
			
			<h1 class="text-center none"><?php _e( 'Archives', 'bud3' ); ?></h1>

			<?php /*get_template_part('loop'); 

			get_template_part('pagination'); */?>
			
			<div class="archive-posts-container flex flex-wrap" data-paged="1">
				<div class="flex flex-center loading">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loader.gif" class="loader-gif vertical-align-center">
				</div>
			</div>
			<div class="text-center">
				<div class="loadmore"><span class="noto"><b>UČITAJ JOŠ</b></span></div>
			</div>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
