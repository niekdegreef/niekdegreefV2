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

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //niek_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<span class="page_tagline">
			<?php // tagline
				if( get_field('page_tagline') ):
					echo the_field('page_tagline');						
				endif; 
			?>
		</span>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content group">
		
		<p class="blurb">
		
		</p>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'niek' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'niek' ) );
				if ( $categories_list && niek_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php // printf( __( 'Posted in %1$s', 'niek' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

		<?php endif; // End if 'post' == get_post_type() ?>


	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

