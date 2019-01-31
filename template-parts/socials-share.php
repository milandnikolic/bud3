
<div class="socials-share">
	<span class="share-text"><?php _e('Podeli članak', 'bud3' ); ?></span>
	<span class="share-links">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" title="Share this post on Facebook" target="_blank" class="white fb"><i class="fab fa-facebook-f"></i></a>
		<a href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank" class="white tw"><i class="fab fa-twitter"></i></a>
		<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="white gp"><i class="fab fa-google-plus-g"></i></a>
		<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink() ?>" title="Podeli sa prijateljima" target="_blank" class="white em"><i class="fas fa-envelope"></i></a>
		<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="Share this post on LinkedIn" target="_blank" class="white ld"><i class="fas fa-link"></i></a>
	</span>
</div>