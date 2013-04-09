<?php

/**
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 * ---------------------------------------------------- 
 * 22.03.2013 
 * File: index.php 
 * Encoding: UTF-8 
 * Project: tabero 
 * 
 * Author: Daniel Gilbert :: d.gilbert@tabero.de
 * 
 * */
$this->GetHeader();
?>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="brand" href="#"><?php echo $this->GetTitle(); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="">Was ist das?</a></li>
              <li><a href="">Blog</a></li>
              <li><a href="">Impressum</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="row-fluid">
          <div class="span3 well">
                <h5><?php echo $this->geobin->getTitle(); ?></h5>
                <p><?php echo $this->geobin->getDescription(); ?></p>
                <h5>Ablauf am:</h5>
                <p><?php echo $this->getExpireDate(); ?></p>
          </div>
          <div class="span9">
              <div id="map"></div>
          </div>
      </div>
    </div> <!-- /container -->
    <input name="geobin_urihash" id="geobin_urihash" type="hidden" value="<?php echo $this->hash->getUriHash(); ?>" />
    <input name="geobin_jsonuri" id="geobin_jsonuri" type="hidden" value="http://geobin.dev/<?php echo $this->hash->getUriHash(); ?>/json" />
<?php $this->GetFooter(); ?>