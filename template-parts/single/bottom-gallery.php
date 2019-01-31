<h2 class="title-bar col12 noto text-uppercase bottom-gallery">
	<?php _e('Galerija','bud3')?>
	<p class="bottom-gallery-num frank">
		<?php /*echo count(get_field('bottom_gallery'));*/
			$bottom_gallery=get_field('bottom_gallery');
			$bottom_gallery_count = count($bottom_gallery);
			echo $bottom_gallery_count;
		?>
	</p>
</h2>
<ul class="bottom-gallery">
	<?php 
	$shown_initial=12;
	$print_count = $bottom_gallery_count<$shown_initial?$bottom_gallery_count:$shown_initial;
	
	for( $a=0; $a<$print_count; $a++): ?>
		<li>
			<a data-fancybox="gallery" href="<?php echo $bottom_gallery[$a]['url']; ?>">
				 <img src="<?php echo $bottom_gallery[$a]['sizes']['thumbnail']; ?>" alt="<?php echo $bottom_gallery[$a]['alt']; ?>" />
			</a>			
		</li>
	<?php endfor; ?>
</ul>
<?php if($bottom_gallery_count > $shown_initial): ?>
	<button type="button" class="bottom-gallery-load-more" data-post-id="<?php echo get_the_ID();?>" data-offset="<?php echo $shown_initial;?>" data-page='1' data-images="<?php echo $bottom_gallery_count;?>" data-fieldname="bottom_gallery"><?php _e('Pogledaj sve slike','bud3');?></button>
<?php endif; ?>