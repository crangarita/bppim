<?php


/* Date: 17/10/2016 10:58:23 */

namespace Entities;

/**
 * Tiporequerimiento
 *
 * @Table(name="tiporequerimiento")
 * @Entity
 */
class Tiporequerimiento
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
     * @Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @Column(name="tieneobs", type="boolean", nullable=true)
     */
    private $tieneobs;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Tiporequerimiento
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tiporequerimiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /** 
     * Set tieneobs
     *
     * @param boolean $tieneobs
     * @return Tiporequerimiento
     */
    public function setTieneobs($tieneobs)
    {
        $this->tieneobs = $tieneobs;
    
        return $this;
    }

    /**
     * Get tieneobs
     *
     * @return boolean 
     */
    public function getTieneobs()
    {
        return $this->tieneobs;
    }
}
