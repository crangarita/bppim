<?php


/* Date: 17/10/2016 10:58:23 */

namespace Entities;

/**
 * Plan
 *
 * @Table(name="plan")
 * @Entity
 */
class Plan
{

function __construct() {}

    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=150, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @Column(name="anoini", type="integer", nullable=false)
     */
    private $anoini;

    /**
     * @var integer
     *
     * @Column(name="anofin", type="integer", nullable=false)
     */
    private $anofin;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Plan
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /** 
     * Set nombre
     *
     * @param string $nombre
     * @return Plan
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /** 
     * Set anoini
     *
     * @param integer $anoini
     * @return Plan
     */
    public function setAnoini($anoini)
    {
        $this->anoini = $anoini;
    
        return $this;
    }

    /**
     * Get anoini
     *
     * @return integer 
     */
    public function getAnoini()
    {
        return $this->anoini;
    }

    /** 
     * Set anofin
     *
     * @param integer $anofin
     * @return Plan
     */
    public function setAnofin($anofin)
    {
        $this->anofin = $anofin;
    
        return $this;
    }

    /**
     * Get anofin
     *
     * @return integer 
     */
    public function getAnofin()
    {
        return $this->anofin;
    }
}
