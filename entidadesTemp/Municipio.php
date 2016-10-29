<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Municipio
 *
 * @Table(name="municipio")
 * @Entity
 */
class Municipio
{

function __construct() {}

    /**
     * @var string
     *
     * @Column(name="codigo", type="string", length=5, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="departamento", type="string", length=2, nullable=false)
     */
    private $departamento;


    /** 
     * Set codigo
     *
     * @param string $codigo
     * @return Municipio
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /** 
     * Set nombre
     *
     * @param string $nombre
     * @return Municipio
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
     * Set departamento
     *
     * @param string $departamento
     * @return Municipio
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    
        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}
