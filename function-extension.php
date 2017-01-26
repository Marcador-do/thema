<?php 
/**
* Name: MarcadorDo Extension for Contributors by Raylin
* URI: http://marcador.do/
* Description: This plugin will able of Powerful user's admin.
* Version: 1.0
* Author: Raylin Aquino
* Author URI: http://raylinaquino.com/
*/
/**
 * Customizer additions.
 */
/*** Raylin Codes ***/
add_image_size( 'full', 1200, 675, true );
add_image_size( 'large', 1200, 500, true );
add_image_size( 'medium', 800, 400, true );
add_image_size( 'medium_large', 800, 350, true );
add_image_size( 'thumbnail', 250, 250, true );
add_image_size( 'thumbnail_large', 300, 180, true);




$user_admin_name = "wp-admin";

function dt_get_link_edit($post_id){

    if ( !current_user_can( 'manage_options' ) ) return false;
?>
<div class="edit-wrap">
    <a href="<?php echo get_edit_post_link($post_id); ?>" class='adm-edit-post trans-3' target='_blank' title='<?php _e('Editar contenido'); ?>'><?php _e('Editar'); ?></a>
</div>
<?php
}
/**
 * Get an attachment ID given a URL.
 * 
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function get_attachment_id( $url ) {

	$attachment_id = 0;

	$dir = wp_upload_dir();

	if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?

		$file = basename( $url );

		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);

		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) {

			foreach ( $query->posts as $post_id ) {

				$meta = wp_get_attachment_metadata( $post_id );

				$original_file       = basename( $meta['file'] );
				$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );

				if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
					$attachment_id = $post_id;
					break;
				}

			}

		}

	}

	return $attachment_id;
}

/** Check if a category is into Favorites categories stock */

function check_favorite_category_user($cat_array){
	if(gettype($cat_array) !== 'array'){
		throw new Exception(__FUNCTION__." - Only accept array value");
		
	}

	if(wp_get_current_user()->caps['marcador_contributor'] != 1) return false;

	$cats = get_option(get_user_meta_category_favorites());
	$be = false;

		if(!empty($cats)){
		
			$cats = explode(", ",$cats);
					
				if(count($cats) > 0 and is_array($cats)){
					
					foreach($cat_array as $cat){
						
						if(in_array($cat, $cats) === true){
							$be = true;
							continue;
						}
					}
				}


		}
		return $be;
	

}


/*
print_r(check_favorite_category_user(array()));
exit;*/
/** Get user meta with Toolset Plugin */
function get_toolset_usermeta($field){
	return types_render_usermeta($field, array("output"=> "raw",  "user_current" => true));
}
// Remove dashboard widgets
function remove_dashboard_meta() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	}
}
add_action( 'admin_init', 'remove_dashboard_meta' ); 
/** Admin Scheme for USers  */
function fn_marcador_default_user_admin_color($user_id) {

	$user = wp_get_current_user();
	$args = array(
		'ID' => $user->ID,
		'admin_color' => 'midnight'
		);

	if (@is_marcador_user($user, $check_active = TRUE) !== FALSE ){

		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
		wp_update_user( $args );
		
	}

	return false;
	
}

function load_custom_wp_admin_style($hook) {
	$src = get_template_directory_uri() . '/';

	$google_roboto_font = 'https://fonts.googleapis.com/css?family=Material+Icons|Roboto:300,400,700';
	$benton_marcador_font = 'assets/fonts/benton-marcador/font.css';
	$twitter_bootstrap  = 'assets/vendor/bootstrap/css/bootstrap.min.css?id=5d472e23c7e390b505e8dd6606f3a9ce';
	$materialize_spinner = 'assets/css/materialize.spinner.css';

	wp_enqueue_style( 'google-roboto-font', $google_roboto_font, array() );
	wp_enqueue_style( 'benton-marcador-font', $src . $benton_marcador_font, array() );
	wp_enqueue_style( 'twitter-bootstrap', $src . $twitter_bootstrap, array() );
	wp_enqueue_style( 'materialize-spinner', $src . $materialize_spinner, array() );

	wp_enqueue_style( 'admin-css', get_template_directory_uri().'/assets/css/user-admin.css' );


	$sidebar_menu = 'assets/js/sidebar-menu.js';
	$sidebar_nav_submenu = 'assets/js/sidebar-nav-submenu.js';
	$bootstrap_js = 'assets/vendor/bootstrap/js/bootstrap.min.js';
	$marcador_toastr = 'assets/js/toastr-notify.js';
	// More details at: http://jquery.malsup.com/block/
	$blockUI = 'assets/js/jquery.blockUI.js';
	$mainJs = 'assets/js/main.js';



	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sidebar-menu', $src . $sidebar_menu, array(), '1.0.0' );
	wp_enqueue_script( 'sidebar-nav-menu', $src . $sidebar_nav_submenu, array('sidebar-menu'), '1.0.0' );
	wp_enqueue_script( 'marcador-toastr', $src . $marcador_toastr, array('jquery'), '1.1', false );
	wp_enqueue_script( 'bootstrap-js', $src . $bootstrap_js, 'jquery', '3', false );
	// wp_enqueue_script( 'marcador-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// 
	wp_enqueue_script( 'marcador-jqueryui',  'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '20151215', true );

	wp_enqueue_script( 'marcador-skip-link-focus-fix', $src . 'assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'main-js', $src . $mainJs, 'jquery', '3', false );


}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

add_action('marcador_default_user_admin_color', 'fn_marcador_default_user_admin_color');

do_action("marcador_default_user_admin_color" );



remove_action( 'bp_adminbar_logo',  'bp_adminbar_logo' );


add_action('bp_adminbar_logo','my_adminbar_name');

function posts_for_current_author($query) {
	global $pagenow;

	if( 'edit.php' != $pagenow || !$query->is_admin )
		return $query;

	if( !current_user_can( 'edit_others_posts' ) ) {
		global $user_ID;
		$query->set('author', $user_ID );
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

//echo "<pre>",print_r($_SERVER); exit;


/** Restricting users to view only media library items they have uploaded  */
add_action('pre_get_posts','users_own_attachments');
function users_own_attachments( $wp_query_obj ) {

	global $current_user, $pagenow;

	if( !is_a( $current_user, 'WP_User') )
		return;

	if( !in_array( $pagenow, array( 'upload.php', 'admin-ajax.php' ) ))
		return;



	if( !current_user_can('delete_pages') )
		$wp_query_obj->set('author', $current_user->ID );

	return;
}



// CUSTOM LIST POST

function custom_columns($columns) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => "Titulo",
		'categories' => 'Categoria',
		'author' => 'Autor',
		'tags' => 'Etiquetas',
		'featured_image' => 'Imagen',
		'date' => 'Date'
		);
	return $columns;
}

function ST4_get_featured_image($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
		return $post_thumbnail_img[0];
	}
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
	$defaults['featured_image'] = 'Featured Image';
	return $defaults;
}

// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = ST4_get_featured_image($post_ID);
        $h_limit = 150; //Height Limit
        if($post_featured_image == "") return ;

        
        echo '<img src="' . $post_featured_image . '" width="150" />';
        
    }
}

