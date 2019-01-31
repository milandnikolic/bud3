<div class="content-wrapper answer frank">
	<?php the_content();?>
</div>
<div class="answers-image-slider">
	<?php
		// loop through the rows of data
	while ( have_rows('answer') ) : the_row();
		echo '<div class="answer-image o-fit">'.
		// display a sub field value
		'<img src="'.get_sub_field('answer_image').'">'.
	'</div>';
	endwhile;
	?>
</div>