<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/13/2018
 * Time: 6:05 AM
 */

abstract class WfWidget extends WP_Widget {

	function __construct( $id_base, $name, array $widget_options = array(), array $control_options = array() ) {
		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	function form( $instance ) {
		return parent::form( $instance ); // TODO: Change the autogenerated stub
	}

	function update( $new_instance, $old_instance ) {
		return parent::update( $new_instance, $old_instance ); // TODO: Change the autogenerated stub
	}

	function widget( $args, $instance ) {
		parent::widget( $args, $instance ); // TODO: Change the autogenerated stub
	}

	static function add_widget( $widget_name ){

	}



}