add_filter('manage_posts_columns', 'ST4_columns_head');
add_action('manage_posts_custom_column', 'ST4_columns_content', 10, 2);
add_filter('manage_pages_columns', 'ST4_columns_head');
add_action('manage_pages_custom_column', 'ST4_columns_content', 10, 2);



/************************************
 Add Menu "Mis Equipos" Start
 ***********************************/



 $categories = get_categories( array(
 	'orderby' => 'name',
 	'order'   => 'ASC',
 	'show_count'         => true,
 	'use_desc_for_title' => false,
 	) );

 $categories = get_categories(array(
 	'hide_empty'   => 0,
 	));

// First index all categories by parent id, for easy lookup later
 $cats_by_parent = array();
 foreach ($categories as $cat) {
 	$parent_id = $cat->category_parent;
 	if (!array_key_exists($parent_id, $cats_by_parent)) {
 		$cats_by_parent[$parent_id] = array();
 	}
 	$cats_by_parent[$parent_id][] = $cat;
 }



// Then build a hierarchical tree
 $cat_tree = array();
 function add_cats_to_bag(&$child_bag, &$children)
 {
 	global $cats_by_parent;
 	foreach ($children as $child_cat) {
 		$child_id = $child_cat->cat_ID;
 		if (array_key_exists($child_id, $cats_by_parent)) {
 			$child_cat->children = array();
 			add_cats_to_bag($child_cat->children, $cats_by_parent[$child_id]);
 		}
 		$child_bag[$child_id] = $child_cat;
 	}
 }
 add_cats_to_bag($cat_tree, $cats_by_parent[0]);

// With this real tree, this recursive function can check for the cats you need
 function has_children_with_posts(&$children)
 {
 	$has_child_with_posts = false;
 	foreach ($children as $child_cat) {
 		$has_grandchildren_with_posts = false;
 		if (isset($child_cat->children)) {
            // Here is our recursive call so we don't miss any subcats
 			if (has_children_with_posts($child_cat->children)) {
 				$has_grandchildren_with_posts = true;
 			}
 		}
 		if (0 < intval($child_cat->category_count)) {
 			$has_child_with_posts = true;
 		} else if ($has_grandchildren_with_posts) {
            // This is a category that has no posts, but does have children that do
 			$child_cat->is_empty_with_children = true;

 		}
 	}
 	return $has_child_with_posts;
 }
 has_children_with_posts($cat_tree);




 $cat_tree = json_decode(json_encode($cat_tree), true);
function get_user_meta_category_favorites(){
	$user = wp_get_current_user();
 	$user_cat_com = 'marcador_constributor_id_'.$user->ID;
 	return $user_cat_com;
}




/* CUSTOM PAGINATION */

function get_custom_pagination($num, $current_page){
?>
<!-- Pagination -->
          <div class="pagination-favoritos">
            <?php
          $big = 99999; //Limite de paginación
         	 echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $current_page),
            'total' => $num,
            'mid_size' => 5,
            'end_size' => 1,
            'prev_text' => __("« Anterior"),
            'next_text' => __("Siguiente »")
            ));
          
            ?>
          </div>
          <!-- end Pagination -->
<?php
}

//* Redirect WordPress Logout to Home Page
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));

function wps_logout_redirect($logouturl, $redir)
    {
        return $logouturl . '&amp;redirect_to='.get_site_url();
    }
add_filter('logout_url', 'wps_logout_redirect', 10, 2);

 ?>