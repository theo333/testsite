<?php
/**
 * The template for displaying custom post type "portfolio2" single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php
		while ( have_posts() ) {
            the_post();
        
            // replaced line below with contents of content-portfolio2.php
//			get_template_part( 'template-parts/content-portfolio2', get_post_format() );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                        the_post_thumbnail( 'cpttheme', array( 'class' => 'myp-screenshot-thumb' ));
                        the_content();
            
//                        echo get_post_field( 'post_content', get_the_ID() );  // === the_content() ?
//                        echo get_post_meta($id, 'post_content');  // ? why not working?
            
                        // loop to display multiple internal_page_screenshot custom field items
                        $image_ids = get_post_meta( $id, 'internal_page_screenshot', false );
                        if ( $image_ids ) {
                            foreach( $image_ids as $image_id) {
                                $image_src = wp_get_attachment_image( $image_id, 'thumbnail');
                                echo $image_src . ' ';  // why echo vs return?
                            }
                        }
                    ?>

                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php _s_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->
        <?php
			// the_post_navigation();

        } // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
