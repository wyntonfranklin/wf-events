<div class="wrap">
	<h1 class="wp-heading-inline">Attendees</h1>
	<a class="page-title-action" href="<?php echo WfHtml::getPageUrl('wf-create-attendee');?>">Add New</a>
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed">
		<thead>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Position</td>
			<td>Actions</td>
		</tr>
		</thead>
		<?php foreach( $persons as $person):?>
			<tr>
				<td><?php echo $person['first_name'];?></td>
				<td><?php echo $person['last_name']?></td>
				<td><?php echo $person['position']?></td>
				<td>
					<a href="<?php echo WfHtml::adminUrl('wf-view-attendee',array('id'=>$person['attendee_id']));?>">View</a> |
					<a>Edit</a> |
					<a>Delete</a>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>