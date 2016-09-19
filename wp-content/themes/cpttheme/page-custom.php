<?php
/**
 * Template Name: Custom Page
 *
 * 
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			function demo_loop () {
                $args = array(
                    'cat' => 25,
                    'posts_per_page' => 5
                );

                $demo_posts = new WP_Query( $args );

                // Check that we have query results.
                if ( $demo_posts->have_posts() ) {

                    // Start looping over the query results.
                    while ( $demo_posts->have_posts() ) {

                        $demo_posts->the_post();
                ?>
                <li><a href="<?php get_permalink() ?>"><?php get_the_title() ?></a>
                <?php
                    }
                }

            }
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
