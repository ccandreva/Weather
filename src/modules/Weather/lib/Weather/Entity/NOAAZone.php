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
 * #(repositoryClass="Weather_Entity_Repository_NOAAZoneRepository")
* @ORM\Table(name="weather_noaazone")
*/

class Weather_Entity_NOAAZone extends Zikula_EntityAccess
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
     * item description
     *
     * @ORM\Column(length=255)
     */
    private $description = '';

    /**
     * item url
     *
     * @ORM\Column(length=255)
     */
    private $url = '';

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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

}
