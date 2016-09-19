<?php
/**
 * The tmeplate for displaying posts
 * 
 * @package cpttheme
 */

get_header(); ?>  

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
        <?php
        // execute if this is true
        if ( have_posts() ) :
            // execute while the statement have_posts() is true, loops 
            while ( have_posts() ) :  
                the_post();  // checks for next item in current collection of posts. Retreives next post. i++
                    get_template_part( 'template-parts/content', get_post_format());
                  // the_content(); 
            endwhile; 
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
        </main><!-- #main -->        
    </div><!-- #primary -->
            
<?php            
get_sidebar();
get_header();

            
            
/** QUESTIONS
 * Do we need both if and while statements? (Codex shows both, _s just while)?
 * 
 */

