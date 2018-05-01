<?php WfHtml::beginForm();?>

	<table class="form-table">
		<tbody>
		<tr>
			<th><label>Event Name</label></th>
			<td><?php echo WfHtml::text_input('event_name', esc_html($options['event_name']));?></td>
		</tr>
		<tr>
			<th><label>Event Location</label></th>
			<td><?php echo WfHtml::text_input('event_location', esc_html($options['event_location']));?></td>
		</tr>
		</tbody>

	</table>
    <?php echo WfHtml::submitButton();?>

<?php WfHtml::endForm();?>