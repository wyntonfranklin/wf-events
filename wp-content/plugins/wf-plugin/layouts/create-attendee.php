<div class="wrap">
	<h1>Create Attendee</h1>
	<?php WfHtml::beginForm('post',add_query_arg(array('id'=>$model['attendee_id'])));?>

	<?php WfHtml::beginFormTable();?>
	<tr>
		<th><label>First Name</label></th>
		<td><?php echo WfHtml::text_input('first_name',$model['first_name']);?></td>
	</tr>

	<tr>
		<th><label>Last Name</label></th>
		<td><?php echo WfHtml::text_input('last_name',$model['last_name']);?></td>
	</tr>

	<tr>
		<th><label>Position</label></th>
		<td><?php echo WfHtml::text_input('position',$model['position']);?></td>
	</tr>

	<?php WfHtml::endFromTable();?>

	<?php echo WfHtml::submitButton();?>

	<?php WfHtml::endForm();?>

</div>
<script>
	jQuery(document).ready(function( $ ){
	    console.log('working');
	});
</script>