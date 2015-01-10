<?php
/**
* template name: online
 * @package niek
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">
		

		<div id="grid">

		<?php


		$stickyArgs = array(
			'post__in'  => get_option( 'sticky_posts' ),
		);
		$stickyPost = new WP_Query( $stickyArgs );


		$onlineArgs = array (
			'category_name'          => 'online',		
		);

		// The Query
		$onlinepage = new WP_Query( $onlineArgs );

		// The Loop
		// if ( $stickyPost->have_posts() ) {
		// 	while ( $stickyPost->have_posts() ) {
		// 		$stickyPost->the_post();
		// 		get_template_part( 'content', get_post_format() );
		// 	}
		// }
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
