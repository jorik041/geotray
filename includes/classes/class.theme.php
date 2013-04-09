<?php

/*
 * (C) Daniel Gilbert, 2013, tabero GbR.
 * 
 */

/**
 * Description of class
 *
 * @author Daniel
 */
class Theme
{
     public $name = '';
     public $geobin = null;
     public $hash = null;
     public function LoadTheme()
     {
         if (IsNullOrEmptyString($this->name))
         {
             $setting = SettingQuery::create()
                     ->filterByKeyName('theme')
                     ->findOne();
             //Get the current theme out of the database
             $this->name = $setting->getKeyValue();
         }

         if (isset($_GET['pos_hash']))
         {
            $this->hash = HashQuery::create()
                       ->findOneByUriHash($_GET['pos_hash']);

            //Check, if the hash exists
            if (!isset($this->hash))
            {
                //It doesn't, so create everything we need.
                $this->geobin = new Geobin();
                $this->hash = new Hash();

                if (isset($_POST['geobin_markers']))
                {
                    $markers = json_decode($_POST['geobin_markers']);
                    
                    $i = 0;
                    if (isset($markers) && $markers != NULL){
                        foreach ($markers as $marker){
                            //Create all Positions
                            if ($i < 20)
                            {
                            $position = new Position();
                            $position->setLat($marker->lat);
                            $position->setLng($marker->lng);

                            $this->geobin->addPosition($position);
                            $i++;
                            }
                        }
                   }
                }
                
                $this->geobin->setGeobinUserId(1);
                $this->geobin->setTitle($_POST['geobin_title']);
                $this->geobin->setDescription($_POST['geobin_description']);

                if (isset($_POST['geobin_zoomlevel']))
                {
                    $this->geobin->setZoomlevel($_POST['geobin_zoomlevel']);
                }

                if (isset($_POST['geobin_center']))
                {
                    $geobinCenter = json_decode($_POST['geobin_center']);
                    $this->geobin->setCenterLat($geobinCenter->lat);
                    $this->geobin->setCenterLng($geobinCenter->lng);
                }

                $this->geobin->setIpaddress(get_client_ip());
                $expire_date = new DateTime();
                if (isset($_POST['geobin_expire']))
                {
                    $expire_date->add(new DateInterval('P'.$_POST['geobin_expire']));
                }
                else
                {
                    $expire_date->add(new DateInterval('P100Y'));
                }
                
                $this->hash->setExpires($expire_date);
                $this->hash->setGeobin($this->geobin);
                $this->hash->setUriHash($_GET['pos_hash']);
                $this->hash->save();
                
            }
            else
            {
                if (!isset($_GET['pos_format'])){
                    $stats = new Statistics();
                    $stats->setIpaddress(get_client_ip());
                    $stats->setUriHash($this->hash->getUriHash());
                    $stats->save();
                }
                $this->geobin = $this->hash->getGeobin();
            }
                
             if (!isset($_GET['pos_format']))
             {
                 if (time() - strtotime($this->GetExpireDate()) >= 0){
                    require_once GEOBIN_THEMES.$this->name.'/404.php';
                 }
                 else
                 {
                    require_once GEOBIN_THEMES.$this->name.'/single_position.php';                     
                 }

             }
             else
             {
                 if ($_GET['pos_format'] == "json")
                 {
                     $i = 0;
                     $positions["center_lat"] = $this->geobin->getCenterLat();
                     $positions["center_lng"] = $this->geobin->getCenterLng();
                     $positions["zoom"] = $this->geobin->getZoomlevel();
                     foreach( $this->geobin->getPositions() as $position)
                     {
                         $positions["positions"][$i]['lat'] = $position->getLat();
                         $positions["positions"][$i]['lng'] = $position->getLng();
                         
                         $i++;
                     }
                     echo json_encode($positions);
                 }
             }
         }
         else
         {
            //Load the themes main file.
            require_once GEOBIN_THEMES.$this->name.'/index.php';        
         }
         
     }
     
     public function GetPostURI()
     {
         //Check, if the Hash exists
         do
         {
             $position_hash = generateRandomString();
             $pos = HashQuery::create()->findOneByUriHash($position_hash);
         } while (isset($pos));
         
        return $this->GetURI().$position_hash;
     }
     
     //Loads the corresponding Header file
     public function GetHeader()
     {
         //Load the themes main file.
         require_once GEOBIN_THEMES.$this->name.'/header.php';         
     }
     
     public function GetFooter()
     {
         //Load the themes main file.
         require_once GEOBIN_THEMES.$this->name.'/footer.php';           
     }

     public function GetURI()
     {
             $setting = SettingQuery::create()
                     ->filterByKeyName('uri')
                     ->findOne();
             //Get the current theme out of the database
             return $setting->getKeyValue();
     }
     
     public function GetThemeURI()
     {
        return $this->GetURI().'content/themes/'.$this->name.'/';
     }
     
     public function GetExpireDate()
     {
         $date = $this->hash->getExpires();
         return strftime("%d.%m.%Y", strtotime($date));
     }
     
     public function GetTitle()
     {
        $setting = SettingQuery::create()
               ->filterByKeyName('title')
               ->findOne();
        //Get the current theme out of the database
        return $setting->getKeyValue();        
     }
     
     public function displayMessage()
     {
         if (isset($this->message))
         {
             return '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->message.'</div>';
         }
     }

}
?>
