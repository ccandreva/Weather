<?php
/**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/

class Weather_Installer extends Zikula_AbstractInstaller
{
    var $tables = array('Weather_Entity_NOAAZone'
    ,	'Weather_Entity_NOAAZoneData'
    ,	'Weather_Entity_Forecast'
    );

    public function install()
    {
        ModUtil::setVar('Weather', 'modulestylesheet', 'style.css');
        //ModUtil::setVar('Weather', 'adminEmail', '');

        // create the table
        try {
            DoctrineHelper::createSchema($this->entityManager, $this->tables);
        } catch (Exception $e) {
            $message = $this->__f('An error was encountered while installing the %1$s module.', array($this->getName()));
            if (System::isDevelopmentMode()) {
                $message .= ' ' . $this->__f('The error occurred while creating the tables. The Doctrine Exception message was: %1$s', array($e->getMessage()));
            }
            $this->registerError($message);
            return false;
        }

 	
        return true;
    }

    public function upgrade($oldversion)
    {

        switch($oldversion) {

            case "0.0.0" :
                // if (!DBUtil::changeTable('weather_diary')) return false;


             // This break should be after the last upgrade
                break;

            default:
                SessionUtil::setVar('errormsg', __("An unknown version is installed!") );
                return false;
        }

        return true;
    }

    public function uninstall()
    {
        ModUtil::delVar('weather');
	try {
	    DoctrineHelper::dropSchema($this->entityManager, $this->tables);
	} catch (Doctrine_Exception $e) {
	    $message = $this->__f('A database error was encountered while uninstalling the %1$s module.', array($this->getName()));
	    if (System::isDevelopmentMode()) {
		$message .= ' ' . $this->__f('The error occurred while dropping the %1$s table. The Doctrine Exception message was: %2$s', array($tableName, $e->getMessage()));
	    }
	    $this->registerError($message);
	}
        return true;
    }

}
