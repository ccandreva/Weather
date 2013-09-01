<?php
/**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/

class Weather_Controller_Admin extends Zikula_AbstractController
{

    public function main()
    {
        // security check
        if (!SecurityUtil::checkPermission('Weather::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

	$zonesObj = ModUtil::apiFunc('Weather', 'user', 'getNOAAZones');
	$this->view->assign('zones', $zonesObj);
        $this->view->assign('templatetitle', 'Weather');
        return $this->view->fetch('Admin/main.tpl');
    }

    public function editNOAAZone()
    {
	$id = FormUtil :: getPassedValue('id');
	$view = FormUtil::newForm('Weather', $this);
        $view->assign('templatetitle', 'Weather :: Edit Zone');

	$args = array();
	if($id) $args['id'] = $id;
	$formobj = new Weather_Form_Handler_EditNOAAZone($args);
	return $view->execute('Admin/editnoaazone.tpl', $formobj);
    }
    
}
