<?php
$gallery=get_field('post_top_gallery');
$imagesCount=count($gallery);
$imageNum=1;
?>
<div class="top-gallery gallery">
	
	<div class="big-image o-fit">
		<img src="<?php echo $gallery[0]['url']; ?>" alt="<?php echo $gallery[0]['alt']; ?> " data-id="<?php echo $gallery[0]['id']; ?>">
		<span class="full-size"><i class="fa fa-expand-arrows-alt"></i></span>
	</div>
	<div class="thumbnails-container">
		<div class="thumbnails-number">
			<div class="img-number t-bold"><?php echo $imageNum; ?></div>
			<div class="img-count"><?php echo $imagesCount; ?></div>
		</div>
		<div class="thumbnails-slider">
			<?php
				foreach($gallery as $image){
					echo ''.
					'<div class="thumbnail-item o-fit '.(($imageNum==1)?'active"':'"').' data-id="'.$image['id'].'" data-num="'.$imageNum.'">'.
							'<a href="'.$image['url'].'" data-fancybox="content-gallery" data-width="'.$image['width'].'" data-height="'.$image['height'].'" id="link'.$image['id'].'"></a>'.
							'<img src="'.$image['sizes']['medium'].'" data-large="'.$image['url'].'">'.
					'</div>';
					$imageNum++;
				}
			?>
		</div>
	</div>
</div>
