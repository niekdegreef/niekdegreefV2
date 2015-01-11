<?php
/**
 * home.php
 * @package niek
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">

			<div class="references group">
				<div class="logos">
					<p>A few clients who I enjoyed working with:</p>
					<ul>
						<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/uct.png" alt=""></li>
						<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jacana.png" alt=""></li>
						<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blacksheep.png" alt=""></li>
					</ul>
				</div>
				<div class="testimonials">
					<blockquote>Most awesome website, logo and corporate identiy ever, it actually brought about an entire restructure of our company. The rebranding forced us to look at what we had become over the years as a company, and the result was a renewed energy in the company and a ton of new leads, thanks!
					<span>Important person from company x </span></blockquote>
					<blockquote>It's a masterpiece!
						<span>Important person from company x </span>
					</blockquote>
				</div>
			</div>


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
