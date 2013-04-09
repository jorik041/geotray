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
                <form action="<?php echo $this->GetPostURI(); ?>" method="POST" onsubmit="setMapSettings();">
                    <label>Name</label>
                    <input name="geobin_title" class="span12" placeholder="Name eingeben..." type="text" />
                    <label>Beschreibung</label>
                    <textarea name="geobin_description" rows="4" class="span12" placeholder="Beschreibung eingeben..." ></textarea>
                    <label>Ablauf am:</label>
                    <select name="geobin_expire" class="span12">
                        <option value="100Y">Niemals</option>
                        <option value="1D">1 Tag</option>
                        <option value="1M">1 Monat</option>
                    </select>
                    <input name="geobin_markers" id="geobin_markers" type="hidden" />
                    <input name="geobin_zoomlevel" id="geobin_zoomlevel" type="hidden" />
                    <input name="geobin_center" id="geobin_center" type="hidden" />
                    <button class="btn btn-medium btn-primary pull-right" type="submit">Speichern</button>
                </form> 
          </div>
          <div class="span9">
              <div id="map"></div>
          </div>
      </div>
    </div> <!-- /container -->
<?php $this->GetFooter(); ?>