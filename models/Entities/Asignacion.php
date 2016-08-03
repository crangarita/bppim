<?php


/* Date: 02/08/2016 19:03:56 */

namespace Entities;

/**
 * Asignacion
 *
 * @Table(name="asignacion")
 * @Entity
 */
class Asignacion
{

function __construct() {}

    /**
     * @var \Proyecto
     *
     * @Id
     *
     * @ManyToOne(targetEntity="Proyecto")
     * @JoinColumns({
     *   @JoinColumn(name="proyecto", referencedColumnName="id")
     * })
     */
    private $proyecto;

    /**
     * @var \DateTime
     *
     * @Column(name="fechaasig", type="date", nullable=false)
     */
    private $fechaasig;

    /**
     * @var \DateTime
     *
     * @Column(name="fechalimite", type="date", nullable=true)
     */
    private $fechalimite;

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
     * @var string
     *
     * @Column(name="observacion", type="text", nullable=true)
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
     * @Column(name="observacionsect", type="text", nullable=true)
     */
    private $observacionsect;


    /** 
     * Set proyecto
     *
     * @param integer $proyecto
     * @return Asignacion
     */
    public function setProyecto($proyecto)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return integer 
     */
    public function getProyecto()
    {
        return $this->proyecto;
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
     * Set entidad
     *
     * @param integer $entidad
     * @return Asignacion
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return integer 
     */
    public function getEntidad()
    {
        return $this->entidad;
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
}