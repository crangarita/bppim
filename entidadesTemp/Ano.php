<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Ano
 *
 * @Table(name="ano")
 * @Entity
 */
class Ano
{

function __construct() {}

    /**
     * @var integer
     *
     * @Column(name="descripcion", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $descripcion;


    /** 
     * Set descripcion
     *
     * @param integer $descripcion
     * @return Ano
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return integer 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
