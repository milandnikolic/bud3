<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<div class="tags-wrapper noto">
		<p class="text-uppercase"><b>KLJUČNE REČI</b> / TAGOVI</p>
			<?php the_tags( __( '', 'bud3' ), ''); ?>
					
	</div>
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>
<?php //square banner
							$fixed_banner_768 = get_field('fixed_banner_768', 'option');  
							$fixed_banner_768_url = get_field('fixed_banner_768_url', 'option'); 
							if($fixed_banner_768):
						?>
						<div class="advertise">
							<a href="<?php echo $fixed_banner_768_url; ?>" target="_blank"><img src="<?php echo $fixed_banner_768['url']; ?>" alt="<?php echo $fixed_banner_768['alt']; ?>" class="" /></a>
						</div><!-- /advertise -->
					<?php endif; ?>


	<?php get_template_part('template-parts/newsletter'); ?>
	
	<!-- <div class="socials-counter">
		<h4 class="text-uppercase noto sidebar-title">budi u toku <span>/ zaprati nas</span></h4>
		<div class="facebook-wrapper">
			<a href="https://www.facebook.com/profile.php?id=1029852201"><i class="fab fa-facebook-f"></i></a>
			<span class="follows">12.330</span>
		</div>
		<div class="instagram-wrapper">
			<i class="fab fa-instagram"></i>
			<span class="follows">4.308</span>
		</div>
		<div class="youtube-wrapper">
			<i class="fab fa-youtube"></i>
			<span class="follows">815</span>
		</div>
	</div> -->


	<div class="socials-counter">
		<h4 class="text-uppercase noto sidebar-title text-center">budi u toku <span>/ zaprati nas</span></h4>
		<div class="author-text social-buttons flex">
			<div class="facebook-wrapper flex col4 flex-center">
				<span class="social-icon">
					<a href="<?php echo get_field('facebook_link','option');?>">
						<i class="fab fa-facebook-f"></i>
					</a>
				</span>
				<span class="facebook-counter counter">
					<?php echo number_format(get_field('facebook_count','option'),0,',','.');?>
				</span>
			</div>
			<div class="instagram-wrapper flex col4 flex-center">
				<span class="social-icon">
					<a href="<?php echo get_field('instagram_link','option');?>">
						<i class="fab fa-instagram"></i>
					</a>
				</span>
				<span class="instagram-counter counter">
					<?php echo number_format(get_field('instagram_count','option'),0,',','.');?>
				</span>
			</div>
			<div class="youtube-wrapper flex col4 flex-center">
				<span class="social-icon">
					<a href="<?php echo get_field('youtube_link','option');?>">
						<i class="fab fa-youtube"></i>
					</a>
				</span>
				<span class="youtube-counter counter">
					<?php echo number_format(get_field('youtube_count','option'),0,',','.');?>
				</span>
			</div>
		</div>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->
