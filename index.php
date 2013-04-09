<?php

/**
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 * ---------------------------------------------------- 
 * 01.04.2013 
 * File: index.php 
 * Encoding: UTF-8 
 * Project: geobin 
 * 
 * Author: Daniel Gilbert :: d.gilbert@tabero.de
 * 
 * */

//Set the ABSPATH as the root of this file
define('ABSPATH', dirname(__FILE__) . '/' );

//All important folders under includes
define('GEOBIN_INCLUDE', ABSPATH.'includes/');
define('GEOBIN_CLASSES', GEOBIN_INCLUDE.'classes/');

//All important folders under content
define('GEOBIN_CONTENT', ABSPATH.'content/');
define('GEOBIN_THEMES', GEOBIN_CONTENT.'themes/');

//All important folders under admin
define('GEOBIN_ADMIN', ABSPATH.'admin/');

//Include the bootstrapper
require(GEOBIN_INCLUDE."bootstrapper.php");

//Starts the main engine
geobin();
?>
