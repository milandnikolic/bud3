<?php $counter = 0; ?>

<?php if (have_posts()): while (have_posts()) : the_post(); $counter++; ?>
	<div class="col3 latest-post-item">
		
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="img-container noto text-uppercase">
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<div class="img-wrap o-fit">
						<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
					</div>
				<?php endif; ?>
				<div class="image-caption">
					<p class="cat-title-loop"><span>KATEGORIJA</span></p>
					<a href="<?php the_permalink(); ?>"> +
					</a>
				</div>
			</div>
			<h3 class="text-uppercase title-bar" title="<?php the_title(); ?>"><?php the_title(); ?></h3>

		</article>
		<!-- /article -->		
	</div><!-- /col3 -->


	<?php if ($counter === 3) { ?>
		<div class="col3 latest-post-item">
			<h2>REKLAMA</h2>
		</div><!-- /col3 -->
	<?php } ?>


	<?php if ($counter === 7) { ?>
		<div class="col12 latest-post-item">
			<h2>VELIKA REKLAMA</h2>
		</div><!-- /col3 -->
	<?php } ?>

	<?php if ($counter === 16) { ?>
		<div class="col3">
			<h2>MALA REKLAMA</h2>
		</div><!-- /col3 -->
	<?php } ?>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Nema postova.', 'bud3' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
