<?php

/**
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 * ---------------------------------------------------- 
 * 01.04.2013 
 * File: bootstrapper.php 
 * Encoding: UTF-8 
 * Project: geobin 
 * 
 * Author: Daniel Gilbert :: d.gilbert@tabero.de
 * 
 * */
//Loads the configuration file
require_once GEOBIN_INCLUDE.'functions.php';
require_once GEOBIN_CLASSES.'class.theme.php';

// Include the main Propel script
require_once GEOBIN_INCLUDE.'propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init(GEOBIN_INCLUDE."conf/geobin-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path(GEOBIN_CLASSES . PATH_SEPARATOR . get_include_path());

//Main function for this portal.
function geobin()
{
    global $theme;
    $theme = new Theme();
    setlocale(LC_TIME, "de_DE");
    $theme->LoadTheme();
}
?>
