<?php
/**
 * @package niek
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header group">
		<figure><?php the_post_thumbnail( ); ?></figure>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
			<?php // tagline
				if( get_field('website') ):
					echo '<address> website: <a href="http://' , the_field('website') , '">',the_field('website') , '</a></address>' ;						
				endif; 
			?>
		
			<?php // tagline
				if( get_field('page_tagline') ):
					echo '<span class="page_tagline">' , the_field('page_tagline') , '</span>';						
				endif; 
			?>

	</header><!-- .entry-header -->

	<div class="entry-content group">

		<div class="para">
			<?php the_content(); ?>
		</div> 

		<?php 
		$images = get_field('project_images');
		if( $images ): ?>
		    <div class="project_image_container">
            <?php foreach( $images as $image ): ?>
                    
                <figure>

				<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
					<figcaption>
						<?php echo $image['caption']; ?>
					</figcaption>	
				</figure>			                    
	      
	        <?php endforeach; ?>				 
		    </div>
		 <?php endif; 
		 
		?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'niek' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
