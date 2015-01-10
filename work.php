<?php
/**
* template name: work
 * @package niek
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">

<!-- 		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
 -->
		<figure><?php the_post_thumbnail( ); ?></figure>

			<div id="grid">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php // the_content(); ?>

					<?php 
					
					if( get_field('subitem') ): ?>
													
							<?php while( has_sub_field('subitem') ): 
							$image = get_sub_field('image');

							$url = $image['url'];
							$title = $image['title'];
							$alt = $image['alt'];
							$caption = $image['caption'];
						
							$size = 'large';
							$thumb = $image['sizes'][ $size ];
							// $width = $image['sizes'][ $size . '-width' ];
							// $height = $image['sizes'][ $size . '-height' ];
							?>	
							
							<article class="post">
							<!-- 	<img src="<?php
								$image = get_sub_field('image');
								echo $image ?>" /> -->
<figure>
				<a href="<?php the_sub_field('link'); ?>"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" /></a>
</figure>
								<h2><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></h2>

								<p class="blurb"><?php the_sub_field('blurb'); ?></p>

<!-- 								<a href="<?php the_field('link'); ?>"><?php the_sub_field('title'); ?></a>
 -->
 							</article>

					<?php endwhile; ?>
										
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
