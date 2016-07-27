<?php
/**
 * Template part for displaying posts.
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
		?>
		<p><a href="<?php echo get_post_meta($post->ID, 'url', true ); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'url', true ); ?></a></p> 
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
