<div class="row comments-share-nav noto">
	<div class="comments-share col8 two-lines">
		<?php get_template_part('template-parts/socials-share'); ?>
		<div class="comments-open-btn">
			<span><?php _e('Šta vi mislite?','bud3').'? ';?></span>
			<a id="open-comment">
				<?php echo __('Ostavi komentar','bud3').' <i class="fas fa-comment-alt"></i> '.get_comments_number('','','');?>
			</a>
		</div>
	</div>
	<div class="prev-post-wrapper col4">
		<?php if(is_page_template('single-post-bigreads.php')):?>
			<?php if(get_field('bottom_gallery')):?>
				<div class="bigreads-gallery-link">
					<?php _e('Pogledaj <br /> kompletnu galeriju');?>
					<span class="specification-link load-br-gallery" data-post-id="<?php echo get_the_ID();?>" data-offset="0" data-page="0" data-images="<?php echo count(get_field('bottom_gallery'));?>" data-fieldname="bottom_gallery"></span>
				</div>
				<span class="bigreads-images-number frank">
					<?php echo count(get_field('bottom_gallery'));?>
				</span>
			<?php endif;?>
		<?php else:?>
			<div class="prev-post-title">
				<?php $prev_post=get_previous_post();?>
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
					<?php _e('Prethodni post','bud3'); ?>
				</a>
			</div>
			<div class="prev-post-link frank">
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
					<?php echo $prev_post->post_title;?>
				</a>
			</div>
		<?php endif;?>
	</div>
</div>