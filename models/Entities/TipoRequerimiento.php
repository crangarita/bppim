<?php


/* Date: 02/08/2016 19:03:56 */

namespace Entities;

/**
 * TipoRequerimiento
 *
 * @Table(name="tiporequerimiento")
 * @Entity
 */
class TipoRequerimiento
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
     * @Column(name="descripcion", type="string", length=40)
     */
    private $descripcion;

    /** 
     * Set id
     *
     * @param integer $id
     * @return Requerimiento
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
     * @param string $descripcion
     * @return Requerimiento
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

}
