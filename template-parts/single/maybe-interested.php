<?php
// Get the tags for the current post
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
// If the post has tags, run the related post tag query
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
// Build our tag related custom query arguments
$custom_query_args=array(
'tag__in' => $tag_ids, // Select posts with related tags
'posts_per_page' => 3, // Number of related posts to display
'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
'orderby' => 'rand', // Randomize the results
'no_found_rows'  => true,
'meta_query' => array(
array(
'key' => '_thumbnail_id',
'compare' => 'EXISTS'
),
)
);
} else {
// If the post does not have tags, run the standard related posts query
$custom_query_args = array(
'posts_per_page' => 3, // Number of related posts to display
'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
'orderby' => 'rand', // Randomize the results
'no_found_rows'  => true,
);
}
// Initiate the custom query
$custom_query = new WP_Query( $custom_query_args ); ?>
<?php	if ($custom_query->have_posts()) : ?>
<div class="row maybe-interested noto text-uppercase">
	<h2 class="title-bar col12"><?php _e('Možda će vas zanimati','bud3')?></h2>
	<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
	
	
	<div class="col4">
		<a href="<?php echo get_permalink( $custom_query->ID ); ?>">
			<div class="img-wrap o-fit">
				<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
			</div>
			<h3 class="image-title"><?php the_title(); ?></h3>
		</a>
	</div>
	
	<?php endwhile; ?>
	
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>