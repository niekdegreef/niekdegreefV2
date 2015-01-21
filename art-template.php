<?php
	/*
		Template Name: Art template
	*/


get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content group" role="main">

				<div id="container" class="group">

				<?php while ( have_posts() ) : the_post(); ?>
							
					<?php 
						$images = get_field('image_gallery');
						 
						if( $images ): ?>


						    <div class="grid-sizer"> </div><div class="grid-gutter-sizer"> </div>
						            <?php foreach( $images as $image ): ?>
						            <div class="box col group">
						                    
	<?php $imageid = $image['id']; ?>     
 <a href="<?php echo $image['sizes']['large']; ?>">
 	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" class="item group" />
 </a>
									</div>
						            <?php endforeach; ?>
					
						<?php endif; 
						?>

				<?php endwhile; // end of the loop. ?>

				</div> <!-- end masonry -->
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>