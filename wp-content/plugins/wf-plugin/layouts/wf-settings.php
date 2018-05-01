<div class="wrap">
	<h1>Welcome To Events Settings Page</h1>
	<?php if(isset($_GET['message']) && $_GET['message'] == '1'):?>
		<div id="message" class="updated fade">
			<p><strong>Settings Saved</strong></p>
		</div>
	<?php endif;?>
	<?php echo WfHtml::render('form-table',array('options'=>$options),false);?>
</div>