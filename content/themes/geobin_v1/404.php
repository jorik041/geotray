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
          <div class="span12">
              <div class="page-header">
                <h1>Damn.. <small>404</small></h1>
              </div>
              <img src="<?php echo $this->GetThemeURI().'img/geotray_404.png'?>" alt="Oh no... It's a 404." />
              <div class="lead">
                  <p>It seems, as if the page you are looking for has moved.</p>
                  <p>It is however possible, that you called an entry that has expired.</p>
              </div>
          </div>
      </div>
    </div> <!-- /container -->
<?php $this->GetFooter(); ?>