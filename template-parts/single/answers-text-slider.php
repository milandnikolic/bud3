<?php
$imgsCount=count(get_field('answer'));
$num=$imgsCount;
echo '<div class="answers-text-slider">';
	while ( have_rows('answer') ) : the_row();
	echo ''.
	'<div class="answer-text-wrapper" data-slide="'.$num.'">'.
							'<h2 class="answer-title title-bar">'.$num.'. '.get_sub_field('answer_title').'</h2>'.
		'<div class="answer-text">'.get_sub_field('answer_text').'</div>'.
	'</div>';
	//$num++;
	$num = $num - 1;
	endwhile;
	echo '</div>';
	echo '<div class="thumbnails-number answer">'.
			'<div class="img-number t-bold">'.$imgsCount.'</div>'.
			'<div class="img-count">'.$imgsCount.'</div>'.
	'</div>';
?>