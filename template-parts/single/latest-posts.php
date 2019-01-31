<div class="latest-wrapper">
	<?php
		if(!is_page_template('single-post-bigreads.php')):
			echo 
			'<div class="sticky-noscroll">'.
				'<span>NAJNOVIJE</span><span class="border-cover"></span>'.
			'</div>';
		endif;
	?>
	
	<div class="latest-posts flex flex-wrap col12 row">
		<?php		
		$args = array(
			'post_type' => 'post',
			'showposts' => 4 ,
			'orderby'   => 'post_date',
			'order'   => 'DESC',
			'no_found_rows'  => true,
			'meta_query' => array(
				array(
				'key' => '_thumbnail_id',
				'compare' => 'EXISTS'
				),
			)
		);
		if(is_page_template('single-post-bigreads.php')):
			$postid = get_the_ID(); 
			$args = array(
			  'post__not_in' => array( $postid ),
			  'category_name' => 'bigreads', 
			  'showposts' => 4 ,
				'orderby'   => 'post_date',
				'order'   => 'DESC',
				'no_found_rows'  => true,
			);
			//$args['category_name']='bigreads';
		endif;

		$related_items = new WP_Query( $args );
		?>
		<?php	if ($related_items->have_posts()) : ?>
		
		<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
		
		<?php get_template_part('template-parts/link-shadow-box'); ?>
		
		<?php endwhile; ?>
		
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>