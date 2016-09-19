<?php
/**
 * marcador functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package marcadordo
 * @author  Richard Blondet <richardblondet@gmail.com>
 */

if ( ! function_exists( 'marcador_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function marcador_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on marcador, use a find and replace
	 * to change 'marcador' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'marcadordo', get_template_directory() . '/languages' );

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
		'primary' 			=> esc_html__( 'Principal', 'marcadordo' ), // Deportes
		'primary_mas' 	=> esc_html__( 'Principal-Mas', 'marcadordo' ),
		'primary_top' 	=> esc_html__( 'Principal-Top', 'marcadordo' ),
		'deportes_top' 	=> esc_html__( 'Deportes', 'marcadordo' ),
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
	add_theme_support( 'custom-background', apply_filters( 'marcador_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add Marcador custom user role
	$result = add_role(
		'marcador_contributor',
		__( 'Marcador Contributor' ),
		array(
			'read' 							=> true,
			'edit_posts' 				=> true,
			'edit_pages' 				=> true,
			'create_posts'			=> true,
			'manage_categories' => true,
			'edit_themes' 			=> false,
			'install_plugins' 	=> false,
			'update_plugin' 		=> false,
			'update_core' 			=> false
		)
	);
}
endif;
add_action( 'after_setup_theme', 'marcador_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marcador_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'marcador_content_width', 640 );
}
add_action( 'after_setup_theme', 'marcador_content_width', 0 );

/*
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 
function marcador_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marcadordo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'marcadordo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'marcador_widgets_init' );
*/

/**
 * Enqueue scripts and styles.
 */
function marcador_scripts() {
	$google_roboto_font = 'https://fonts.googleapis.com/css?family=Material+Icons|Roboto:300,400,700';
	$benton_marcador_font = '/assets/fonts/benton-marcador/font.css';
	$twitter_bootstrap  = '/assets/vendor/bootstrap/css/bootstrap.min.css?id=5d472e23c7e390b505e8dd6606f3a9ce';

	wp_enqueue_style( 'google-roboto-font', $google_roboto_font, array() );
	wp_enqueue_style( 'benton-marcador-font', get_template_directory_uri() . $benton_marcador_font, array() );
	wp_enqueue_style( 'twitter-bootstrap', get_template_directory_uri() . $twitter_bootstrap, array() );
	wp_enqueue_style( 'marcador-style', get_stylesheet_uri() );

	$sidebar_menu = '/assets/js/sidebar-menu.js';
	$sidebar_nav_submenu = '/assets/js/sidebar-nav-submenu.js';
	$bootstrap_js = '/assets/vendor/bootstrap/js/bootstrap.min.js';
	$marcador_toastr = '/assets/js/toastr-notify.js';

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sidebar-menu', get_template_directory_uri() . $sidebar_menu, array(), '1.0.0' );
	wp_enqueue_script( 'sidebar-nav-menu', get_template_directory_uri() . $sidebar_nav_submenu, array('sidebar-menu'), '1.0.0' );
	wp_enqueue_script( 'marcador-toastr', get_template_directory_uri() . $marcador_toastr, array('jquery'), '1.1', false );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . $bootstrap_js, 'jquery', '3', false );
	// wp_enqueue_script( 'marcador-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'marcador-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page('trabaja-con-nosotros') || is_page('contacto') ) {
		wp_enqueue_script( 'google-recapcha', 'https://www.google.com/recaptcha/api.js', array() );
	}

	if ( is_404() ) {
		wp_enqueue_style( 'bebasneue-font', get_template_directory_uri()."/assets/fonts/bebasneue.ttf", array() );
		wp_enqueue_style( 'animate-css', get_template_directory_uri()."/assets/css/animate.css", array() );
		wp_enqueue_style( 'style-404', get_template_directory_uri()."/assets/css/style404.css", array() );
	}
	if( is_category() ) {
		$src = get_template_directory_uri() . '/';

		wp_enqueue_script( 
			$handle = 'marcador-datepicker', 
			$src . 'assets/vendor/datepicker/bootstrap-datepicker.min.js', 
			$deps = array('jquery'), 
			$ver = '1', 
			$in_footer = false 
		);
		wp_enqueue_style( 
			$handle = 'marcador-datepicker',
			$src . 'assets/vendor/datepicker/bootstrap-datepicker.min.css', 
			$deps = null, 
			$ver = '1', 
			$media = 'all' 
		);
	}
}
add_action( 'wp_enqueue_scripts', 'marcador_scripts' );


