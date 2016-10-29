<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Asignacion
 *
 * @Table(name="asignacion", indexes={@Index(name="proyecto", columns={"proyecto"}), @Index(name="entidad", columns={"entidad"}), @Index(name="funcionario", columns={"funcionario"})})
 * @Entity
 */
class Asignacion
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
     * @var \DateTime
     *
     * @Column(name="fechaasig", type="date", nullable=true)
     */
    private $fechaasig;

    /**
     * @var \DateTime
     *
     * @Column(name="fechalimite", type="date", nullable=true)
     */
    private $fechalimite;

    /**
     * @var string
     *
     * @Column(name="observacion", type="string", length=100, nullable=true)
     */
    private $observacion;

    /**
     * @var \DateTime
     *
     * @Column(name="fechaentrega", type="date", nullable=true)
     */
    private $fechaentrega;

    /**
     * @var string
     *
     * @Column(name="observacionsect", type="string", length=100, nullable=true)
     */
    private $observacionsect;

    /**
     * @var integer
     *
     * @Column(name="estado", type="integer", nullable=true)
     */
    private $estado;

    /**
     * @var \Funcionario
     *
     * @ManyToOne(targetEntity="Funcionario")
     * @JoinColumns({
     *   @JoinColumn(name="funcionario", referencedColumnName="id")
     * })
     */
    private $funcionario;

    /**
     * @var \Proyecto
     *
     * @ManyToOne(targetEntity="Proyecto")
     * @JoinColumns({
     *   @JoinColumn(name="proyecto", referencedColumnName="id")
     * })
     */
    private $proyecto;

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
     * @return Asignacion
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
     * Set fechaasig
     *
     * @param \DateTime $fechaasig
     * @return Asignacion
     */
    public function setFechaasig($fechaasig)
    {
        $this->fechaasig = $fechaasig;
    
        return $this;
    }

    /**
     * Get fechaasig
     *
     * @return \DateTime 
     */
    public function getFechaasig()
    {
        return $this->fechaasig;
    }

    /** 
     * Set fechalimite
     *
     * @param \DateTime $fechalimite
     * @return Asignacion
     */
    public function setFechalimite($fechalimite)
    {
        $this->fechalimite = $fechalimite;
    
        return $this;
    }

    /**
     * Get fechalimite
     *
     * @return \DateTime 
     */
    public function getFechalimite()
    {
        return $this->fechalimite;
    }

    /** 
     * Set observacion
     *
     * @param string $observacion
     * @return Asignacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /** 
     * Set fechaentrega
     *
     * @param \DateTime $fechaentrega
     * @return Asignacion
     */
    public function setFechaentrega($fechaentrega)
    {
        $this->fechaentrega = $fechaentrega;
    
        return $this;
    }

    /**
     * Get fechaentrega
     *
     * @return \DateTime 
     */
    public function getFechaentrega()
    {
        return $this->fechaentrega;
    }

    /** 
     * Set observacionsect
     *
     * @param string $observacionsect
     * @return Asignacion
     */
    public function setObservacionsect($observacionsect)
    {
        $this->observacionsect = $observacionsect;
    
        return $this;
    }

    /**
     * Get observacionsect
     *
     * @return string 
     */
    public function getObservacionsect()
    {
        return $this->observacionsect;
    }

    /** 
     * Set estado
     *
     * @param integer $estado
     * @return Asignacion
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
     * Set funcionario
     *
     * @param \Funcionario $funcionario
     * @return Asignacion
     */
    public function setFuncionario($funcionario = null)
    {
        $this->funcionario = $funcionario;
    
        return $this;
    }

    /**
     * Get funcionario
     *
     * @return \Funcionario 
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }

    /** 
     * Set proyecto
     *
     * @param \Proyecto $proyecto
     * @return Asignacion
     */
    public function setProyecto($proyecto = null)
    {
        $this->proyecto = $proyecto;
    
        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \Proyecto 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /** 
     * Set entidad
     *
     * @param \Entidad $entidad
     * @return Asignacion
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
