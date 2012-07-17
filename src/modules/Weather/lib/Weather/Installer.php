<?php
/**
* DBT Diary
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/

class Weather_Installer extends Zikula_AbstractInstaller
{
    public function install()
    {
        ModUtil::setVar('Weather', 'modulestylesheet', 'style.css');
        //ModUtil::setVar('Weather', 'adminEmail', '');

        // if ( !DBUtil::createTable('weather') ) return false;
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
        if ( !DBUtil::dropTable('weather') ) return false;
        return true;
    }

}
