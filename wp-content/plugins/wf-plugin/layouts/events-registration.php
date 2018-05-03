<div class="">
	<?php WfHtml::beginForm('post','','event-post');?>
	<?php if(isset($_GET['message']) && $_GET['message'] == '1'):?>
         <?php echo WfHtml::formMessage('Post successful');?>
    <?php endif;?>
	<table class="form-table">
		<tbody>
		<tr>
			<th><label>Event Title</label></th>
			<td><?php echo WfHtml::text_input('event_name', '');?></td>
		</tr>
		<tr>
			<th><label>Description</label></th>
			<td><?php echo WfHtml::text_input('description', '');?></td>
		</tr>
        <tr>
            <th><label>Start Date</label></th>
            <td><?php echo WfHtml::text_input('start_date', '');?></td>
        </tr>
		</tbody>

	</table>
	<?php echo WfHtml::submitButton();?>

	<?php WfHtml::endForm();?>
</div>