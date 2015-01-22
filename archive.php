<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package niek
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
							if ( is_category() ) {
								printf( __( 'Category Archives: %s', 'beyerdegreef' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} 
							elseif ( is_tax( 'client' )  ) {
									 // this gets the client name
										$taxonomy = 'client';
										$queried_term = get_query_var($taxonomy);
										$terms = get_terms($taxonomy, 'slug='.$queried_term);
										if ($terms) {
										  foreach($terms as $term) {
										  	echo $term->name;
										  }
									
										}
							} 
							else {
								_e( 'Archives', 'beyerdegreef' );

							}
						?>
				</h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?><p>Work done for
				<?php
				if ( is_tax( 'client' )  ) {
					// this gets the client name
					$taxonomy = 'client';
					$queried_term = get_query_var($taxonomy);
					$terms = get_terms($taxonomy, 'slug='.$queried_term);
					if ($terms) {
					  foreach($terms as $term) {
					  	echo $term->name . ':' ;
					  }

					}
				} 
			
				?>
				</p>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>

			<div id="grid" class="recentgallery grid group">
			<div class="center_container">
				
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>
		
			</div>
			</div>	
	
			<?php niek_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
