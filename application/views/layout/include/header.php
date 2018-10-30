<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	


	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/icon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $header?> </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />

    
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>
<style>
	body{
		background: url('<?php echo base_url('assets/img/background.jpg'); ?>');
		
	}
	</style>


	</head>
<body>
	<?php
	$list='';
	$add='';
	if($active=='list')
	$list='active';
	
	if($active=='Add')
	$add='active';
	?>
	
	
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Vectra</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo $list ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>">List Of Albums <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php echo $add ?>">
            <a class="nav-link" href="<?php echo base_url('albums/AddAlbum'); ?>">Add Album</a>
          </li>
        

        </ul>

      </div>
    </nav>


            <div class="container-fluid">