<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 7:54 PM
 */

require_once __DIR__ . '/helpers/WfHtml.php';
require_once __DIR__ . '/helpers/WfModel.php';
require_once __DIR__ . '/helpers/WfWidget.php';
require_once __DIR__ . '/includes/WfMenuWidget.php';
require_once __DIR__.'/includes/widgets.php';


add_action( 'init', 'redirect_non_logged_users_to_specific_page' );

function redirect_non_logged_users_to_specific_page() {

	if ( ! is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {

		auth_redirect();
	}
}

function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if (isset($user->roles) && is_array($user->roles)) {
		//check for subscribers
		if (in_array('subscriber', $user->roles)) {
			// redirect them to another URL, in this case, the homepage
			$redirect_to =  home_url();
		}
	}

	return $redirect_to;
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


function wf_events_declare_ajax_url(){
	WfHtml::render('ajax_url');
}

add_action('wp_head','wf_events_declare_ajax_url');

function load_scripts(){
	//Load scripts:
	wp_enqueue_script('jquery'); # Loading the WordPress bundled jQuery version.
	//may add more scripts to load like jquery-ui
}

add_action('wp_enqueue_scripts', 'load_scripts');

add_action( 'after_setup_theme', 'wf_events_theme_setup' );

function wf_events_theme_setup() {
	add_theme_support( 'post-thumbnails');
}


function wf_events_create_tabs_post_type(){
	register_post_type( 'wf_events_tabs',
		array(
			'labels' => array(
				'name' => __( 'Tabs' ),
				'singular_name' => __( 'Tabs' ),
				'add_new' => __( ' Add New' ),
				'add_new_item' => __( 'Add New Tabs' ),
				'edit' => 'Edit',
				'edit_item' => 'Edit Tabs',
				'view' => 'View',
				'view_item' => 'View Tabs',
			),
			'rewrite' => array('slug' => 'wf-tabs'),
			'public' => true,
			'has_archive' => true,
			'supports' => array( 'title','editor','comments','thumbnail', 'excerpt' ),
			'menu_icon'   => 'dashicons-category',
		)
	);
}

//add_action( 'init', 'wf_events_create_tabs_post_type' );

function wf_events_register_menus(){
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'tabs-menu' => __( 'Tabs Menu' ),
			'side-menu' => __('Side Menu'),
		)
	);
}

add_action('init','wf_events_register_menus');


function wf_bootstrap_tabs_menu( $menu_name='sample'){

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<ul id="bootmenu-' . $menu_name . '" class="nav nav-tabs">';
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			if( is_page($title) ){
				$menu_list .= '<li  class="nav-item" ><a class="nav-link active" href="' . $url . '">' . $title . '</a></li>';
			}else{

				$menu_list .= '<li  class="nav-item" ><a class="nav-link" href="' . $url . '">' . $title . '</a></li>';
			}
		}
		$menu_list .= '</ul>';
	} else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
	}
	echo $menu_list;
}

function wf_bootstrap_top_menu( $menu_name='sample' ){
	$menu_list = '<ul id="bootmenu-top-' . $menu_name . '" class="navbar-nav ml-auto">';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		if( !empty($menu)){
			$menu_items = wp_get_nav_menu_items($menu->term_id);


			foreach ( (array) $menu_items as $key => $menu_item ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				if( is_page($title) ){
					$menu_list .= '<li  class="nav-item active" ><a class="nav-link" href="' . $url . '">' . $title . '</a></li>';
				}else{

					$menu_list .= '<li  class="nav-item" ><a class="nav-link" href="' . $url . '">' . $title . '</a></li>';
				}
			}
		}
	} else {
		$menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
	}
	$menu_list .='<li class="nav-item"><a class="nav-link" href="'.wp_logout_url().'">Logout</a></li>';
	$menu_list .= '</ul>';
	echo $menu_list;
}

function wf_bootstrap_side_menu( $menu_name='side-menu' ){

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_list = '';
		if( !empty($menu)){
			$menu_items = wp_get_nav_menu_items($menu->term_id);

			$menu_list = '<ul id="bootmenu-top-' . $menu_name . '" class="list-group">';
			foreach ( (array) $menu_items as $key => $menu_item ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				if( is_page($title) ){
					$menu_list .= '<li  class="list-group-item" ><a class="" href="' . $url . '">' . $title . '</a></li>';
				}else{

					$menu_list .= '<li  class="list-group-item" ><a class="" href="' . $url . '">' . $title . '</a></li>';
				}
			}
			$menu_list .= '</ul>';
		}
	} else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
	}
	echo $menu_list;
}

function wf_events_layout_shortcode( $atts = [], $content = null, $tag = '' ){
	$a = shortcode_atts( array(
		'name' => 'dashboard',
	), $atts );
	WfHtml::renderLayout($a['name']);
}

add_shortcode( 'wf-layout','wf_events_layout_shortcode');

add_action('wp_ajax_wf_events_update_user_profile','wf_events_update_user_profile');
add_action('wp_ajax_nopriv_wf_events_update_user_profile','wf_events_update_user_profile');

function wf_events_update_user_profile(){
	parse_str($_POST['form'], $get_array);
	$id = 	(int)$get_array['user_id'];
	$first_name = 	$get_array['first_name'];
	$user_id = wp_update_user( array( 'ID' => $id, 'first_name' => $first_name ) );

	if ( is_wp_error( $user_id ) ) {
		// There was an error, probably that user doesn't exist.
	} else {
		// Success!
		echo $user_id;
	}
	exit();

}

function current_user_profile_name(){
	$cu = wp_get_current_user();
	return $cu->first_name . ' ' . $cu->last_name;
}