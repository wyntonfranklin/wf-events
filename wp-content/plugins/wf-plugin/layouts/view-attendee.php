<?php WfHtml::registerStyle('attendees',plugins_url('css/theme.css',__DIR__),'1.1'); ?>
<div class="wrap">
	<div class="module message">
		<div class="module-head">
			<h3>Attendee View</h3>
		</div>
		<div class="module-body table graph">
			<a class="btn btn-primary">Button</a>
			<table class="table table-message">
				<tr>
					<td>First Name</td>
					<td><?php echo $model['first_name'];?></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><?php echo $model['first_name'];?></td>
				</tr>
			</table>
		</div>
	</div>

</div>