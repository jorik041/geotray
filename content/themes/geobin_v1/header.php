<?php
/**
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 * ---------------------------------------------------- 
 * 22.03.2013 
 * File: header.php 
 * Encoding: UTF-8 
 * Project: tabero 
 * 
 * Author: Daniel Gilbert :: d.gilbert@tabero.de
 * 
 * */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->GetTitle(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $this->GetThemeURI().'css/bootstrap.css'?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->GetThemeURI().'css/leaflet.css'?>" />
    <link href="<?php echo $this->GetThemeURI().'css/leaflet.draw.css'?>" rel="stylesheet">
    <link href="<?php echo $this->GetThemeURI().'css/L.Control.Locate.css'?>" rel="stylesheet">
 <!--[if lte IE 8]>
     <link rel="stylesheet" href="<?php echo $this->GetThemeURI().'css/leaflet.ie.css'?>" />
        <link href="<?php echo $this->GetThemeURI().'css/leaflet.draw.ie.css'?>" rel="stylesheet">
 <link href="<?php echo $this->GetThemeURI().'css/L.Control.Locate.ie.css'?>" rel="stylesheet">
 <![endif]-->
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #map{
          height: 500px;
      }
    </style>
    <link href="<?php echo $this->GetThemeURI().'css/bootstrap-responsive.css'?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="./ico/favicon.png">
  </head>
  <body>