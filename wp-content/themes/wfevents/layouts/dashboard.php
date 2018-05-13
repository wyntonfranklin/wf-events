<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 10:08 PM
 */

$events = new WfModel('wp_events');
$events->limit = 7;
$events = $events->search();
?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">Hi, <?php echo current_user_profile_name();?></h1>
		<p class="lead">This is your events dashboard. New Events and notifications will show up here.</p>
	</div>
</div>


<div class="card">
	<h5 class="card-header">New Events</h5>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Event Name</th>
				<th scope="col">Date</th>
				<th scope="col">Time</th>
			</tr>
			</thead>
			<tbody>
            <?php foreach($events['data'] as $event):?>
			<tr>
				<th scope="row"><?php echo $event['event_id'];?></th>
				<td><a href="<?php echo add_query_arg( 'id', $event['event_id'],'view-event' );?>">
                        <?php echo $event['event_title'];?></a></td>
				<td><?php echo $event['start_date'];?> - <?php echo $event['end_date'];?></td>
				<td><?php echo $event['start_time'];?> - <?php echo $event['end_time'];?></td>
			</tr>
            <?php endforeach;?>
            </tbody>
		</table>
	</div>

</div>

<div class="" style="margin-top: 10px;">
</div>
