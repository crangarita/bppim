<?php


/* Date: 02/08/2016 19:03:56 */

namespace Entities;

/**
 * ProyectoReq
 *
 * @Table(name="proyectoreq")
 * @Entity
 */
class ProyectoReq
{

function __construct() {}


    /**
     * @var \Proyecto
     * @Id
     * @ManyToOne(targetEntity="Proyecto")
     * @JoinColumns({
     *   @JoinColumn(name="proyecto", referencedColumnName="id")
     * })
     */
    private $proyecto;

    /**
     * @var \Requerimiento
     * @Id
     * @ManyToOne(targetEntity="Requerimiento")
     * @JoinColumns({
     *   @JoinColumn(name="requerimiento", referencedColumnName="id")
     * })
     */
    private $requerimiento;

    /**
     * @var \DateTime
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @Column(name="estado", type="integer", nullable=true)
     */
    private $estado;

    /** 
     * Set proyecto
     *
     * @param integer $proyecto
     * @return ProyectoReq
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
     * Set requerimiento
     *
     * @param integer $requerimiento
     * @return ProyectoReq
     */
    public function setRequerimiento($requerimiento)
    {
        $this->requerimiento = $requerimiento;

        return $this;
    }

    /**
     * Get requerimiento
     *
     * @return integer 
     */
    public function getRequerimiento()
    {
        return $this->requerimiento;
    }

    /** 
     * Set fecha
     *
     * @param integer $fecha
     * @return ProyectoReq
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return integer 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /** 
     * Set estado
     *
     * @param integer $estado
     * @return ProyectoReq
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

}
