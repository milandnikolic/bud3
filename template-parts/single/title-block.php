<div class="title-container">
	<div class="post-category-info">
		<?php
			$postid = get_the_ID(); 
			if( has_category('bigreads',$postid) ){
				$cats = get_the_category();
				$category_id = '';
				$ance_id = '';
				$parent_cat_id ='';
				$parent_name ='';
				$parent_cat_id ='';


				foreach((get_the_category()) as $cat) {
					$parent_cat_id = $cat->parent;
					$parent_name = get_cat_name( $parent_cat_id );
				    if ($cat->cat_name != 'Big Reads') {
				        echo '<span ><a href="'.get_category_link( $parent_cat_id ).'"><b>' . $parent_name .'</b></a></span> / <span ><a href="'.get_category_link( $cat->term_id ).'">'. $cat->cat_name . '</a></span>';
				    }
				}
			} else {
				$categories = get_the_category();

				$categid=$categories[0]->term_id;				
				
				$ancestorId='';
				if(count(get_ancestors($categid, 'category'))){
					$ancestorId=get_ancestors($categid, 'category')[0];
				}
				$cat_name=$categories[0]->name;
				$anc_name='';
				if($ancestorId){											$anc_name=get_category($ancestorId)->name;
				}

				$category_id = get_cat_ID( $cat_name );
				$ance_id = get_cat_ID( $anc_name );
			}
		?>
		<span class="t-bold"><a href="<?php echo get_category_link( $ance_id ); ?>"><?php echo ($anc_name?$anc_name.'<span style="font-weight:400;"> / <span>':'');?></a></span>
		<a href="<?php echo get_category_link( $category_id ); ?>"><?php echo $cat_name;?></a>
	</div>
	
	<!-- post title -->
	<div class="title-wrapper title-bar">
		<h1 class="frank t-bold">
		<?php if(!is_single()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php endif; ?>
			<?php the_title(); ?>
		<?php if(!is_single()): ?>		
		</a>
		<?php endif; ?>
		</h1>

		<div class="post-date-wrap">
			<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
			<span class="day frank"><?php the_time('d'); ?></span>
		</div>
	</div>
	<!-- /post title -->
	<div class="autor-info">
		<span class="t-bold"><?php echo __("Autor","bud3")?></span> /
		<?php echo get_the_author_posts_link();?>
	</div>
	</div> <!--end of title-container-->