<?php //WfHtml::registerStyle('attendees',plugins_url('css/theme.css',__DIR__),'1.1'); ?>
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
                <td>Attendee Id</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Position</td>
                <td>Actions</td>
            </tr>
            </thead>
		    <?php foreach( $persons['data'] as $person):?>
                <tr>
                    <td><?php echo $person['attendee_id'];?></td>
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
        <br>
        <div class="tablenav-pages">
            <span class="displaying-num"><?php echo $persons['total'];?> items</span>
            <span class="pagination-links">
                <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
                <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
                <span class="screen-reader-text">Current Page</span>
                <span id="table-paging" class="paging-input">
                    <span class="tablenav-paging-text">1 of <span class="total-pages">
                            <?php echo ceil($persons['total']/$persons['limit']);?></span>
                    </span>
                </span>
                <a class="next-page" href="https://exporttwp.xhuma.co/wp-admin/edit.php?post_type=page&amp;paged=2">
                    <span class="screen-reader-text">Next page</span>
                    <span aria-hidden="true">›</span>
                </a>
                <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
            </span>
        </div>
        <br>
        <?php echo WfPager::pagination_links($persons);?>
        <?php echo add_query_arg(array('paged'=>''));?>
    </div>
</div>