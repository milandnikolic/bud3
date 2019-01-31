<?php get_header(); ?>
<main role="main">
	<!-- section -->
	<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="sticky-scroll">
				<?php
					foreach((get_the_category()) as $cat) {
					    if ($cat->cat_name != 'Big Reads') {
					       $category_id = get_cat_ID( $cat->cat_name );
					        echo '<span class="text-uppercase">' . $cat->cat_name . '</span>';
					    }
					}
				?>
				
			</div>
			<?php get_template_part('template-parts/single/title-block');?>
			<?php
			/*ANSWERS SLIDER BLOCK*/			
			if( get_field('answer') ): ?>
			
			<?php get_template_part('template-parts/single/answers-images-slider');?>
			<?php
			/*TOP GALLERY SLIDER*/
			elseif(get_field('post_top_gallery')):
			
			get_template_part('template-parts/single/top-gallery');

			elseif(get_field('top_video')):
					echo '<div class="yt-video">'.
						get_field('top_video').
					'</div>';
			elseif(has_post_thumbnail()):
				echo '<div class="post-thumbnail">'.
					get_the_post_thumbnail().
				'</div>'.
				'<div class="introduction frank text-center">'.
					get_field('introduction').
				'</div>';
				get_template_part('template-parts/single/short-share');
			else:
				echo ''.
				'<div class="introduction frank text-center">'.
					get_field('introduction').
				'</div>';
				get_template_part('template-parts/single/short-share');
			endif;
			?>
			<div class="main-wrapper row frank">
				<div class="content-wrapper col9">
					<div class="content">
						<?php
						if(get_field('answer') ):

							get_template_part('template-parts/single/answers-text-slider');

						else:

							the_content();
						
						endif;
						
						?>						
						
					</div>
					<?php get_template_part('template-parts/single/share-comment-nav');?>
					<div class="comments-wrapper">
						
						<?php comments_template(); ?>
					</div>
					<?php
					if(get_field('bottom_gallery') && !get_field('answer')): 

						get_template_part('template-parts/single/bottom-gallery');

					endif;
					?>
					<?php 
					if(!get_field('bottom_gallery') && !get_field('move_to_sidebar') || get_field('answer')&& !get_field('move_to_sidebar') ):
					get_template_part('template-parts/single/maybe-interested');
					endif;
					?>
					
					
				</div>
				
				<div class="sidebar-wrapper col3">
					<?php get_sidebar(); ?>
					<?php 
					if(get_field('bottom_gallery') && !get_field('answer') || get_field('move_to_sidebar') ):
					get_template_part('template-parts/single/maybe-interested');
					endif;
					?>
				</div>
			</div>
		</article>
		<!-- /article -->
			
		<div class="col12 bottom-sections-container">
			
			<?php get_template_part('template-parts/single/related-posts');?>
			
			
			<?php get_template_part('template-parts/single/latest-posts');?>
			
			
		</div>
		
		<?php endwhile; ?>
		<?php else: ?>
		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'bud3' ); ?></h1>
		</article>
		<!-- /article -->
		<?php endif; ?>
	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>