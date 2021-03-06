<?php


/* Date: 28/10/2016 11:25:35 */

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
     * @var integer
     *
     * @Column(name="actual", type="integer", nullable=false)
     */
    private $actual;


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

    /** 
     * Set actual
     *
     * @param integer $actual
     * @return Vigencia
     */
    public function setActual($actual)
    {
        $this->actual = $actual;
    
        return $this;
    }

    /**
     * Get actual
     *
     * @return integer 
     */
    public function getActual()
    {
        return $this->actual;
    }
}
