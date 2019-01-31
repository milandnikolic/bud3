<?php /*
 * Template Name: Big Reads
 * Template Post Type: post
 */ get_header('bigreads'); ?></div>
<div class="wrapper">

<?php
if(get_field('transparent_background')['image']):
$transparent_background=get_field('transparent_background');
$image_full_url=$transparent_background['image']['url'];
echo ''.
	'<div class="transparent-background">'.
		'<img src="'.$image_full_url.'">'.
	'</div>';
endif;
?>
<?php
if(get_field('background_text')['text']):
$background_text=get_field('background_text');
$text=$background_text['text'];
echo ''.
	'<div class="background-text frank">'.
		$text.
	'</div>';
endif;
?>
<div class="top-banner">
	<?php the_post_thumbnail();  ?>
	<h1>BIG READS</h1>
	<div class="lighten"></div>
</div>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="bigreads-container">
	<?php get_template_part('template-parts/single/title-block');?>
	<?php if(get_field('introduction')):?>
	<div class="introduction frank text-center">
		<?php echo get_field('introduction');?>
	</div>
	<?php endif;?>
	<?php get_template_part('template-parts/single/short-share');?>
	<div class="content-wrapper frank">
	<?php the_content(); // Dynamic Content ?>
	</div>
		<?php if(get_field('specification')):?>
				<div class="specification-link-container row">
					<div class="specification-title poll-title two-lines col3">
						<?php _e('Specifikacija','bud3');?>
						<span class="specification-link js-specification-data"></span>
					</div>
					<div class="specification-title-desc col2 noto">
						<?php _e('Pogledaj specifikaciju automobila','bud3');?>
					</div>
				</div>
				<div class="specification-data noto hide-spec">
					<?php
						$specifications=get_field('specification');
						foreach($specifications as $specification):
							echo 
						'<div class="specification row">'.
							'<div class="specification-name col2 text-uppercase t-bold">'.
								$specification['name'].
							'</div>'.
							'<div class="specification-value col10">'.
								$specification['value'].
							'</div>'.
						'</div>';
						endforeach;
					?>
				</div>
				<?php endif;?>
				<!-- comment block -->
				<?php get_template_part('template-parts/single/share-comment-nav');?>
				<div class="comments-wrapper">
					
					<?php comments_template(); ?>
				</div>
				<?php if(get_field('bottom_gallery')):?>
					<ul class="bottom-gallery">
						
					</ul>
					<button type="button" class="bottom-gallery-load-more none" data-post-id="<?php echo get_the_ID();?>" data-offset="0" data-page='1' data-images="<?php echo count(get_field('bottom_gallery'));?>" data-fieldname="bottom_gallery"><?php _e('Pogledaj sve slike','bud3');?></button>
				
		<?php endif;?>
	<?php endwhile;  endif;?>

	</div><!--/.bigreads-container-->
	</div><!-- /.wrapper -->
<?php 

$image = get_field('bottom_banner');

if( !empty($image) ): ?>
<div class="bottom-banner">
	<div class="lighten"></div>
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"  class="img-fit"/>
</div>

<?php endif; ?>
<div class="wrapper latest-bigreads">
	<div class="bigreads-container">
		<h3 class="latest-bigreads-title title-bar t-bold text-uppercase frank text-center">
			<?php _e('Odabrani članci','bud3');?>
		</h3>
		<?php get_template_part('template-parts/single/latest-posts');?>
	</div>
</div>

<div class="bigreads-footer-container">
	<?php get_footer('bigreads'); ?>
</div>
