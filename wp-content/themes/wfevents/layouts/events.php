<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/13/2018
 * Time: 1:30 AM
 */
$events = new WfModel('wp_events');
$events->limit = 10;
$events = $events->search();
?>

<?php foreach( $events['data'] as $event):?>

<div class="media mb-4">
	<img class="img-thumbnail" style="width: 100px; margin-right: 5px;" src="<?php echo $event['event_logo_file_name'];?>" alt="image">
	<div class="media-body">
		<h5 class="mt-0">
            <a href="<?php echo add_query_arg( 'id', $event['event_id'],'view-event' );?>" >
                <?php echo $event['event_title'];?></a>
        </h5>
        <div class="">
            <p>Time : 400 - 12 pm</p>
            <p>Date: Thrusday 2124 March, 2018</p>
        </div>
        <div>
            <?php echo $event['description'];?>
        </div>
		<div style="margin-top: 5px;">

		</div>
	</div>
</div>

<hr>

<?php endforeach;?>
<nav aria-label="Page navigation example" class="align-content-center">
<?php
    $currentPage = isset($_GET['pg']) ? ((int) $_GET['pg']) : 1;
    $page = new Pagination($currentPage, $events['total']);
    echo $page->parse();
?>
</nav>
<div class="pagination justify-content-center mb-4">
    <nav aria-label="Page navigation example" class="align-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>


