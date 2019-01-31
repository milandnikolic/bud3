					<div class="custom-footer">	
						<div class="flex flex-wrap flex-space-between flex-vertical-center mgb20">
							<div class="flex flex-vertical-center flex-wrap">
								<a class="flex flex-vertical-center noto" href="<?php echo home_url(); ?>">
									<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="BUD3" class="footer-logo"> 
								</a>
								<div><img style="display: block;" src="<?php echo get_template_directory_uri(); ?>/img/BUD3-Slogan-01.png" alt="REKREACIJA ZA UBR3ANU GENERACIJU" class="slogan"></div> 
							</div>

							<?php 
								if( !wp_is_mobile() ){
									wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); 
								}	
							?>
						</div>	

						<div class="flex flex-wrap flex-space-between flex-vertical-end">
							<!-- copyright -->
						<p class="copyright">
						  Copyright	&copy; <?php echo date('Y'); ?>  <?php _e('bud3 - rekreacija 3a ubr3anu generaciju', 'bud3'); ?> <br>
							 <?php _e('Preuzimanje tekstova i fotografija, njihovo kopiranje i redistribucija nisu dozvoljeni bez pismenog odobrenja autora.', 'bud3'); ?> <br>
							 <?php _e('Uz odobrenje autora dozvoljeno je preuzeti ne više od pedeset posto teksta i fotografija iz članka (ne iz galerije) uz obavezno potpisivanje', 'bud3'); ?> <br>
							 <?php _e('svih autora koji su učestvovali u kreiranju istog, kao i uz postavljanje direktnog linka ka originalnom članku. Website design by Bojana Urošević', 'bud3'); ?>
						</p>
						<!-- /copyright -->

							<?php get_template_part('template-parts/socials'); ?>
						</div>	
					</div>					
					</div><!-- /main-body -->
			</div>
		<!-- /body-content -->
		</div>
		<!-- /wrapper -->			
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a><!-- back to top -->
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>



	</body>
</html>
