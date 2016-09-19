<?php
/**
 * The tmeplate for displaying posts
 * 
 * @package ??
 */

get_header(); ?>  


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
        <?php
        // execute if this is true
        if ( have_posts() ) {
            // execute while the statement have_posts() is true, loops 
            while ( have_posts() ) :  
                the_post();  // checks for next item in current collection of posts. Retreives next post.
           //         the_content(); // content of posts
            endwhile;
        endif;           

        </main>        
    </div>
    
get_sidebar();
get_header();
?>



<?php
/** QUESTIONS
 * Do we need both if and while statements? (Codex shows both, _s just while)?
 * 
 */