// Register Custom Taxonomy
function marcador_mail_taxonomy_function() {

	$labels = array(
		'name'                       => _x( 'Mail Subjects', 'Taxonomy General Name', 'marcadordo' ),
		'singular_name'              => _x( 'Mail Subject', 'Taxonomy Singular Name', 'marcadordo' ),
		'menu_name'                  => __( 'Marcador Email', 'marcadordo' ),
		'all_items'                  => __( 'Marcador Emails', 'marcadordo' ),
		'parent_item'                => __( '', 'marcadordo' ),
		'parent_item_colon'          => __( '', 'marcadordo' ),
		'new_item_name'              => __( 'New Item Name', 'marcadordo' ),
		'add_new_item'               => __( 'Add New Item', 'marcadordo' ),
		'edit_item'                  => __( 'Edit Item', 'marcadordo' ),
		'update_item'                => __( 'Update Item', 'marcadordo' ),
		'view_item'                  => __( 'View Item', 'marcadordo' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'marcadordo' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'marcadordo' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'marcadordo' ),
		'popular_items'              => __( 'Popular Items', 'marcadordo' ),
		'search_items'               => __( 'Search Items', 'marcadordo' ),
		'not_found'                  => __( 'Not Found', 'marcadordo' ),
		'no_terms'                   => __( 'No items', 'marcadordo' ),
		'items_list'                 => __( 'Items list', 'marcadordo' ),
		'items_list_navigation'      => __( 'Items list navigation', 'marcadordo' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => false,
		'show_ui'                    => false,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'marcador_mail_taxonomy', array( 'marcador_mail_post' ), $args );

}
add_action( 'init', 'marcador_mail_taxonomy_function', 0 );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 * @author Richard Blondet <richardblondet@gmail.com>
 */
function marcador_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'marcador_body_classes' );


/**
 * Customizer additions.
 */
require get_template_directory() . '/customizers/normalize.php';
require get_template_directory() . '/customizers/logo/logo.php';

if ( is_user_logged_in() ) {
	$user = wp_get_current_user();

	$marcador_user_role = 'marcador_contributor';
  $is_colaborator = array_search( $marcador_user_role, $user->roles, FALSE );
  if ( $is_colaborator !== FALSE && !is_null($is_colaborator) ) 
  	show_admin_bar( false );
}

date_default_timezone_set ( 'America/Santo_Domingo' );

/**
 * Adds Selector to Deportes Menu
 * @param string $items WP managed menu items.
 * @param object $args WP menu arguments.
 * @return string
 */
add_filter( 'wp_nav_menu_items', 'selector_deportes_top_menu', 10, 2 );
function selector_deportes_top_menu ( $items, $args ) {
    if ($args->theme_location == 'deportes_top') {
    	global $parents;
    	if (!in_array($parents[count($parents)-1], array('lidom', 'mlb'))) {
    		$tmp = explode("\n", trim($items));
	  		$items = $tmp[0];
    	}
    	$disciplina_id = get_cat_id($parents[0]);
    	if ($disciplina_id > 0) {
	    	$all_ligas = get_categories( $args = array(
		      'taxonomy' => 'category',
		      'child_of' =>$disciplina_id)
		    );
    	}

    	$options = "<option value=''>Seleccione</option>";
    	if (count($all_ligas) > 0){
	      foreach ($all_ligas as $liga) {
	      	$selected = ($parents[1] === $liga->slug) ? "selected" : "";
	      	$option ="<option value=\"" . get_category_link( $liga->cat_ID ) . "\" ".$selected.">".$liga->name."</option>";
	      	$options .= $option;
	      }
	    }

      $li  =  "<li id=\"liga-select\">";
      $li .=		"<select name='liga-select' id='liga-drpdwn' class='form-control'>";
      $li .=			$options; 
      $li .= 		"</select>";
      $li .= 	"</li>";
      $items = $li . $items;
    }
    return $items;
}

/**
 * Filter that controls the number of words of the excerpt. 
 * @param int $length excerpt length.
 * @return int
 */
function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
