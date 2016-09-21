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
            // replace with custom post type header
            // the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
            $id = get_the_ID();  // === $post->ID  ???
            $name = get_the_title($id);
//            $name = $post->post_title;  // same as above?
            $company = get_post_meta( $id, 'cm_company_name', true );
            $email = get_post_meta( $id, 'cm_email_address', true );
            $phone = get_post_meta( $id, 'cm_phone_number', true );
            $date_met = get_post_meta( $id, 'cm_date_met', true );
            $notes = get_post_meta( $id, 'cm_notes', true );

            // can have multiple relationships, so need to loop in order to display more than one.  Only displays first one more than once.  Why?
            $relationships = get_post_meta( $id, 'cm_relationship', false );
            if ( $relationships ) {
                $output_rel = '';
                foreach( $relationships as $relationship ) {
                    $output_rel .= $relationship . ', ';  // ? how to add conditional so that does not display trailing ',' on last item ?
                    
//                    $relationship = get_post_meta( $id, 'cm_relationship', true );
//                    $output_rel .= get_post_meta( $id, $relationship, true );  // displays nothing, does not look right
                }
            }
            
            // create output string and display on screen
            // ? how to dynamically display field labels ?
            $output = <<<HTML
                <h3>$name</h3>
                <b>Company:</b> $company<br/>
                <b>Email Address:</b> $email<br/>
                <b>Phone Number:</b> $phone<br/>
                <b>Date Met:</b> $date_met<br/>
                <b>Relationships:</b> $output_rel<br/>
                <b>Notes:</b> $notes
HTML;
            echo $output;
        
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php _s_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
