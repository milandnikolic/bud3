<?php /* Template Name:HOMEPAGE Template */ get_header(); ?>
<div class="page-content">
	<?php
		//vars
		$select_posts_for_home_slider = get_field('select_posts_for_home_slider');
		$select_featured_posts = get_field('select_featured_posts');
	?>
	<div class="izdvajamo">
		<!-- <div class="side-scroll-wrapper">
			<div class="pos-relative"> -->
				<div class="sticky-scroll izdvajamo-sticky">
					<span>IZDVAJAMO</span>

				</div>
			<!-- </div>
		</div> -->

		<div id="home-slider">
			
			<?php if( $select_posts_for_home_slider ): ?>
			
			<div class="slider">
				
				<?php foreach( $select_posts_for_home_slider as $post ): ?>
				<?php setup_postdata($post); ?>
				
				<div class="post-item">
					<div class="row flex-end">
						
						<!-- <div class="col2 flex flex-vertical-center flex-center"> -->
						<div class="inner-slider text-center">
							
							
							<p class="cats-slider noto">
								<?php
								$postid = get_the_ID(); 
								if( has_category('bigreads',$postid) ){
									$cats = get_the_category();
									$category_id = get_cat_ID( $cat->cat_name );

									foreach((get_the_category()) as $cat) {
									    if ($cat->cat_name != 'Big Reads') {
									        echo '<a href="' . get_category_link( $category_id ) . '">' . $cat->cat_name . '</a>';
									    }
									}
								} else {
										$categories = get_the_category();
										$cat_name=$categories[0]->cat_name;
										$categid=$categories[0]->term_id;
										echo '<a href="' . get_category_link( $categid ) . '">' . $cat_name . '</a>';
										/*the_category(' | '); */
								}
								?>
							</p>
							<h3 class="title-loop frank">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="post-date-wrap">
								<span class="day frank"><?php the_time('d'); ?></span>
								<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
							</div>
							<p class="author"><?php the_author_posts_link(); ?></p>
							<div class="excerpt-loop frank"><?php
							//	add_filter( 'excerpt_length', 'bud3_shortexcerpt',20 );
					    		the_excerpt();
					    	//	remove_filter( 'excerpt_length', 'bud3_shortexcerpt',20 );									
									/*html5wp_excerpt('html5wp_index');*/
							// Build your custom callback length in functions.php ?></div>
							<p><a class="post-link bordered noto t-bold" href="<?php echo get_permalink( $post->ID ); ?>">+</a></p>
						</div>
						<!-- 	</div> -->
						
						<div class="col10">
							<div class="slider-frame">
								<?php echo get_the_post_thumbnail( $post->ID ); ?>
								<a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/slider-frame.png"  class="slider-frame-img"></a>
							</div>
						</div>
					</div>
				</div>
				
				
				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			</div>
			
			<?php endif; ?>
			</div><!--  /home-slider -->
			
			<?php if( $select_featured_posts && !wp_is_mobile() ): ?>
			<div class="featured-posts">
				<div class="flex flex-space-between">
					<?php foreach( $select_featured_posts as $post ): ?>
					<?php setup_postdata($post); ?>
					<!-- <div class="col3"> -->
						<div class="home-single-post">
							<div class="post-date-wrap">
								<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
								<span class="day frank"><?php the_time('d'); ?></span>
							</div>
							<div class="img-wrap"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?></a></div>
							<div class="home-single-post-body">
								<p class="cats-slider">
									<?php
									$categories = get_the_category();
									$cat_name=$categories[0]->cat_name;
									$categid=$categories[0]->term_id;
									echo '<a href="' . get_category_link( $categid ) . '">' . $cat_name . '</a>';
									/*the_category(' | '); */
									?>
								</p>
								<?php $the_title = get_the_title(); ?>
								<h3 class="title-loop frank">
								<a href="<?php the_permalink(); ?>" title="<?php if(strlen($the_title) > 45) echo $the_title; ?>" ><?php 
								    if(strlen($the_title) > 50)
					    			 $the_title = substr($the_title,0,47) . "...";
					    			 echo $the_title; ?></a>
								</h3>
								<p class="author"><?php the_author_posts_link(); ?> | AUTOR</p>
								<p><a class="post-link bordered noto t-bold" href="<?php echo get_permalink( $post->ID ); ?>">+</a></p>
							</div>
							<?php 
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
							<div class="bottom-border <?php echo $cat_slug. ' ' .$anc_slug; ?>"></div>
						</div>
						
					<!-- </div> -->
					
					
					
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					</div><!--  /row -->
				</div>
				<?php endif; // featured posts?>
			</div>
			<div class="cut-border"></div>
			<div class="news-section">
				<b class="cov"></b>
				<!-- <div class="side-scroll-wrapper">
					<div class="pos-relative"> -->
						<div class="sticky-scroll utoku-sticky">
							<span>U TOKU</span>

							<!-- <span class="border-cover"></span> -->
						</div>
				<!-- 	</div>
				</div> -->

				<div class="row">
					<?php
							$args = array(
								'post_type' => 'post',
								'showposts' => 3 ,
								'category_name' => 'vesti',
								'orderby'   => 'post_date',
								'order'   => 'DESC',
								'no_found_rows'  => true,
							);
							$the_query = new WP_Query( $args );
					?>
					<?php	if ($the_query->have_posts()) : ?>
					<div class="col7 flex flex-vertical-center">
						<div class="news-items-wrapper">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="news-item flex">
								<div class="img-wrap o-fit">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumbnail', array( 'class' => 'img-fit' ));  ?>
										<!-- <span class="triangle"></span> -->
									</a>

								</div>
								<div class="news-item-inner flex flex-space-between">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linija_razdela.png" class="angle-divide">
									<!-- <span class="triangle"></span> -->
									<h4 class="frank"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
									
									<span class="day frank"><?php the_time('d'); ?></span>
									
									<a href="<?php the_permalink(); ?>" class="post-link bordered noto t-bold">+</a>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php if(!wp_is_mobile()): ?>
					<div class="col5">
						<div class="tabs-wrapper">
							<ul class="tabs">
								<li class="tab-link tab1 current noto" data-tab="tab-1"><b>BUD3</b> VESTI</li>
								<li class="tab-link tab2 noto newsletter-tab" data-tab="tab-2"><span>BUDI U TOKU</span></li>
							</ul>
							<div id="tab-1" class="tab-content current">
								<?php
										/*$args = array(
											'post_type' => 'post',
											'category_name' => 'vesti',
											'showposts' => 1 ,
											'orderby'   => 'post_date',
											'order'   => 'DESC',
											'no_found_rows'  => true,
										);
										$the_query = new WP_Query( $args );*/
										$post_object = get_field('bud3_istaknuta_vest_u_tabu');
										if( $post_object ):
											// override $post
											$post = $post_object;
											setup_postdata( $post );
								?>
								<?php//	if ($the_query->have_posts()) : ?>
								<?php //while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								
								<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
								<span class="day frank"><?php the_time('d'); ?></span>
								
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								<div class="frank"><?php the_excerpt(); ?></div>
								
								<div class="img-wrap">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array( 'class' => 'img-fit' )); ?></a>
								</div>
								
								<?php// endwhile; ?>
								<?php wp_reset_postdata(); ?>
								<?php endif; ?>
								
							</div>
							<div id="tab-2" class="tab-content">
								<!-- Begin Mailchimp Signup Form -->
								<style type="text/css">
									#mc_embed_signup_scroll .flex > .mc-field-group { -webkit-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;flex: 1;  }
									#mc_embed_signup_scroll .flex > .mc-field-group input {width: 100%; border: 1px solid transparent; padding: 5.3px; padding-left: 15px;}
									#mc_embed_signup_scroll > div {width: 100%;}
									#mc_embed_signup_scroll h4 {margin-bottom: 15px;}
																		
									#mc_embed_signup div.mce_inline_error {display: none!important;}
								</style>
								<div id="mc_embed_signup">
									<form action="https://bud3.us19.list-manage.com/subscribe/post?u=ca7f4268c823b2f0aa7cee5ef&amp;id=a18f5885e1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
										<div id="mc_embed_signup_scroll" class="flex flex-vertical-center flex-center">
											<div>
												<h2>NEWSLETTER</h2>
												<h4 class="frank">Join our mailing list for the low-down on upcoming track day events. From time to time we'll send you the latest articles, videos & image galleries. We might even send you the odd competition or special offer but don't worry, we're not going to spam you with load of annoying junk!</h4>
												
												<div class="flex">
													<div class="mc-field-group">
														<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="ime@email.com">
													</div>
													<!--<div id="mce-responses" class="clear">
																<div class="response" id="mce-error-response" style="display:none"></div>
																<div class="response" id="mce-success-response" style="display:none"></div>
														</div>-->    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
														<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ca7f4268c823b2f0aa7cee5ef_a18f5885e1" tabindex="-1" value=""></div>
														<div class="clear"><input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
													</div>
												</div>
											</div>
										</form>
										
										<div class="flex newsletter-socials">
											<h2>ZAPRATI NAS </h2><?php get_template_part('template-parts/socials'); ?>
										</div>
									</div>
									<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
									<!--End mc_embed_signup-->

									
								</div>
							</div>
						</div>
						<?php endif; //not mobile ?>
					</div>
				</div>
				<div class="home-filter-section">
					<div class="row">
						<div class="col8">
							<div class="flex flex-vertical-center flex-center" >
								<?php   $fixed_banner_at_the_end_of_loop = get_field('fixed_banner_at_the_end_of_loop', 'option');
										$fixed_banner_at_the_end_of_loop_url = get_field('fixed_banner_at_the_end_of_loop_url', 'option');
								if( !empty($fixed_banner_at_the_end_of_loop) ): ?>
									<?php if( !empty($fixed_banner_at_the_end_of_loop_url) ): ?>
									<a href="<?php echo $fixed_banner_at_the_end_of_loop_url; ?>" target="_blank">
									<?php endif; ?>

										<img src="<?php echo $fixed_banner_at_the_end_of_loop['url']; ?>" alt="<?php echo $fixed_banner_at_the_end_of_loop['alt']; ?>" />
									<?php if( !empty($fixed_banner_at_the_end_of_loop_url) ): ?>	
									</a>
									<?php endif; ?>
								<?php endif; ?>
								<!-- <img src="<?php //echo get_template_directory_uri(); ?>/img/banner-staticni.jpg" alt="BANNER" class="banner-img"> -->
							</div>
						</div>
						<div class="col4">
							<div class="flex flex-vertical-center">
								<h3>FILTER POSTOVA PO BRENDU AUTOMOBILA</h3>
								<p>Odaberi brend automobila i izlistaće se svi postovi u kojima smo pisali o njemu</p>
								
							</div>
							<div class="brend-automobila-select">
								<?php
								
									if( $terms = get_terms( 'brend-automobila', array(  'parent' => 0, 'orderby' => 'slug', 'hide_empty' => true ), 'orderby=name' ) ) :
										echo '<select class="select-wrapper text-center" onchange="if (this.value) window.location.href=this.value">';
											echo '<option class="checkedradio"> Prikaži sve</option>';
											foreach ( $terms as $term ) :
												echo '<option  name="brendautomobila" value="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</option>';
											endforeach;
									echo '</select>';
									endif;
								
								?>
							</div>
							
						</div>
					</div>
				</div>
				<div class="home-video">
					<b class="cov"></b>
					<div class="sticky-scroll">
						<span>VIDEO</span>
					</div>
					<?php
						$post_object = get_field('home_video');
						if( $post_object ):
							// override $post
							$post = $post_object;
							setup_postdata( $post );
					?>
					<div class="slider-frame">
						<img src="<?php echo get_template_directory_uri(); ?>/img/fleke_video.png"  class="video-fleke">
						<?php echo get_the_post_thumbnail(); ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/video-frame.png"  class="slider-frame-img">
						<a href="<?php the_permalink(); ?>"><i class="fas fa-play"></i></a>
					</div>
					<?php //echo get_the_post_thumbnail(); ?>
					<div class="video-post-data">
						<p class="cats-slider noto">
							<?php
							$categories = get_the_category();
							$cat_name=$categories[0]->cat_name;
							$categid=$categories[0]->term_id;
							echo '<a href="' . get_category_link( $categid ) . '">' . $cat_name . '</a>';
							/*the_category(' | '); */
							?>
						</p>
						<h3 class="frank"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="frank">
							<a href="<?php the_permalink(); ?>" style="line-height: 17px; font-size: 14px; color: #ebece7;">
							<?php
							//	add_filter( 'excerpt_length', 'bud3_shortexcerpt',20 );
								the_excerpt();
							//	remove_filter( 'excerpt_length', 'bud3_shortexcerpt',20 );
							?>
							</a>
						</div>
						
					</div>
					<p class="month noto"><?php the_time('F'); ?></p>
					<p class="year noto"><?php the_time('Y'); ?>.</p>
					<span class="day"><?php the_time('d'); ?></span>
					<?php wp_reset_postdata();  ?>
					<?php endif; ?>
					
				</div>
				<?php if(!wp_is_mobile()): ?>
				<div class="home-recent-posts flex flex-wrap">
					<b class="cov"></b>
					<div class="sticky-scroll">
						<span>NAJNOVIJI POSTOVI</span>
					</div>
					
					<?php
						$counter = 0;
						$args = array(
							'post_type' => 'post',
							'showposts' => 2 ,
							'orderby'   => 'post_date',
							'order'   => 'DESC',
							'category__not_in' => array( 309 ),
							'no_found_rows'  => true,
							'meta_query' => array(
								array(
								'key' => '_thumbnail_id',
								'compare' => 'EXISTS'
								),
							)
						);
						$related_items = new WP_Query( $args );
					?>
					<?php	if ($related_items->have_posts()) : ?>
					<div class="col3">
						
						<?php while ( $related_items->have_posts() ) : $related_items->the_post(); $counter++; ?>
						
						<?php get_template_part('template-parts/link-shadow-box');?>
						
						
						<?php endwhile; ?>


						<?php 
							$fixed_banner_768 = get_field('fixed_banner_768', 'option');  
							$fixed_banner_768_url = get_field('fixed_banner_768_url', 'option'); 
							if($fixed_banner_768):
						?>
						<div class="advertise">
							<a href="<?php echo $fixed_banner_768_url; ?>" target="_blank"><img src="<?php echo $fixed_banner_768['url']; ?>" alt="<?php echo $fixed_banner_768['alt']; ?>" class="alignnone size-medium" /></a>
						</div><!-- /advertise -->
						<?php endif;//advertise ?>



							</div><!-- /col3 -->
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
							
							
							<?php
														$counter = 0;
														$args = array(
															'post_type' => 'post',
															'offset' => 2,
															'showposts' => 2 ,
															'orderby'   => 'post_date',
															'order'   => 'DESC',
															'no_found_rows'  => true,
															'category__not_in' => array( 309 ),
															'meta_query' => array(
																array(
																'key' => '_thumbnail_id',
																'compare' => 'EXISTS'
																),
															)
														);
														$related_items = new WP_Query( $args );
							?>
							<?php	if ($related_items->have_posts()) : ?>
							<div class="col3">
								
								<?php while ( $related_items->have_posts() ) : $related_items->the_post(); $counter++; ?>
								<?php if ($counter === 1) {
									get_template_part('template-parts/link-shadow-box');
								} else { ?>
								<div class="latest-post-item-long">
									
									<!-- article -->
									<article id="post-<?php the_ID(); ?>" <?php post_class('post-img-text'); ?>>
										<div class="img-container noto text-uppercase">
											<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
											<div class="img-wrap o-fit">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array( 'class' => 'img-fit' ));  ?></a>
											</div>
											<?php endif; ?>
											<?php
											$category = get_the_category();
											if ( $category[0] ) {
											echo '<p class="cat-title-loop"><span><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></span></p>';
											}
											?>
											
											<!-- <p class="cat-title-loop"><span>KATEGORIJA</span></p> -->
											
										</div>
										
										
										<div class="pos-relative text-center">
											<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
											<span class="day frank"><?php the_time('d'); ?></span>
											
											
											<h3 class="text-uppercase frank title-bar" title="<?php the_title(); ?>">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<p class="author"><?php the_author_posts_link(); ?></p>
											<div class="excerpt frank"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
										</div>
										</article><!-- /article -->
										<a class="post-link noto t-bold" href="<?php the_permalink(); ?>"> +</a>

													<?php 
														$custom_title = get_field('long_post_or_big_post_custom_title');
 														if($custom_title):
													 ?>
													<h3 class="frank text-uppercase title-bar long-post-name text-center">
														<a class="orange-hover" href="<?php the_permalink(); ?>"> 
															<?php echo $custom_title;  ?>																 																															
														</a> 
													</h3>
													<?php endif; ?>
										
										</div><!-- /latest-post-item -->
										<?php } ?>
										
										<?php endwhile; ?>
										</div><!-- /col3 -->
										<?php endif; ?>
										<?php wp_reset_postdata(); ?>
										
										<?php
																	$counter = 0;
																	$args = array(
																		'post_type' => 'post',
																		'showposts' => 2 ,
																		'offset' => 4,
																		'orderby'   => 'post_date',
																		'order'   => 'DESC',
																		'category__not_in' => array( 309 ),
																		'no_found_rows'  => true,
																		'meta_query' => array(
																			array(
																			'key' => '_thumbnail_id',
																			'compare' => 'EXISTS'
																			),
																		)
																	);
																	$related_items = new WP_Query( $args );
										?>
										<?php	if ($related_items->have_posts()) : ?>
										<div class="col3">
											
											<?php while ( $related_items->have_posts() ) : $related_items->the_post(); $counter++; ?>
											<?php if ($counter === 2) {
												get_template_part('template-parts/link-shadow-box');
											} else { ?>
											<div class="latest-post-item-long">
												
												<!-- article -->
												<article id="post-<?php the_ID(); ?>" <?php post_class('post-img-text'); ?>>
													<div class="img-container noto text-uppercase">
														<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
														<div class="img-wrap o-fit">
															<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array( 'class' => 'img-fit' ));  ?></a>
														</div>
														<?php endif; ?>
														
														<?php
														$category = get_the_category();
														if ( $category[0] ) {
														echo '<p class="cat-title-loop"><span><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></span></p>';
														}
														?>
														
														<!-- <p class="cat-title-loop"><span>KATEGORIJA</span></p> -->
														
														
													</div>
													<div class="pos-relative text-center">
														<p class="month-year noto"><?php the_time('M Y'); ?>.</p>
														<span class="day frank"><?php the_time('d'); ?></span>
														
														
														<h3 class="text-uppercase frank title-bar" title="<?php the_title(); ?>">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														<p class="author"><?php the_author_posts_link(); ?></p>
														<div class="excerpt frank"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
													</div>
													</article><!-- /article -->
													
													<a class="post-link noto t-bold" href="<?php the_permalink(); ?>"> +</a>

													<?php 
														$custom_title = get_field('long_post_or_big_post_custom_title');
 														if($custom_title):
													 ?>
													<h3 class="frank text-uppercase title-bar long-post-name text-center">
														<a class="orange-hover" href="<?php the_permalink(); ?>"> 
															<?php echo $custom_title;  ?>																 																															
														</a> 
													</h3>
													<?php endif; ?>

													</div><!-- /latest-post-item -->
												
													<?php } ?>
													
													<?php endwhile; ?>
													</div><!-- /col3 -->
													<?php endif; ?>
													<?php wp_reset_postdata(); ?>
													
													<?php
																				$counter = 0;
																				$args = array(
																					'post_type' => 'post',
																					'offset' => 6,
																					'showposts' => 3,
																					'orderby'   => 'post_date',
																					'order'   => 'DESC',
																					//'category__not_in' => array( 309 ),
																					'no_found_rows'  => true,
																					'meta_query' => array(
																						array(
																						'key' => '_thumbnail_id',
																						'compare' => 'EXISTS'
																						),
																					)
																				);
																				$related_items = new WP_Query( $args );
													?>
													<?php	if ($related_items->have_posts()) : ?>
													<div class="col3">
														
														<?php while ( $related_items->have_posts() ) : $related_items->the_post(); $counter++; ?>
														<?php get_template_part('template-parts/link-shadow-box');?>
														
														<?php endwhile; ?>
														</div><!-- /col3 -->
														<?php endif; ?>
														<?php wp_reset_postdata(); ?>
													</div>
													<div class="home-archive-container">
														<div class="sticky-scroll">
															<span>ARHIVA</span>
														</div>
														<div class="home-archive-posts" data-paged="1">
															<div class="flex flex-center loading">
																<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loader.gif" class="loader-gif vertical-align-center">
															</div>
															<!--POSTS WRAPPER-->
														</div>
														<div class="text-center">
															<div class="loadmore"><span class="noto"><b>UČITAJ JOŠ</b></span></div>
														</div>
													</div>
													<!-- advertise -->
													<div class="flex flex-center flex-vertical-center home-advertise">
														<div class="flex flex-vertical-center flex-center">
															<?php   $fixed_banner_at_the_end_of_loop = get_field('fixed_banner_at_the_end_of_loop', 'option');
																	$fixed_banner_at_the_end_of_loop_url = get_field('fixed_banner_at_the_end_of_loop_url', 'option');
																if( !empty($fixed_banner_at_the_end_of_loop) ): ?>
																	<?php if( !empty($fixed_banner_at_the_end_of_loop) ): ?>
																	<a href="<?php echo $fixed_banner_at_the_end_of_loop_url; ?>" target="_blank">
																	<?php endif; ?>

																		<img src="<?php echo $fixed_banner_at_the_end_of_loop['url']; ?>" alt="<?php echo $fixed_banner_at_the_end_of_loop['alt']; ?>" />
																	<?php if( !empty($fixed_banner_at_the_end_of_loop_url) ): ?>	
																	</a>
																	<?php endif; ?>

																<?php else: //get first banner if this is empty ?>	
																	<?php if( !empty($fixed_banner_768) ): ?>
																	<a href="<?php echo $fixed_banner_768_url; ?>" target="_blank">
																	<?php endif; ?>

																		<img src="<?php echo $fixed_banner_768['url']; ?>" alt="<?php echo $fixed_banner_768['alt']; ?>" />
																	<?php if( !empty($fixed_banner_768_url) ): ?>	
																	</a>
																	<?php endif; ?>

																<?php endif; ?>
														</div>
													</div>
												</div>
												
												
												<?php else: // it is mobile?>
												<?php
													$counter = 0;
													$args = array(
														'post_type' => 'post',
														'post_status' => 'publish',
														'showposts' => 8 ,
														'orderby'   => 'post_date',
														'order'   => 'DESC',
														'category__not_in' => array( 309 ),
														'no_found_rows'  => true,
														'meta_query' => array(
															array(
															'key' => '_thumbnail_id',
															'compare' => 'EXISTS'
															),
														)
													);
													$related_items = new WP_Query( $args );
												?>
												<?php	if ($related_items->have_posts()) : ?>
												<div class="row">
													
													<?php while ( $related_items->have_posts() ) : $related_items->the_post(); $counter++; ?>
													<div class="col6">
													<?php get_template_part('template-parts/link-shadow-box');?>
													</div>
													
													<?php endwhile; ?>
													<!-- <div class="advertise">
														<h2>REKLAMA</h2>
													</div> --><!-- /advertise -->

												</div><!-- /row -->
														<?php endif; ?>
														<?php wp_reset_postdata(); ?>
														<?php endif; // mobile check ?>
														<?php if( have_rows('prijatelji_-_logoi')): ?>
														<div class="home-friends-section">
															<div class="sticky-noscroll">
																<span>PRIJATELJI</span>
																<span class="border-cover"></span>
															</div>
															<div class="flex flex-center flex-vertical-center friends-slider">
																
																<?php while( have_rows('prijatelji_-_logoi') ): the_row();
																// vars
																$logo = get_sub_field('logo');
																$link = get_sub_field('link');
																?>
																<div class="friend-logo">
																	<div class="flex flex-vertical-center flex-center">
																		<?php if($link): ?>
																		<a href="<?php echo $link; ?>" target="_blank">
																			<?php endif; ?>
																			<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
																			<?php if($link): ?>
																		</a>
																		<?php endif; ?>
																	</div>
																</div>
																<?php endwhile;  ?>
															</div>
														</div>
														<?php endif; ?>

													<!--</div>--><!--  /page-content -->
														<?php get_footer(); ?>


														