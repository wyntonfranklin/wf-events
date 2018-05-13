<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 10:12 PM
 */
?>

<div class="col-md-8">
	<div class="wf-events-container">
		<?php  while ( have_posts() ) : the_post(); ?>
			<?php the_content();?>
		<?php endwhile;?>
	</div>
</div>