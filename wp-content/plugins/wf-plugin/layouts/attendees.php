<?php WfHtml::registerStyle('attendees',plugins_url('css/theme.css',__DIR__),'1.1'); ?>
<div class="wrap">
    <h1 class="wp-heading-inline">Attendees</h1>
    <a class="page-title-action" href="<?php echo WfHtml::adminUrl('wf-create-attendee',array());?>">Add New</a>
    <hr class="wp-header-end">

    <div class="module message">
        <div class="module-head">
            <h3>Attendees</h3>
        </div>
    <div class="module-body table">

        <table class="wp-list-table widefat fixed">
            <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Position</td>
                <td>Actions</td>
            </tr>
            </thead>
		    <?php foreach( $persons->getData() as $person):?>
                <tr>
                    <td><?php echo $person['first_name'];?></td>
                    <td><?php echo $person['last_name']?></td>
                    <td><?php echo $person['position']?></td>
                    <td>
                        <a href="<?php echo WfHtml::adminUrl('wf-view-attendee',array('id'=>$person['attendee_id']));?>">View</a> |
                        <a href="<?php echo WfHtml::adminUrl('wf-create-attendee',array('id'=>$person['attendee_id']));?>">Edit</a> |
                        <a>Delete</a>
                    </td>
                </tr>
		    <?php endforeach;?>
        </table>
    </div>
    </div>
</div>