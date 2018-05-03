<?php
/*
Plugin Name: WF Plugins
Plugin URI: http://www.ict.co.tt
Description: An events plugin with my spin
Author: Wynton Franklin
Version: 0.0.1
Author URI: http://www.ict.co.tt
*/


if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once __DIR__ . '/cmb2/init.php';

require_once __DIR__ . '/helpers/WfHtml.php';

define('WF_EVENTS_PREFIX','_wf_events_');


register_activation_hook(__FILE__,'wf_events_set_default_options');

function wf_events_set_default_options(){
	if( get_option('wf_events_options') === false ){
		$new_options['event_name'] = 'Wynton Events';
		$new_options['event_location'] = 'Trinidad';
		add_option('wf_events_options', $new_options);
	}
}

add_action( 'init', 'wf_events_create_event_post_type' );

function wf_events_create_event_post_type(){
	register_post_type( 'wf_events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Events' ),
                'add_new' => __( ' Add New' ),
                'add_new_item' => __( 'Add New Event' ),
                'edit' => 'Edit',
				'edit_item' => 'Edit Event',
				'view' => 'View',
				'view_item' => 'View Event',
			),
			'rewrite' => array('slug' => 'wf-events'),
			'public' => true,
			'has_archive' => true,
            'supports' => array( 'title','editor','comments','thumbnail', 'excerpt' ),
			'menu_icon'   => 'dashicons-calendar-alt',
		)
	);
}


//add_action( 'admin_init', 'wf_events_create_meta_date_box' );

function wf_events_create_meta_date_box(){
    add_meta_box( 'wf_events_details_date_meta_box','Events Date', 'wf_events_view_cb_date_box',
        'wf_events','normal','high');
}

function wf_events_view_cb_date_box(){
    echo '
    <table>
        <tr>
            <td>Hello</td>
        </tr>
    </table>
    ';
}


add_action( 'cmb2_admin_init','wf_events_create_meta_boxes_cmb' );


