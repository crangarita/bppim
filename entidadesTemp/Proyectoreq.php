<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Proyectoreq
 *
 * @Table(name="proyectoreq")
 * @Entity
 */
class Proyectoreq
{

function __construct() {}

    /**
     * @var integer
     *
     * @Column(name="proyecto", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $proyecto;

    /**
     * @var integer
     *
     * @Column(name="requerimiento", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
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
     * @return Proyectoreq
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
     * @return Proyectoreq
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
     * @param \DateTime $fecha
     * @return Proyectoreq
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /** 
     * Set estado
     *
     * @param integer $estado
     * @return Proyectoreq
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
