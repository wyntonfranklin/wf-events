<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/12/2018
 * Time: 8:38 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Blog Home - Start Bootstrap Template</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?php bloginfo('template_directory');?>/css/blog-home.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">Start Bootstrap</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<?php wf_bootstrap_top_menu('header-menu');?>
		</div>
	</div>
</nav>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-12" style="background-position:center; height: 150px; background-image: url(<?php bloginfo('template_directory');?>/header_image.jpg);">

		</div>

	</div>

	<div class="row">

		<div class="col-md-8" style="margin-top: 30px;">
			<?php wf_bootstrap_tabs_menu('tabs-menu') ?>

		</div>

	</div>

