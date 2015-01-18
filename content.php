<?php
/**
 * @package niek
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('group post'); ?> >
	<a href="<?php the_permalink(); ?>" class="group">
	<figure><?php the_post_thumbnail( ); ?></figure>	
	</a>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<?php endif; ?>

</article><!-- #post-## -->

