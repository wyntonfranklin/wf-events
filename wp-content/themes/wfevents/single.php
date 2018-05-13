<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 7:30 PM
 */
?>

<?php /* Template Name: Single Page No Tabs */ ?>

<?php get_header('single');?>

<div class="row">

	<!-- Blog Entries Column -->
    <div class="col-md-8">
        <div class="wf-events-container">
			<?php  while ( have_posts() ) : the_post(); ?>
                <h2><?php the_title();?></h2>
				<?php the_content();?>
			<?php endwhile;?>
        </div>
    </div>

	<?php get_sidebar('blog');?>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer();?>

<!-- Bootstrap core JavaScript -->
<script src="<?php bloginfo('template_directory');?>/js/bootstrap.bundle.min.js"></script>

</body>

</html>
