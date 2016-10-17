<?php


/* Date: 17/10/2016 10:58:23 */

namespace Entities;

/**
 * Funcionario
 *
 * @Table(name="funcionario", indexes={@Index(name="entidad", columns={"entidad"})})
 * @Entity
 */
class Funcionario
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
     * @Column(name="cedula", type="string", length=15, nullable=false)
     */
    private $cedula;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=80, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="cargo", type="string", length=80, nullable=false)
     */
    private $cargo;

    /**
     * @var integer
     *
     * @Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

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
     * @return Funcionario
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
     * Set cedula
     *
     * @param string $cedula
     * @return Funcionario
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /** 
     * Set nombre
     *
     * @param string $nombre
     * @return Funcionario
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
     * Set cargo
     *
     * @param string $cargo
     * @return Funcionario
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /** 
     * Set estado
     *
     * @param integer $estado
     * @return Funcionario
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
     * Set entidad
     *
     * @param \Entidad $entidad
     * @return Funcionario
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
