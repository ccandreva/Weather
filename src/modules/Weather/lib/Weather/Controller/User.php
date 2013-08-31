<?php
/**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/

class Weather_Controller_User extends Zikula_AbstractController
{

    public function main()
    {
        // security check
        if (!SecurityUtil::checkPermission('Weather::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $weather=ModUtil::apiFunc('Weather', 'user', 'getWeather');
        $this->view->assign($weather);
        $this->view->assign('templatetitle', 'weather');
	$zoneData = ModUtil::apiFunc('Weather', 'user', 'getNOAAZoneData',
		array('id' => 1));
	$this->view->assign($zoneData);
        return $this->view->fetch('User/main.tpl');
    }

}
