<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Article List</title>
	<!-- <link rel="stylesheet" type="text/css" href="http://localhost/CI_Demo/assets/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/bootstrap.min.css")?>"> -->
	<?= link_tag("assets/css/bootstrap.min.css")?>
		<?= link_tag("assets/css/style.css")?>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Admin Panel</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <!-- <div class="collapse navbar-collapse" id="navbarColor01"> -->
	      <!-- <ul class="navbar-nav me-auto">
	        <li class="nav-item">
	          <a class="nav-link active" href="#">Login
	            <span class="visually-hidden">(current)</span>
	          </a>
	        </li> 
	        <li class="nav-item">
	          <a class="nav-link" href="#">Features</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Pricing</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">About</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
	          <div class="dropdown-menu">
	            <a class="dropdown-item" href="#">Action</a>
	            <a class="dropdown-item" href="#">Another action</a>
	            <a class="dropdown-item" href="#">Something else here</a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="#">Separated link</a>
	          </div>
	        </li> 
	      </ul> -->
	      <!-- <form class="d-flex">
	        <input class="form-control me-sm-2" type="search" placeholder="Search">
	        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	      </form>
	    </div> -->
	    <?php
	    	if($this->session->userdata('id'))
	    	{
	    		?>
	    		<a href="<?= base_url('admin/logout');?>" class="btn btn-danger">Logout</a>
	    		<?php
	    	}
	    ?>
	  </div>
</nav>