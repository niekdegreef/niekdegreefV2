<?php
/**
 * niek functions and definitions
 *
 * @package niek
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'niek_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function niek_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on niek, use a find and replace
	 * to change 'niek' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'niek', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */

	add_theme_support( 'post-thumbnails', array( 'post', 'page' , 'blog' ) ); // Posts and Pages


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'niek' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'niek_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // niek_setup
add_action( 'after_setup_theme', 'niek_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function niek_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'niek' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'niek_widgets_init' );


 
// Register Script
function niek_scripts() {

	wp_enqueue_style( 'niek-style', get_stylesheet_uri() );

	// wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', 'ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, false, false );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, false, false );
	wp_enqueue_script( 'modernizr' );

	wp_register_script( 'vendor-ck', get_template_directory_uri() . '/js/min/vendor-ck.js', false, false, true );
	wp_enqueue_script( 'vendor-ck' );

	wp_register_script( 'myscripts-ck', get_template_directory_uri() . '/js/min/myscripts-ck.js', false, false, true );
	wp_enqueue_script( 'myscripts-ck' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'niek_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

//remove admin bar from front when logged in
add_filter( 'show_admin_bar', '__return_false' );

// Register Custom Post Type
function custom_post_type_blogs() {

	$labels = array(
		'name'                => _x( 'Blog posts', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Blog', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Blog posts', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent blog:', 'text_domain' ),
		'all_items'           => __( 'All blog posts', 'text_domain' ),
		'view_item'           => __( 'View blog', 'text_domain' ),
		'add_new_item'        => __( 'Add New blog', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'blog', 'text_domain' ),
		'description'         => __( 'Blog posts', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'blog', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_blogs', 0 );


// Replace Posts label to Work in Admin Panel 

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Work';
    $submenu['edit.php'][5][0] = 'Work';
    $submenu['edit.php'][10][0] = 'Add Work';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Works';
        $labels->singular_name = 'Work';
        $labels->add_new = 'Add Work';
        $labels->add_new_item = 'Add Work';
        $labels->edit_item = 'Edit Work';
        $labels->new_item = 'Work';
        $labels->view_item = 'View Work';
        $labels->search_items = 'Search Work';
        $labels->not_found = 'No Work found';
        $labels->not_found_in_trash = 'No Work found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

// Image sizes
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'header', 1100, 450, true ); 
	add_image_size( 'admin-thumb', 100, 9999, false ); // 100 pixels wide (and unlimited height)  
}
// Thumbnails to Admin Post View  
add_filter('manage_posts_columns', 'posts_columns', 5);  
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);  
  
function posts_columns($defaults){  
    $defaults['my_post_thumbs'] = __('Preview');  
    return $defaults;  
}  
  
function posts_custom_columns($column_name, $id){  
    if($column_name === 'my_post_thumbs'){  
        echo the_post_thumbnail( 'admin-thumb' );  
    }  

}
add_filter('manage_pages_columns', 'pages_columns', 5);  
add_action('manage_pages_custom_column', 'pages_custom_columns', 5, 2);  
  
function pages_columns($defaults){  
    $defaults['my_page_thumbs'] = __('Preview');  
    return $defaults;  
}  
  
function pages_custom_columns($column_name, $id){  
    if($column_name === 'my_page_thumbs'){  
        echo the_post_thumbnail( 'admin-thumb' );  
    }  
}