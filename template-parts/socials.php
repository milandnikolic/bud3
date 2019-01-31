
<div class="socials">
								<?php
								//vars
									$facebook_link = get_field('facebook_link', 'option');
									$twitter_link = get_field('twitter_link', 'option');
									$instagram_link = get_field('instagram_link', 'option');
									$youtube_link = get_field('youtube_link', 'option');
									$google_plus_link = get_field('google_plus_link', 'option');
									$pinterest_link = get_field('pinterest_link', 'option');
								?>
								<?php if(!empty($facebook_link)):  ?>
									<a href="<?php echo $facebook_link; ?>" target="_blank" >
										<i class="fab fa-facebook-square"></i>
									</a>
								<?php endif;  ?>

								<?php if(!empty($twitter_link)):  ?>	
									<a href="<?php echo $twitter_link; ?>" target="_blank" >
										<i class="fab fa-twitter"></i>
									</a>
								<?php endif;  ?>	

								<?php if(!empty($instagram_link)):  ?>
									<a href="<?php echo $instagram_link; ?>" target="_blank" >
										<i class="fab fa-instagram"></i>
									</a>
								<?php endif;  ?>	

								<?php if(!empty($pinterest_link)):  ?>
									<a href="<?php echo $pinterest_link; ?>" target="_blank" >
										<i class="fab fa-pinterest"></i>
									</a>
								<?php endif;  ?>	

								<?php if(!empty($youtube_link)):  ?>
									<a href="<?php echo $youtube_link; ?>" target="_blank" >
										<i class="fab fa-youtube"></i>
									</a>
								<?php endif;  ?>

								<?php if(!empty($google_plus_link)):  ?>
									<a href="<?php echo $google_plus_link; ?>" target="_blank" >
										<i class="fab fa-google-plus-g"></i>
									</a>
								<?php endif;  ?>		
</div>	