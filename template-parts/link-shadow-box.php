<div class="<?php echo (!is_front_page()?'col3 ':'');?>latest-post-item">
	<div class="post-img-text">
		<div class="img-container noto text-uppercase">
			<div class="img-wrap o-fit">
				<?php the_post_thumbnail('medium', array( 'class' => 'img-fit' ));  ?>
			</div>
			<div class="post-text-wrapper image-caption">
				<?php
				$postid = get_the_ID(); 
				if( has_category('bigreads',$postid) ){
					$cats = get_the_category();

					foreach((get_the_category()) as $cat) {
					    if ($cat->cat_name != 'Big Reads') {
					       $category_id = get_cat_ID( $cat->cat_name );
					        echo '<h5 class="title"><a href="' . get_category_link( $category_id ) . '">' . $cat->cat_name . '</a></h5>';
					    }
					}
				} else {
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

					if ( $categories[0] ) {
					    echo '<h5 class="title"><a href="' . get_category_link( $categid ) . '">' . $categories[0]->cat_name . '</a></h5>';
					}
				}
				?>

				<div class="post-excerpt">
					<a class="orange-hover" href="<?php echo get_permalink(); ?>"><?php the_excerpt();?></a>
				</div>
			</div>
		</div>
		<a class="post-link noto t-bold" href="<?php echo get_permalink(); ?>">+</a>
	</div>
	<?php $the_title = get_the_title(); ?>
	<h3 class="<?php echo $cat_slug.' '.$anc_slug;?> text-uppercase title-bar"><a title="<?php if(strlen($the_title) > 45) echo $the_title; ?>" class="orange-hover" href="<?php echo get_permalink(); ?>"> 
		<?php 
			 

			if(strlen($the_title) > 49)
    			 $the_title = substr($the_title,0,46) . "...";
    			echo $the_title;
		?> 
	</a> </h3>
</div>