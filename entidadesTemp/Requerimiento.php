<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Requerimiento
 *
 * @Table(name="requerimiento")
 * @Entity
 */
class Requerimiento
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
     * @Column(name="descripcion", type="string", length=300, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var integer
     *
     * @Column(name="tipo", type="integer", nullable=false)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @Column(name="numero", type="integer", nullable=false)
     */
    private $numero;


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
     * Set descripcion
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

    /** 
     * Set estado
     *
     * @param integer $estado
     * @return Requerimiento
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /** 
     * Set tipo
     *
     * @param integer $tipo
     * @return Requerimiento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /** 
     * Set numero
     *
     * @param integer $numero
     * @return Requerimiento
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
