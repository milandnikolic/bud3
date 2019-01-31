<?php get_header(); ?>
	<main role="main">

		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" data-paged="1">
				<div class="selects-wrapper col12">
					<?php

						$category = get_queried_object();
						$category_id=$category->term_id;
						$category_name=$category->name;

						$cat_slug = get_category_parents($category_id);
					
						$cat_slug = strtolower( rtrim($cat_slug,"/") );
					
						if( $terms = get_terms( 'category',array( 'parent' => $category_id, 'orderby' => 'slug', 'hide_empty' => true ), 'orderby=name' ) ) : // to make it simple I use default categories
							echo '<div class="select-wrapper col12" >';
					
						echo '<span class="checkedradio '. $cat_slug .'"><input type="radio" class="selected-cat" name="categoryfilter" value="'.$category_id.'">POSLEDNJI POSTOVI</span>';
						foreach ( $terms as $term ) :
							echo '<span class="'. $cat_slug .'"><input type="radio" class="selected-cat"  name="categoryfilter" value="' . $term->term_id . '">' . $term->name . '</span>'; // ID of the category as the value of an option
						endforeach;
						echo '</div>';
						endif;
					?>				
			</div>
			
		</form>

		<section class="archive-container">
			
			<h1 class="text-center none"><?php single_cat_title(); ?></h1>
			<div class="sticky-scroll">
				<span class="text-uppercase"><?php echo $category_name;?></span>
			</div>
			<div id="response" class="archive-posts-container flex flex-wrap" data-paged="1">
				<div class="flex flex-center loading">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loader.gif" class="loader-gif vertical-align-center">
				</div>
			</div>
			<div class="text-center">
				<div class="loadmore"><span class="noto"><b>UČITAJ JOŠ</b></span></div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>
