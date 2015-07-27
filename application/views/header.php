<?php 
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="product" content="Metro UI CSS Framework">
    <meta name="description" content="Simple responsive css framework">
    <meta name="author" content="Sergey S. Pimenov, Ukraine, Kiev">

    <link href="<?php echo base_url();?>assets/css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="<?php echo base_url();?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery/jquery.widget.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url();?>assets/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="<?php echo base_url();?>assets/js/metro.min.js"></script>

    <!-- Local JavaScript -->
    <script src="<?php echo base_url();?>assets/js/docs.js"></script>
    <title>SourceCamp | Create, Find, Publish and Share your application</title>
</head>
    <body class="metro">
        <header class="bg-dark"><?php include "menu.php";?></header>
        <div class="container">
            <?php 
            if($this->session->userdata('status')!=""){
                include "topthumb.php";
            }
            ?>