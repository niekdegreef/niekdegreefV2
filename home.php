<?php
/**
 * home.php
 * @package niek
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">
			<div class="references group">
				<div class="center_container">	
				<div class="logos">
					<p>These are some of the clients who I've had the opportunity to work with:</p>
					<ul>
<!-- 					<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/uct.png" alt=""></li>
						<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jacana.png" alt=""></li>
						<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blacksheep.png" alt=""></li> -->
						<li><a href="#">University of Cape Town</a></li>
						<li><a href="#">Jacana Media</a></li>
						<li><a href="#">Magnet Theatre</a></li>
						<li><a href="#">GC Fires</a></li>
						<li><a href="#">Blacksheep restaurant</a></li>
					</ul>
				</div>
				<div class="testimonials">
					<blockquote>"the book has come out and the cover looks striking. The author is delighted with it"
					<span>Jacana Media</span></blockquote>
					<blockquote>It's a masterpiece!
						<span>GC Fires</span>
					</blockquote>
					<blockquote>Just received a random call from someone saying our new website is amazing and congratulations!
						<span>Magnet Theatre</span>
					</blockquote>
				</div>
				</div>
			</div>

		<?php

			$sticky = get_option( 'sticky_posts' );
			$recent_work = array (
				'category_name' => 'recent',
				'posts_per_page' => 8,
		);

		// The Query
		$homepage = new WP_Query( $recent_work );
		?>

		<?php if ( $homepage->have_posts() ) { ?>
		
		<div id="grid" class="recentgallery grid group">
			<div class="center_container">
			<?php
				while ( $homepage->have_posts() ) {
					$homepage->the_post();
					get_template_part( 'content', get_post_format() );
				} ?>
			</div>

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

<?php get_footer(); ?>