<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package niek
 */
?>
	<div id="secondary" class="widget-area" role="complementary">

		<aside  class="projects forthcoming">
			<ul>
			<?php
					$args = array (
						'cat'                    => '6', // the current category
						'order'                  => 'DESC',
						'orderby'                => 'modified',
					);

					$query_current_work = new WP_Query( $args );

					if ( $query_current_work->have_posts() ) {

						echo '<h3 class="widget-title">Current &amp; upcoming projects</h3>';
						while ( $query_current_work->have_posts() ) {
							$query_current_work->the_post();
							echo '<li><a href="' , the_permalink() , '">' , the_title() , '</a></li>';
						}
					} else {
						// nothin
					}
					wp_reset_postdata();
			?>
			</ul>
		</aside>
		<aside  class="projects recent">
			<ul>

			<?php
					$args = array (
						'cat'                    => '9', // the recent category
						'order'                  => 'DESC',
						'orderby'                => 'modified',
					);

					$query_recent_work = new WP_Query( $args );

					if ( $query_recent_work->have_posts() ) {

						echo '<h3 class="widget-title">Recent projects</h3>';
						while ( $query_recent_work->have_posts() ) {
							$query_recent_work->the_post();
							echo '<li><a href="' , the_permalink() , '">' , the_title() , '</a></li>';
						}
					} else {
						// nothin
					}
					wp_reset_postdata();
			?>
			</ul>
		</aside>

	</div><!-- #secondary -->
