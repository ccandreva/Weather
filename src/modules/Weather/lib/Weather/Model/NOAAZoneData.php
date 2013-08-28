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

class Weather_Model_NOAAZoneData extends Doctrine_Record
{
    /**
* Set table definition.
*
* @return void
*/
    public function setTableDefinition()
    {
        $this->setTableName('weather_noaazonedata');

        $this->hasColumn('id as id', 'integer', 4, array(
            'primary' => true,
            'autoincrement' => true
        ));
        $this->hasColumn('zone as zone', 'integer', 4, array(
            'notnull' => true,
        ));
        $this->hasColumn('expires as expires', 'datetime', null, array(
            'notnull' => true,
        ));
        $this->hasColumn('xmldata as xmldata', 'clob', 100000, array(
            'notnull' => false,
        ));

    }
}
