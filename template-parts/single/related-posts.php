<?php
// Default arguments
$args = array(
	'posts_per_page' => 6, // How many items to display
	'post__not_in'   => array( get_the_ID() ), // Exclude current post
	'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
	'meta_query' => array(
					array(
					'key' => '_thumbnail_id',
					'compare' => 'EXISTS'
					),
	)
);
// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms( get_the_ID(), 'category' );
$cats_ids = array();
foreach( $cats as $wpex_related_cat ) {
	$cats_ids[] = $wpex_related_cat->term_id;
}
if ( ! empty( $cats_ids ) ) {
	$args['category__in'] = $cats_ids;
}
// Query posts
$wpex_query = new wp_query( $args );
if($wpex_query->have_posts()):
// Loop through posts  


$categories = get_the_category();
					$categid=$categories[0]->term_id;
					$ancestorId='';
					if(count(get_ancestors($categid, 'category'))){
						$ancestorId=get_ancestors($categid, 'category')[0];
					}
					$cat_slug=$categories[0]->slug;
					if($ancestorId){											$anc_slug=get_category($ancestorId)->slug;
					}
					else{
						$anc_slug='';
					}
?>
<div class="related-posts-wrapper row">
	
		<div class="sticky-noscroll">
			<span>POVEZANO</span>
			<span class="border-cover"></span>
		</div>

	<div class="related-post-items flex flex-wrap flex-vertical-center  col-12">
		<?php
		foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
		<div class="post-item col4 flex flex-wrap">
			<div class="img-wrap o-fit col5 flex flex-vertical-center">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail('medium'); ?></a>
			</div>
			<div class="title-wrapper col7 flex flex-vertical-center title-bar <?php echo $cat_slug.' '.$anc_slug;?>">
				<a class="frank" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
			</div>
		</div>
		<?php
		// End loop
		endforeach;?>
	</div>
</div>
<?php endif;
// Reset post data
wp_reset_postdata(); ?>