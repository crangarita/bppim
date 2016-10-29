<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Sector
 *
 * @Table(name="sector", indexes={@Index(name="entidad", columns={"entidad"})})
 * @Entity
 */
class Sector
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
     * @Column(name="descripcion", type="string", length=80, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Entidad
     *
     * @ManyToOne(targetEntity="Entidad")
     * @JoinColumns({
     *   @JoinColumn(name="entidad", referencedColumnName="id")
     * })
     */
    private $entidad;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Sector
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
     * @return Sector
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
     * Set entidad
     *
     * @param \Entidad $entidad
     * @return Sector
     */
    public function setEntidad($entidad = null)
    {
        $this->entidad = $entidad;
    
        return $this;
    }

    /**
     * Get entidad
     *
     * @return \Entidad 
     */
    public function getEntidad()
    {
        return $this->entidad;
    }
}
