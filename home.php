<?php
/**
 * home.php
 * @package niek
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">


		<!-- <span class="patternbg" title="decoration"></span> -->

		<?php

		$stickyArgs = array(
			'posts_per_page' 		=> 1,
			'post__in'  => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' 	=> 1
		);
		$stickyPost = new WP_Query( $stickyArgs );


		$sticky = get_option( 'sticky_posts' );
		$featuredArgs = array (
			'category_name'          => 'featured',
			'ignore_sticky_posts'    => 1,
			'post__not_in' => $sticky,
		);

		// The Query
		$homepage = new WP_Query( $featuredArgs );

		// The Loop
		// if ( $stickyPost->have_posts() ) {
		// 	while ( $stickyPost->have_posts() ) {
		// 		$stickyPost->the_post();
		// 			get_template_part( 'content', get_post_format() );
		// 	}
		// } ?>
		<?php  if ( $homepage->have_posts() ) { ?>
		
		<div id="grid" class="grid group">
			
			<?php

			while ( $homepage->have_posts() ) {
				$homepage->the_post();
				get_template_part( 'content', get_post_format() );
			} ?>
		</div>

		<?php
		}
		else {
			// no posts found
		}
		// Restore original Post Data
		wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
