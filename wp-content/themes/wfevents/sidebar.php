<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 8:54 PM
 */
?>

<!-- Sidebar Widgets Column -->

<div class="col-md-4">
	<?php dynamic_sidebar( 'Primary_Sidebar' ); ?>

    <?php if(is_super_admin() || is_admin()):?>
    <div class="card my-4">
        <h5 class="card-header">Admin Panel</h5>
        <div class="card-body">
            <p>Access your admin panel to create posts, add events and much more.</p>
            <a class="btn btn-primary" href="<?php echo admin_url();?>">Access Panel</a>
        </div>
    </div>
    <?php endif;?>

</div>




