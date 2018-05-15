<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/13/2018
 * Time: 11:18 AM
 */

// do calcuations here

if( isset($_GET['id'])){
    $event = new WfModel('wp_events');
    $event = $event->findByPk('event_id', $_GET['id']);
}


?>

<h2 class="mb-4"><?php echo $event['event_title'];?></h2>
<div class="card mb-4">
    <div class="card-header">
        Event Details
    </div>
    <div class="card-body">
        <div class="float-left" style="width: 100px; margin-right: 10px;">
            <img src="<?php echo $event['event_logo_file_name'];?>" class="img-thumbnail">
        </div>
        <div class="float-left">
            <h5 class="card-title"><?php echo $event['event_title'];?></h5>
            <div class="card-text">
                <p>Date: <?php echo $event['start_date'];?></p>
                <p>Time: <?php echo $event['start_time'];?></p>
            </div>
            <div class="card-text mb-4">
		        <?php echo $event['description'];?>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Register for Event
            </button>
            <a href="#" class="btn btn-dark">Attendees</a>
        </div>
    </div>
</div>

<div class="card text-center mb-4">
    <div class="card-header">
        Location
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>