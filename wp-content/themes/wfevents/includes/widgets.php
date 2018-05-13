<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/13/2018
 * Time: 5:57 AM
 */


function wf_events_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary_Sidebar', 'wf_events' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary_Sidebar', 'wf_events' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'wf_events_widgets_init' );

function wf_menu_box_widget() {
	register_widget( 'WfMenuWidget' );
}
add_action( 'widgets_init', 'wf_menu_box_widget' );