function wf_events_create_meta_boxes_cmb(){
	$prefix = WF_EVENTS_PREFIX;

	$wf_event_details = new_cmb2_box( array(
		'id'=> 'wf_events_extra_details',
		'title'=> __( 'Event Details', 'cmb2' ),
		'object_types'=> array( 'wf_events', ), // Post type
		'context'=> 'normal',
		'priority'=> 'high',
		'show_names'=> true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$wf_event_details->add_field( array(
		'name'=> __( 'Cost', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'=> $prefix . 'cost',
		'type' => 'text_money',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$wf_event_details->add_field( array(
		'name'=> __( 'Tags', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'=> $prefix . 'tags',
		'type' => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$wf_event_details->add_field( array(
		'name'    => 'Event Documents',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => 'wf_events_document',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			'type' => 'application/pdf', // Make library only display PDFs.
		),
	) );

	$cmb = new_cmb2_box( array(
		'id'=> 'wf_events_date_time',
		'title'=> __( 'Date &amp; Time', 'cmb2' ),
		'object_types'=> array( 'wf_events', ), // Post type
		'context'=> 'normal',
		'priority'=> 'high',
		'show_names'=> true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );


	$cmb->add_field( array(
		'name'=> __( 'Start Date', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'=> $prefix . 'start_date',
		'type' => 'text_date',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb->add_field( array(
		'name'=> __( 'End Date', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'=> $prefix . 'end_date',
		'type' => 'text_date',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb->add_field( array(
		'name'=> __( 'Start time', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'=> $prefix . 'start_time',
		'type' => 'text_time',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb->add_field( array(
		'name' => __( 'Start time', 'cmb2' ),
		'desc'=> __( 'field description (optional)', 'cmb2' ),
		'id' => $prefix . 'start_time',
		'type' => 'text_time',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$cmb->add_field( array(
		'name' => __( 'End time', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'end_time',
		'type' => 'text_time',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$mb_box_location = new_cmb2_box( array(
		'id'=> 'wf_events_location_details',
		'title'=> __( 'Event Location', 'cmb2' ),
		'object_types'=> array( 'wf_events', ), // Post type
		'context'=> 'normal',
		'priority'=> 'high',
		'show_names'=> true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$mb_box_location->add_field( array(
		'name' => __( 'Location', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'location',
		'type' => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$mb_box_location->add_field( array(
		'name' => __( 'Capacity', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'capacity',
		'type' => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$mb_box_contact_person = new_cmb2_box( array(
		'id'=> 'wf_events_contact_details',
		'title'=> __( 'Contact Details', 'cmb2' ),
		'object_types'=> array( 'wf_events', ), // Post type
		'context'=> 'normal',
		'priority'=> 'high',
		'show_names'=> true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$mb_box_contact_person->add_field( array(
		'name' => __( 'Contact Name', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'contact_name',
		'type' => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$mb_box_contact_person->add_field( array(
		'name' => __( 'Email', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	$mb_box_contact_person->add_field( array(
		'name' => __( 'Phone Number', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'phone_number',
		'type' => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

}

function add_wf_events_columns($columns) {
	//unset($columns['_wf_events_start_date']);
	return array_merge($columns,
		array(
			'event_image' => __('Image'),
			'_wf_events_start_date' => __('Start Date'),
		      '_wf_events_end_date' =>__( 'End Date'),
			'_wf_events_start_time' => __('Start Time')
		)
	);
}

add_filter('manage_wf_events_posts_columns' , 'add_wf_events_columns');


add_action( 'manage_wf_events_posts_custom_column' , 'wf_events_custom_columns', 10, 2 );

function wf_events_custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case '_wf_events_start_date':
			$event_date = esc_html(
				get_post_meta($post_id,'_wf_events_start_date',true)
			);
			echo $event_date;
			break;
		case '_wf_events_end_date':
			$end_date = esc_html(
				get_post_meta( $post_id, '_wf_events_end_date',true)
			);
			echo $end_date;
			break;
		case '_wf_events_start_time':
			$st_time = esc_html(
				get_post_meta($post_id,'_wf_events_start_time',true)
			);
			echo $st_time;
			break;
		case 'event_image':
			echo get_the_post_thumbnail($post_id,'thumbnail');
			break;

	}
}


add_shortcode( 'wf-events-listing','wf_events_listing');

function wf_events_listing($atts = [], $content = null, $tag = ''){
	$o = '';
	$query_params = array(
		'post_type' => 'wf_events',
		'post_status' => 'publish',
		'post_per_page' => 5
	);
	$all_events = new WP_Query();
	$all_events->query($query_params);
	if( $all_events->have_posts() ){
		while( $all_events->have_posts()){
			$all_events->the_post();
			$o .= get_the_title(get_the_ID());
		}
	}
	return $o;
}


function wf_events_dashboard_widget( $post, $params ){
	$query_params = array(
		'post_type' => 'wf_events',
		'post_status' => 'publish',
		'post_per_page' => 1
	);
	$all_events = new WP_Query();
	$all_events->query($query_params);
	WfHtml::render('list-style',[
		'posts' => $all_events->posts
	]);
}

function wf_events_add_dashboard_widgets(){
	wp_add_dashboard_widget('wf_events_db_widget','Recent Events','wf_events_dashboard_widget');
}

add_action('wp_dashboard_setup','wf_events_add_dashboard_widgets');

add_action( 'admin_menu', 'wf_events_settings_menu');

function wf_events_settings_menu(){
	add_options_page('Events Options','Events','manage_options','events','wf_events_config_page');
}

function wf_events_config_page(){
	$options = get_option('wf_events_options');
	WfHtml::render('wf-settings',['options'=>$options]);
}

add_action( 'admin_init', 'wf_events_admin_init');

function wf_events_admin_init(){
	add_action('admin_post_save_wf_events_options','process_wf_events_options');
}

function process_wf_events_options(){
	if( !current_user_can('manage_options'))
		wp_die('Not Allowed');

	$options = get_option('wf_events_options');

	foreach( array('event_name') as $option_name){
		if(isset($_POST[$option_name])){
			$options[$option_name] = sanitize_text_field($_POST[$option_name]);
		}
	}

	update_option('wf_events_options',$options);
	WfHtml::adminPageRedirect('page','events','options-general.php');
	exit;
}

add_action('admin_menu','wf_events_admin_menu');

function wf_events_admin_menu(){
	add_menu_page('WF Events Plugin Configuration Page','My Events Plugin',
		'manage_options','wf-events-main-menu','wf_events_config_menu',
		'dashicons-calendar-alt');

	add_submenu_page('wf-events-main-menu','WF Events Sub','Events Config',
		'manage_options','wf-events-sub-menu','wf_events_config_sub_menu');

	add_submenu_page('wf-events-main-menu','Second Sub','Settings',
		'manage_options','wf-events-sub-settings','wf_events_config_sub_settings');
}

function wf_events_config_menu(){
	global $wpdb;
	$sql = 'SELECT * from wf_countries';
	$countries = $wpdb->get_results($sql,ARRAY_A);
	WfHtml::renderLayout('events-menu-page',['countries'=>$countries]);
}

function wf_events_config_sub_menu(){
	$id = $_GET['id'];
	echo $id;

}

function wf_events_config_sub_settings(){

}

add_shortcode('register-for-event','wf_events_registration');

function wf_events_registration(){
	wf_events_registration_data();
	echo WfHtml::renderLayout('events-registration',array(),false);
}

function wf_events_registration_data(){
	if(isset($_POST['event_name'])){
		$new_event_data = array(
			'post_status' => 'publish',
			'post_title' => $_POST['event_name'],
			'post_type' => 'wf_events',
			'post_content' => $_POST['description']
		);
		$new_event_id = wp_insert_post($new_event_data);
		add_post_meta($new_event_id,'_wf_events_start_date',$_POST['start_date']);
		//wp_redirect(add_query_arg('message','1', WfHtml::redirectAddress()));
		//exit;
		echo WfHtml::frontMessage();
	}
}
