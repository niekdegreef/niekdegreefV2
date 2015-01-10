<?php
/**
* template name: design
 * @package niek
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">
		

		<div id="grid">

		<?php

		$onlineArgs = array (
			'category_name'          => 'design',
		);

		// The Query
		$onlinepage = new WP_Query( $onlineArgs );

		// The Loop

		if ( $onlinepage->have_posts() ) {
			while ( $onlinepage->have_posts() ) {
				$onlinepage->the_post();
				get_template_part( 'content', get_post_format() );
			}
		}
		else {
			// no posts found
		}
		// Restore original Post Data
		wp_reset_postdata();
		?>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
