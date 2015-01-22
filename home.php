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
						<?php 
			            $terms = get_terms('client' , array (
			                'parent' => '30', // featured clients ONLY! 17 remote, 30 local
			            ) );

			            $count = count($terms);
			            if ( $count > 0 ){
			                foreach ( $terms as $term ) {
			                echo '<li><a href="' . esc_url( home_url() ) . '/client/' . $term->slug . ' ">' . $term->name . '</a></li>';
			                }
			            }
			            ?>
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