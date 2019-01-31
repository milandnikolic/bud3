<?php /* Template Name:About us*/?>
<?php get_header();?>
<main role="main">
	<div class="about-us">
		<div class="sticky-scroll">
			<span>O NAMA</span>
		</div>
		<div class="slider-container">
			<?php 
				//vars
				$select_posts_for_home_slider = get_field('slider_about_us_posts');
			?>
			<div id="home-slider">
			
			<?php if( $select_posts_for_home_slider ): ?>
					
				<div class="slider">
					
					<?php foreach( $select_posts_for_home_slider as $post ): ?>
		                 <?php setup_postdata($post); ?>
						
					    <div class="post-item">
					    	<div class="row flex-end">
					    		
						    		<div class="inner-slider text-center">
						    			<div class="post-date-wrap">
						    				<span class="day frank">00</span>
						    			</div>
						    			
						    			
						    			<p class="cats-slider noto"><?php
								    	 	$categories = get_the_category();
						    				$cat_name=$categories[0]->cat_name;
						    				$categid=$categories[0]->term_id;
						    				echo '<a href="' . get_category_link( $categid ) . '">' . $cat_name . '</a>';
								    	 	 /*the_category(' | '); */ 
								    	 ?>
						    				
						    			</p>
						    			<a href="<?php echo get_the_permalink();?>">
						    			<h3 class="title-loop frank"><?php echo get_the_title( $post->ID ); ?></h3></a>
						    			<p class="author text-uppercase">
						    				<?php _e("Bud3 // budž");?>
						    			</p> 
						    			<div class="excerpt-loop frank"><?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?></div>
						    		</div>
		
					    		<div class="col10">
					    			<div class="slider-frame">
					    			<?php echo get_the_post_thumbnail( $post->ID ); ?>
					    			<img src="<?php echo get_template_directory_uri(); ?>/img/slider-frame-light3.png"  class="slider-frame-img">
					    			</div>
					    		</div>	
					    	</div>
					    </div>
					    
					   
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				</div>
		
			<?php endif; ?>
		</div><!--  /home-slider -->
		</div>
		<!-- /.slider-container -->
		<div class="content-container">
			<?php the_content();?>
		</div>
		<!-- /.content -->
		<div class="founders-container">
			<div class="row flex flex-wrap">
				<?php
					$authors=get_field('authors');
					$a=1;
					foreach($authors as $author):						
				?>
				<div class="founder-container col4 <?php echo ($a%3==0?'':'border');?>">
					<div class="day frank">
						<?php echo ($a<10?'0'.$a:$a);?>
					</div>
					<div class="author-image">
						<img src="<?php echo $author['author_image']['sizes']['thumbnail'];?>">
					</div>
					<div class="founder-wrapper">
						<div class="text-uppercase founder-title">
							<h3 class="label">
							<?php _e('Osnivač','bud3');?>
							</h3>
							<h2 class="about-title name title-bar">
							<?php echo $author['author_name'];?>
							</h2>
							<h4 class="surname">
							<span class="lastname">
								<?php echo $author['author_lastname'];?>
							</span>
							<span class="nickname">
								/ <?php echo $author['author_nickname'];?>
							</span>
							</h4>
						</div>
						<div class="author-text">
							<?php echo $author['author_text'];?>
						</div>
					</div>
					<a class="noto t-bold author-link" href="<?php echo get_author_posts_url( $author['author']['ID']);?>">+</a>
				</div>
				
				<?php
					if($a==2 || ($a==1 && count($authors)==1)):
					$a++;
					?>
					<div class="founder-container socials col4">
					<div class="day frank">
						<?php echo ($a<10?'0'.$a:$a);?>
					</div>
					<div class="founder-wrapper">
						<div class="text-uppercase founder-title">
							<h3 class="label">
							<?php _e('Budi u toku','bud3');?>
							</h3>
							<h2 class="about-title name title-bar">
							<?php _e('Zaprati nas', 'bud3'); ?>
							</h2>
							<h4 class="surname">
							<span class="nickname">
								<?php _e('Društvene mreže','bud3');?>
							</span>
							</h4>
						</div>
						<div class="author-text social-buttons">
							<div class="facebook-wrapper">
								<span class="social-icon">
									<a href="<?php echo get_field('facebook_link','option');?>">
										<i class="fab fa-facebook-f"></i>
									</a>
								</span>
								<span class="facebook-counter counter">
									<?php echo number_format(get_field('facebook_count','option'),0,',','.');?>
								</span>
							</div>
							<div class="instagram-wrapper">
								<span class="social-icon">
									<a href="<?php echo get_field('instagram_link','option');?>">
										<i class="fab fa-instagram"></i>
									</a>
								</span>
								<span class="instagram-counter counter">
									<?php echo number_format(get_field('instagram_count','option'),0,',','.');?>
								</span>
							</div>
							<div class="youtube-wrapper">
								<span class="social-icon">
									<a href="<?php echo get_field('youtube_link','option');?>">
										<i class="fab fa-youtube"></i>
									</a>
								</span>
								<span class="youtube-counter counter">
									<?php echo number_format(get_field('youtube_count','option'),0,',','.');?>
								</span>
							</div>
						</div>
					</div>					
				</div>

				<?php
					endif;
					$a++;
					endforeach;
				?>
			</div>
		</div>
		<!-- /.founders-container -->
	</div>
	<!-- /.about-us -->
	<?php
		$collaborators=get_field('contributors');
		if($collaborators):
	?>
	<div class="collaborators">
		<div class="sticky-scroll">
			<span>SARADNICI</span>
		</div>
		<div class="text-uppercase founder-title">
			<h3 class="label">
			<?php _e('Iza scene','bud3');?>
			</h3>
			<h2 class="about-title name title-bar">
			<?php _e('Saradnici','bud3');?>
			</h2>
			<h4 class="surname">
			<span class="lastname">
				<?php _e('Tim','bud3');?>
			</span>
			<span class="nickname">
				/ <?php _e('BUD3','bud3');?>
			</span>
			</h4>
		</div>
		<div class="collaborators-container col12 flex flex-wrap">
			<?php foreach($collaborators as $collaborator): ?>
			<div class="collaborator-container <?php echo $collaborator['text']?'col3':'only-role'?>">
				<h4 class="surname title-bar text-uppercase">
				<span class="lastname">
					<?php echo $collaborator['name'];?>
				</span>
				<span class="nickname">
					<?php echo $collaborator['lastname'];?>
					<?php echo $collaborator['role']?' // '.$collaborator['role']:'';?>
				</span>
				</h4>
				<?php if($collaborator['text']):?>
				<div class="author-text">
					<?php echo $collaborator['text'];?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<!-- /.collaborators -->
	<?php endif;?>
	<div class="cooperation-contact">
		<div class="sticky-scroll">
			<span>KONTAKT</span>
		</div>
		<div class="contact-container flex col12 row">
			<div class="contact-newsletter-container col6">
				<div class="contact-wrapper">
					<div class="founder-title left text-uppercase">
						<h2 class="about-title name title-bar">
						<?php _e('Kontakt','bud3');?>
						</h2>
						<h4 class="surname">
						<span class="lastname contact">
							<?php _e('Info','bud3');?>
						</span>
						</h4>
					</div>
					<p class="text">
						<?php echo get_field('contact_text');?>
					</p>
				</div>
				<div class="newsletter-container left">
					<h3 class="title title-bar text-uppercase about-title">
					Newsletter
					</h3>
					<div class="text">
						<?php echo get_field('newsletter_text');?>
					</div>
				</div>
			</div>
			<div class="contact-form-container col6">
				<?php echo do_shortcode('[contact-form-7 id="44313" title="Контакт форма 1"]'); ?>
			</div>
		</div>
		<div class="cooperation-container">
			<div class="cooperation-wrapper">
				<div class="founder-title right text-uppercase">
					<h2 class="about-title name title-bar">
					<?php _e('Saradnja','bud3');?>
					</h2>
					<h4 class="surname">
					<span class="lastname contact">
						<?php _e('Info','bud3');?>
					</span>
					</h4>
				</div>
				<p class="text">
					<?php echo get_field('cooperation_text');?>
				</p>
			</div>
		</div>
	</div>
	<!-- /.cooperation-contact -->
	<div class="appearings col12">
		<div class="sticky-scroll">
			<span>BUD3 U JAVNOSTI</span>
		</div>
		<div class="founder-title text-uppercase">
			<h2 class="about-title name title-bar">
			<?php _e('Pojavljivanja','bud3');?>
			</h2>
			<h4 class="surname">
			<span class="lastname contact">
				<?php _e('press / ','bud3');?>
				<?php _e('events / ','bud3');?>
				<?php _e('races','bud3');?>
			</span>
			</h4>
		</div>
		<div class="appearings-container col12 row">
			<div class="appearing-container col4">
				<div class="founder-title left text-uppercase">
					<h4 class="about-title name title-bar">
					<?php _e('Press','bud3');?>
					</h4>
				</div>
				<div class="press-text">
					<?php echo get_field('press_text');?>
				</div>
			</div>
			<div class="appearing-container col4">
				<div class="founder-title left text-uppercase">
					<h4 class="about-title name title-bar">
					<?php _e('Foto','bud3');?>
					</h4>
				</div>
				<div class="press-text">
					<?php echo get_field('photo_text');?>
				</div>
			</div>
			<div class="appearing-container col4">
				<div class="founder-title left text-uppercase">
					<h4 class="about-title name title-bar">
					<?php _e('Events','bud3');?>
					</h4>
				</div>
				<div class="press-text">
					<?php echo get_field('events_text');?>
				</div>
			</div>
		</div>
	</div>
	<!-- /.appearings -->
</main>
<?php get_footer();?>