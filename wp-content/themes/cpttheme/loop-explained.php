<?php
/*  The LOOP Explained


INDEX.PHP
--------------


==============
CONTENT.PHP
--------------

the_title() 
gets the post title
the_title( string $before = '', string $after = '', bool $echo = true )
https://developer.wordpress.org/reference/functions/the_title/


is_single()
is query for an existing post?
is_single( int|string|array $post = '' )
https://developer.wordpress.org/reference/functions/is_single/


esc_url()
sanitizes URLS
esc_url( $url, $protocols, $_context )
https://codex.wordpress.org/Function_Reference/esc_url


get_permalink()
Retrieve full permalink for current post or ID.
get_permalink( int|WP_Post $post, bool $leavename = false )
https://developer.wordpress.org/reference/functions/get_permalink/


_s_posted_on()
date and byline
https://github.com/Automattic/_s/blob/ab228109f55f24acf3b4fdb21a49e9eb8a9ff6fc/inc/template-tags.php


the_title( $before, $after, $echo )
https://codex.wordpress.org/Function_Reference/the_title


the_content( string $more_link_text = null, bool $strip_teaser = false )

https://developer.wordpress.org/reference/functions/the_content/


apply_filters( string $tag, mixed $value )
Call the functions added to a filter hook
https://developer.wordpress.org/reference/functions/apply_filters/


=> get_the_content()

https://developer.wordpress.org/reference/functions/get_the_content/


==============
PHP FUNCTIONS
--------------
isset()  
Is var set and not null?  Returns True or False.
bool isset ( mixed $var [, mixed $... ] )
http://php.net/manual/en/function.isset.php


sprintf ( string $format [, mixed $args [, mixed $... ]] )
string print format
explains this which shows up in WP code:  %2$s - means replace in the format string with the second var, a string, in the sprintf() array
http://php.net/manual/en/function.sprintf.php



*/
?>