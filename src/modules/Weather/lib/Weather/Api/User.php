<?php
/**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/


class Weather_Api_User extends Zikula_AbstractApi
{
   /**
     * Get available menu links.
     *
     * @return array array of menu links.
     */
    public function getlinks($args)
    {
        if (SecurityUtil::checkPermission('Weather::', '::', ACCESS_READ)) {
            $links = array(
              array('url' => ModUtil::url('Weather', 'user', 'main'),
                  text=>$this->__('Overview'), 'class' => 'z-icon-es-preview'),  
            );
        }        
        return $links;
    }
    
    public function getWeather($args)
    {
        $xmlstr = file_get_contents('/tmp/zone-ny.xml');
        $doc = new SimpleXMLElement($xmlstr);
        
        $creationdate =  $doc->{'head'}->{'product'}->{'creation-date'};
        $date = strtotime($creationdate);
        $LastUpdated =  strftime('%l:%M%p %a %b %e', $date);
        // $LastUpdated =~ s/([AP]M)/\L$1/;
        
        $dataroot = $doc->{'data'};
        
        // Determine index of 12 hour format
        $keynum = -1;
        $NumEvents = 0;
        foreach ($dataroot->{'time-layout'} as $timelayout) {
            $keynum++;
            $key = $timelayout->{'layout-key'};
            if (preg_match('/^k-p12h-n(\d+)/', $key, $matches)) {
                // Number of weather events, extracted by regex from key
                $NumEvents = $matches[1];
                $key = "$key : $keynum : $NumEvents";
                break;
            }
        }
        
        if (isset($args['limitEvents'])) {
            $limitEvents = $args['limitEvents'];
            if ( ($limitEvents > 0) && ($limitEvents < $NumEvents) ) {
                $NumEvents = $limitEvents;
            }
        }
        
        $forcasts = array();
        for ($i=0; $i<$NumEvents; $i++) {
            $iconurl = $dataroot->{'parameters'}->{'conditions-icon'}->{'icon-link'}[$i];
            $f = array(
                'iconurl' => preg_replace('/medium/', 'small', $iconurl),
                'periodname' => $dataroot->{'time-layout'}[$keynum]->{'start-valid-time'}[$i]->attributes()->{'period-name'},
                'conditions' => $dataroot->parameters->weather->{'weather-conditions'}[$i]->attributes()->{'weather-summary'},
                'worded' => $dataroot->{'parameters'}->{'wordedForecast'}->{'text'}[$i],
            );
            $forcasts[] = $f;
        }

        return array( 'LastUpdated' => $LastUpdated,
            'forcasts' => $forcasts
            );
    }

    public function getNOAAZoneData($args)
    {	
	$id = $args['id'];
	if (!is_numeric($id)) {
	    return false;
	}
	$tableObj = Doctrine_core::getTable('Weather_Model_NOAAZoneData');
	$q = Doctrine_Query::create()
		->select('data.*')
		->from('Weather_Model_NOAAZoneData as data')
		->where('data.expires>NOW()');
	$zoneData = $q->fetchArray();

	if (isset($zoneData['expires'])) {
	    $zoneData['source'] = 'database';
	    return $zoneData;
	}

	// Download the xml file, save to database, return the data.
	$xmlstr = file_get_contents('http://forecast.weather.gov/MapClick.php?lat=41.02090&lon=-73.75740&FcstType=dwml');
        $doc = new SimpleXMLElement($xmlstr);
	$creationdate =  $doc->{'head'}->{'product'}->{'creation-date'};
	$period = $creationdate->attributes()->{'refresh-frequency'};
	preg_match('/%\w*(\d+)(\w+)$/', $period, $m);
	$n = $m[1];
	$p = $m[2];
	switch ($p) {
	    case 'H': case 'h':
		$p = 'hour';
		break;
	    case 'M': case 'm':
		$p = 'minute';
		break;
	    case 'S': case 's':
		$p = 'second';
		break;
	}
	$period = '+' . $n . ' ' . $p;
	$expires = strftime('%F %T',strtotime($period, strtotime($creationdate)));
	$zoneData = array(
	    'id' => $id,
	    'zone' => $id,
	    'expires' => $expires,
	    'xmldata' => $xmlstr,
	    'source' => 'Download',
	);
	
	$zoneObj->fromArray($formData);
	$zoneObj->save();

	return $zoneData;
	
    }
    
    
}