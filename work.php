<?php
/**
* template name: work
 * @package niek
 * 
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main group" role="main">
<header class="page-header">
	<h1 class="page-title">
		Portfolio
	</h1>
</header>

		<?php

		$work = array (
				'posts_per_page' => 30,
		);

		// The Query
		$showwork = new WP_Query( $work );

		if ( $showwork->have_posts() ) { ?>
		
		<div id="grid" class="recentgallery grid group">
			<div class="center_container">
			<?php
				while ( $showwork->have_posts() ) {
					$showwork->the_post();
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