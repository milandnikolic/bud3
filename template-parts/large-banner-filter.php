<!-- <div class="col12 large-banner-filter">
<div class="row">
	<div class="col8 large-banner">
		<?/*php the_random_large_banner();*/?>
	</div>
	<div class="col4 filter-wrapper">
		
	</div>
</div>
</div> -->

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
				</div>
			</div>
			<div class="col4">
				<div class="flex flex-vertical-center">
					<h3>FILTER POSTOVA PO BRENDU AUTOMOBILA</h3>
					<p>Odaberi brend automobila i izlistaće se svi postovi u kojima smo pisali o njemu</p>	
				</div>
				<div class="brend-automobila-select noto">
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