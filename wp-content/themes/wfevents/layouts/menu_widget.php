<p>
	<label for="<?php echo $model->get_field_id( 'title' ); ?>">
		<?php _e( 'Title:', 'odin' ); ?>
		<input id="<?php echo $model->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $model->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</label>
</p>