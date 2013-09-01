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
* @ORM\Entity
 * #(repositoryClass="Weather_Entity_Repository_NOAAZoneDataRepository")
* @ORM\Table(name="weather_noaazonedata")
*/

class Weather_Entity_NOAAZoneData extends Zikula_EntityAccess
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
     * @ORM\Column(type="integer")
     */
    private $zone;

    /**
     * item expires
     *
     * @ORM\Column(type="datetime", name="expires")
     */
    private $expires = '';

    /**
     * item Xmldata
     *
     * @ORM\Column(type="text", length=100000)
     */
    private $xmldata = '';

    /**
     * Constructor
     */

    /*	    
    public function __construct()
        {
            $this->date = new DateTime();
        }
     */	

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    public function getXmldata()
    {
        return $this->xmldata;
    }

    public function setXmldata($xmldata)
    {
        $this->xmldata = $xmldata;
    }

}
