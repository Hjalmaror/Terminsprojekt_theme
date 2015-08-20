<?php
/**
 * Terminsprojekt functions and definitions
 *
 * @package Terminsprojekt
 */

if ( ! function_exists( 'terminsprojekt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function terminsprojekt_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Terminsprojekt, use a find and replace
	 * to change 'terminsprojekt' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'terminsprojekt', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'terminsprojekt' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'terminsprojekt_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // terminsprojekt_setup
add_action( 'after_setup_theme', 'terminsprojekt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function terminsprojekt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'terminsprojekt_content_width', 640 );
}
add_action( 'after_setup_theme', 'terminsprojekt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function terminsprojekt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'terminsprojekt' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'terminsprojekt_widgets_init' );
/**
 * Register category area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__( 'Catergory Sidebar', 'terminsprojekt' ),
		'id' => 'sidebar-2',
		'description' => 'An area for the category menu',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">>',
		'after_title' => '</h1>',
	));
}
/**
 * Enqueue scripts and styles.
 */
function terminsprojekt_scripts() {
	wp_enqueue_style( 'terminsprojekt-style', get_stylesheet_uri() );

	wp_enqueue_script( 'terminsprojekt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'terminsprojekt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'terminsprojekt-jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '20130115', true );

	wp_enqueue_script( 'terminsprojekt-jqueryUI', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array(), '20130115', true );
	
	wp_enqueue_script( 'terminsprojekt-dragdrop', get_template_directory_uri() . '/js/dragdrop.js', array(), '20130115', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'terminsprojekt_scripts' );

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


/**
*	Product Custom Post Type
**/
function my_custom_post_product() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name' ),
		'singular_name'      => _x( 'Product', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Product' ),
		'edit_item'          => __( 'Edit Product' ),
		'new_item'           => __( 'New Product' ),
		'all_items'          => __( 'All Products' ),
		'view_item'          => __( 'View Product' ),
		'search_items'       => __( 'Search Products' ),
		'not_found'          => __( 'No products found' ),
		'not_found_in_trash' => __( 'No products found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Products'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our products and product specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'product', $args ); 
}

add_action( 'init', 'my_custom_post_product' );

/*
*	Taxonomies
*/
function my_taxonomies_product() {
	$labels = array(
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ), 
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Product Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_category', 'product', $args );
}

add_action( 'init', 'my_taxonomies_product', 0 );

/*
*	Meta Box
*/
add_action( 'add_meta_boxes', 'product_price_box' );
function product_price_box() {
    add_meta_box( 
        'product_price_box',
        __( 'Product Price', 'myplugin_textdomain' ),
        'product_price_box_content',
        'product',
        'side',
        'high'
    );
}

function product_price_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'product_price_box_content_nonce' );
  echo '<label for="product_price"></label>';
  $value = get_post_meta($post->ID, "product_price", true);
  echo '<input type="text" id="product_price" name="product_price" placeholder="enter a price" value="'.$value.'"/>';
  echo "$";
}

// Handeling submitted data
add_action( 'save_post', 'product_price_box_save' );
function product_price_box_save( $post_id ) {

	

	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
		return $post_id;
	}

	// verify nonce
	if ( !wp_verify_nonce( $_POST['product_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
		return;

	// check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return;
	}
	$product_price = $_POST['product_price'];
	update_post_meta( $post_id, 'product_price', $product_price );
}
/**
*	Showcase Custom Post Type
**/
function my_custom_post_showcase() {
	$labels = array(
		'name'               => _x( 'Showcases', 'post type general name' ),
		'singular_name'      => _x( 'Showcase', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Showcase' ),
		'edit_item'          => __( 'Edit Showcase' ),
		'new_item'           => __( 'New Showcase' ),
		'all_items'          => __( 'All Showcase' ),
		'view_item'          => __( 'View Showcase' ),
		'search_items'       => __( 'Search showcases' ),
		'not_found'          => __( 'No showcase found' ),
		'not_found_in_trash' => __( 'No showcase found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Showcases'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Clothes Showcases data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'showcase', $args ); 
}

add_action( 'init', 'my_custom_post_showcase' );
/**
*	Post thumbnail support
**/
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
}

