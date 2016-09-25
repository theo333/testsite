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

            // replaced line below with contents of content-contacts2.php
//			get_template_part( 'template-parts/content-contacts2', get_post_format() );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                        // replace with custom post type header
                        // the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                        $id         = get_the_ID();  // === $post->ID  ???
                        $name       = get_the_title($id);
            //            $name = $post->post_title;  // same as above?
                        $company    = get_post_meta( $id, 'cm_company_name', true );
                        $email      = get_post_meta( $id, 'cm_email_address', true );
                        $phone      = get_post_meta( $id, 'cm_phone_number', true );
                        $date_met   = get_post_meta( $id, 'cm_date_met', true );
                        $notes      = get_post_meta( $id, 'cm_notes', true );

                        // can have multiple relationships, so need to loop in order to display more than one.  Only displays first one more than once.  Why?
                        $relationships = get_post_meta( $id, 'cm_relationship', false );
                        if ( $relationships ) {
                            $output_rel = '';
                            $output_rel2 = '';
                            foreach( $relationships as $relationship ) {
                                $output_rel .= $relationship . ', ';  // ? how to add conditional so that does not display trailing ',' on last item ?
//                                $output_rel2 .= array($relationship);
                            }
//                                $output_rel_all = implode(",", $output_rel2);
                        }

                        // create output string and display on screen
                        $labels = array('Company:', 'Email Address:', 'Phone Number:', 'Date Met:', 'Relationships:', 'Notes:');
                        $values = array($company, $email, $phone, $date_met, $output_rel, $notes);
                        
                        echo "<ul><li>" . implode("</li><li>", $values) . "</li></ul>";
            
//                        echo <<<HTML
//                            <h3>$name</h3>
//                            <b>Company:</b> $company<br/>
//                            <b>Email Address:</b> $email<br/>
//                            <b>Phone Number:</b> $phone<br/>
//                            <b>Date Met:</b> $date_met<br/>
//                            <b>Relationships:</b> $output_rel<br/>
//                            <b>Notes:</b> $notes
//HTML;
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
