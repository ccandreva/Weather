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

class Weather_Model_Forecast extends Doctrine_Record
{
    /**
* Set table definition.
*
* @return void
*/
    public function setTableDefinition()
    {
        $this->setTableName('weather_forecast');

        $this->hasColumn('id as id', 'integer', 4, array(
            'primary' => true,
            'autoincrement' => true
        ));
        $this->hasColumn('zone as zone', 'integer', 4, array(
            'notnull' => true,
        ));

	$this->hasColumn('description as description', 'string', 255, array(
            'notnull' => false,
            'default' => ''
        ));
        $this->hasColumn('data as data', 'array', 100000);
    }
}
