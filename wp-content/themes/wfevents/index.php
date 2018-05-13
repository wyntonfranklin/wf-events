<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 7:30 PM
 */
?>

<?php get_header();?>

	<div class="row">

		<!-- Blog Entries Column -->
		<?php get_template_part( 'content', 'page' ); ?>

		<?php get_sidebar();?>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer();?>

<!-- Bootstrap core JavaScript -->
<script src="<?php bloginfo('template_directory');?>/js/bootstrap.bundle.min.js"></script>

</body>

</html>
