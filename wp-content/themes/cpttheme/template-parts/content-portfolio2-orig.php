<?php
/**
 * Template part for displaying Portfolio2 custom post type posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

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
//            echo get_post_field( 'post_content', get_the_ID() );  // === the_content() ?
//            echo get_post_meta($id, 'post_content');  // ? why not working?
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
