<?php
/**
* DBT Diary
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
* @category   Zikula_3rdParty_Modules
* @package    Content_Management
* @subpackage Weather
*/

class Weather_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['name']         = $this->__('Weather');
        $meta['displayname']  = $this->__('Weather');
        $meta['description']  = $this->__('Display weather forcasts.');
        $meta['url']         = $this->__('Weather');
        $meta['version']      = '0.0.1';
        $meta['core_min']      =   '1.3.3';
        $meta['core_max']      =   '1.3.99';
        $meta['official']     = true;
        $meta['author']       = 'Chris Candreva';
        $meta['contact']      = 'http://github.com/ccandreva/Weather';
        $meta['securityschema'] = array('Weather::' => 'Weather::');

        return $meta;
    }
}
