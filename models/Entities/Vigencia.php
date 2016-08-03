<?php


/* Date: 02/08/2016 19:03:56 */

namespace Entities;

/**
 * Vigencia
 *
 * @Table(name="vigencia")
 * @Entity
 */
class Vigencia
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
     * @Column(name="descripcion", type="string", length=30, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @Column(name="ano", type="string", length=4, nullable=false)
     */
    private $ano;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Vigencia
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
     * @return Vigencia
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
     * Set ano
     *
     * @param string $ano
     * @return Vigencia
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return string 
     */
    public function getAno()
    {
        return $this->ano;
    }
}
