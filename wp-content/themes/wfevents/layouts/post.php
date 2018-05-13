<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 11:45 PM
 */?>

<?php
	global $post;
	$args = array( 'posts_per_page' => 5 );
	$myposts = get_posts( $args );?>
<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

<div class="card mb-4">
	<?php the_post_thumbnail('',array('class'=>'card-img-top'));?>
	<div class="card-body">
		<h2 class="card-title"><?php the_title(); ?></h2>
		<p class="card-text"><?php the_excerpt();?></p>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
	</div>
	<div class="card-footer text-muted">
		Posted on January 1, 2017 by
		<a href="#">Start Bootstrap</a>
	</div>
</div>
<?php endforeach; ?>
