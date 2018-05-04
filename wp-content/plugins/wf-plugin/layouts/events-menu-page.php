<div class="wrap">
	<h1>Show Stuff from database here</h1><br>
    <a href="<?php echo WfHtml::getPageUrl('wf-events-sub-menu');?>">Add New</a>
    <table class="wp-list-table widefat fixed">
        <thead>
            <tr>
                <td>Country Id</td>
                <td>Country Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <?php foreach( $countries as $country):?>
            <tr>
                <td><?php echo $country['country_id']?></td>
                <td><?php echo $country['country_name']?></td>
                <td>
                    <a href="<?php echo add_query_arg(array('page'=>'wf-events-sub-menu','id'=>$country['country_id']),
                        admin_url('admin.php'));?>">Edit</a> |
                    <a href="<?php echo add_query_arg(array('page'=>'wf-events-sub-settings','id'=>$country['country_id']),
		                admin_url('admin.php'));?>">View</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>