<?php
/**
* DBT Diary
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/DbtDiary
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/


class Weather_Form_Handler_EditNOAAZone extends Zikula_Form_AbstractHandler
  {
    
    /* Global variables here */
    var $id, $zoneObj;

    /* Functions */
    public function __construct(&$args)
    {
        $this->id = $args['id'];
    }
    
    public function initialize(Zikula_Form_View $view)
    {
	// edit a Zone or create one
	$tableObj = Doctrine_core::getTable('Weather_Model_NOAAZone');
	if ($this->id){
	    $zoneObj = $tableObj->find($this->id);
	} else {
	    $zoneObj = new Weather_Model_NOAAZone();
	}
	$this->view->assign($zoneObj->toArray());
	$this->zoneObj = $zoneObj;
	return true;
    }
    
    public function handleCommand(Zikula_Form_View $view, &$args)
    {    
        $command = $args['commandName'];
        
        $formData = $this->view->getValues();
        if ($command == 'Cancel') {
            return $this->view->redirect (
                ModUtil::url('Weather', 'admin','main') );
        }

	if (!$this->view->isValid()) return false;

	$zoneObj = $this->zoneObj;
	$zoneObj->fromArray($formData);
	$zoneObj->save();
	
    return $this->view->redirect (ModUtil::url('Weather', 'admin','main'));
    }

    
}
  
