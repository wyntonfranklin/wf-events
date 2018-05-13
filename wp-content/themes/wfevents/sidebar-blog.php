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

	<div class="card my-4" style="">
		<h5 class="card-header">Newest Posts
			<a class="btn-primary btn-sm float-right" href="<?php echo get_site_url(null,'posts');?>"> View All</a>
		</h5>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="#">Cras justo odio</a></li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
	</div>

	<div class="card my-4" style="">
		<h5 class="card-header">Side Menu</h5>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="#">Cras justo odio</a></li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
	</div>

	<!-- Search Widget -->
	<div class="card my-4">
		<h5 class="card-header">Search</h5>
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
			</div>
		</div>
	</div>

	<!-- Categories Widget -->
	<div class="card my-4">
		<h5 class="card-header">Categories</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">Web Design</a>
						</li>
						<li>
							<a href="#">HTML</a>
						</li>
						<li>
							<a href="#">Freebies</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">JavaScript</a>
						</li>
						<li>
							<a href="#">CSS</a>
						</li>
						<li>
							<a href="#">Tutorials</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Side Widget -->
	<div class="card my-4">
		<h5 class="card-header">Side Widget</h5>
		<div class="card-body">
			You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
		</div>
	</div>

</div>


