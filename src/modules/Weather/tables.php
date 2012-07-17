<?php
/**
 * Zikula Application Framework
 * @copyright  (c) Zikula Development Team
 * @license    GNU/GPL
 *
 * Get Weather table array
 * @return       array with table information.
*/
function Weather_tables()
{
	// initialise table array
	$tables = array();

	// full table definition
	$tables['weather'] = 'weather';
	$tables['weather_column'] = array('id'    => 'id',
                                        'expires'  => 'expires',
                                        'xmldata' => 'xmldata',
                                        );
	$tables['weather_column_def'] = array('id'    => 'I4 UNSIGNED NOTNULL AUTO PRIMARY',
                                        'expires'   => 'T',
                                        'xmldata'  => 'C2',
                                        );

	// add standard data fields
	ObjectUtil::addStandardFieldsToTableDefinition($tables['weather_column'], '');
	ObjectUtil::addStandardFieldsToTableDataDefinition($tables['weather_column_def']);

	// return table information
	return $tables;
}
