<h1>Hello</h1>
<?php foreach($posts as $key=>$post):?>
	<p><?php echo $post->post_title;?></p>
<?php endforeach;?>
<?php echo WfHtml::text_input();?>
