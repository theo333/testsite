<?php
/**
 * Theme With CPT functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cpttheme
 */

if ( ! function_exists( 'cppttheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cppttheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'cppttheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'cppttheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cppttheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'cppttheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cppttheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cppttheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'cppttheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cppttheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cppttheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cppttheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cppttheme_widgets_init' );

// Enable shortcodes in widgets
// from: http://www.carriedils.com/extend-wordpress-widgets-without-plugin/
add_filter( 'widget_text', 'do_shortcode');

/**
 * Enqueue scripts and styles.
 */
function cppttheme_scripts() {
	wp_enqueue_style( 'cppttheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cppttheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cppttheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cppttheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/****************************************************/
/*********** Custom Loop Homewook (begin) ***********/

// Custom query.
function demo_loop () {
    $args = array(
        'orderby' => 'date',
        'order' => 'DSC',
        'posts_per_page' => 5,
        'ignore_sticky_posts' => true  // if don't put this, then will display >5 posts bc have a sticky post in this case
    );
    
    $output = '';
    
    // create new object (instance) of WP_Query
    $demo_posts = new WP_Query( $args );  

    // Check that we have query results.
    if ( $demo_posts->have_posts() ) {
        
        $output = '<ul>';  
        
        // Start looping over the query results.
        while ( $demo_posts->have_posts() ) {

            $demo_posts->the_post();

            $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a> </li>';

        }
        
        $output .= '</ul>';  
    }
    
// why these display $output differently?  (Only use one.)
    // displays output before other shortcode - CORRECT order inserted in post
    // in widget: NOT showing in text widget, but instead in ???
    echo $output;  
    // displays output after other shortcode - INCORRECT order inserted in post
    // in widget: shows in text widget
//    return $output;  

// Restore original post data.
wp_reset_postdata();
}

add_shortcode( 'demo_custom_loop', 'demo_loop' );

/*********** Custom Loop Homewook (end) ***********/



// Custom query: get_posts() method
// alt way to modify WP_Query without creating new object of WP_Query (not custom query)
// ??? why showing same post over and over? - Query is not being reset. Displaying title of last post from demo_loop().  How to fix?
function demo_get_posts() {
    $args = array(
//       'category_name' => 'titles',
        'order' => 'ASC',
        'orderby' => 'post_title',
        'posts_per_page' => 8
    );
    
    // Return an array of all posts in the " " category.
    echo '<ul>';
    $all_posts_list = get_posts( $args );
    foreach ( $all_posts_list as $post ) : setup_postdata ( $post ); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php the_time( 'm/d/y' ); ?>
        </li>

    <?php endforeach;
    echo '</ul>';
    wp_reset_postdata();

}

add_shortcode( 'demo_get_posts_sc', 'demo_get_posts');