<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urban Graffiti</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <script type="text/javascript" src="<?php echo base_url("system/libraries/Javascript/jquery-2.2.1.min.js"); ?>"></script>
    <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>
    <style>
        a {
            color: #0094db;
            text-decoration: none;
        }
        .gap-right {
            margin-right: 15px; 
        }

        .gap-right-md {
            margin-right: 40px;
        }
        
        .gap-left {
            margin-left: 15px; 
        }
        
        .gap-top {
            margin-top: 15px;
        }
        
        .top-buffer { 
            margin-top: 7px; 
        }

        body {
            padding-top: 60px;
        }
        nav {
            .navbar-brand {font-size: 30px;}
            .navbar-toggle {margin: 13px 15px 13px 0;}
            img {
                width: 50px !important;
		font-size: 18px;
		padding-bottom: 20px !important;
		padding-top: 20px !important;
                transition: all 0.3s ease;
            }
        }

        nav.navbar.shrink {
            min-height: 35px;
            .navbar-brand {font-size: 25px;}
            img {
                width: 50px !important;
                font-size: 15px;
                padding-bottom: 10px !important;
                padding-top: 10px !important;
            }
            .navbar-toggle {
                margin: 8px 15px 8px 0;
                padding: 4px 5px;
            }
        }
    </style>
    <script>
        function resizeLogic() {
            if ($(window).width() < 768) {
                $('#links').removeClass('pull-right');
                $('#links').addClass('pull-left');
            } else {
                $('#links').removeClass('pull-left');
                $('#links').addClass('pull-right');
            };
        }
        
        $(window).resize(resizeLogic); // on window resize

        $(document).ready(function() {
            resizeLogic();
        });
    </script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #1f1a17">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="<?php echo base_url("application/views/images/UrbanGraffLogo.jpg"); ?>" alt="Urban Graffiti" width="320" height="115" class="img-responsive" />
    </div>
    <div class="collapse navbar-collapse">
        <ul id="links" class="nav navbar-nav pull-right">
            <li <?=$tabs['tab_index'];?>>
                <a href="<?php echo site_url('Welcome/index') ?>" aria-controls="home" data-toggle="collapse" data-target=".navbar-collapse.in">Home</a>
            </li>
            <li <?=$tabs['tab_about'];?>>
                <a href="<?php echo site_url('Welcome/about') ?>" aria-controls="profile" data-toggle="collapse" data-target=".navbar-collapse.in">About Us</a>
            </li>
            <li <?=$tabs['tab_product'];?>>
                <a href="<?php echo site_url('Welcome/products') ?>" aria-controls="messages" data-toggle="collapse" data-target=".navbar-collapse.in">Products</a>
            </li>
            <li <?=$tabs['tab_contact'];?>>
                <a href="<?php echo site_url('Welcome/contact') ?>" aria-controls="settings" data-toggle="collapse" data-target=".navbar-collapse.in">Request A Quote</a>
            </li>
        </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
