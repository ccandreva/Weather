<?php
/**
* Weather
*
* @copyright (C) 2012, Christopher X. Candreva <chris@westnet.com>
* @link http://github.com/ccandreva/Weather
* @license See license.txt
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
*/

use Doctrine\ORM\Mapping as ORM;

/**
* NOAAZone entity class
*
* Annotations define the entity mappings to database.
*
* #ORM\Entity(repositoryClass="Weather_Entity_Repository_ForecastRepository")
* @ORM\Table(name="weather_forecast")
*/

class Weather_Entity_Forecast extends Zikula_EntityAccess
{

    /**
     * id field (record id)
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * id field (record id)
     *
     * @ORM\Zone
     * @ORM\Column(type="integer")
     */
    private $zone;
    /**
     * item description
     *
     * @ORM\Column(length=255)
     */
    private $description = '';

    /**
     * item data
     *
     * @ORM\Column(length=100000)
     */
    private $data = '';

    /**
     * Constructor
     */

}
