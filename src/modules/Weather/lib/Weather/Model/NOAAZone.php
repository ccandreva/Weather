<?php
/**
 * Zikula Application Framework
 * @copyright  (c) Zikula Development Team
 * @license    GNU/GPL
 *
 * 
*/

/**
* This is the model class that define the entity structure and behaviours.
*/

class Weather_Model_NOAAZone extends Doctrine_Record
{
    /**
* Set table definition.
*
* @return void
*/
    public function setTableDefinition()
    {
        $this->setTableName('weather_noaazone');

        $this->hasColumn('id as id', 'integer', 4, array(
            'primary' => true,
            'autoincrement' => true
        ));

	$this->hasColumn('description as description', 'string', 255, array(
            'notnull' => true,
            'default' => ''
        ));
        $this->hasColumn('url as url', 'string', 255, array(
            'notnull' => true,
            'default' => ''
        ));
    }
}
