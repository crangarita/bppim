<?php


/* Date: 28/10/2016 11:25:35 */

namespace Entities;

/**
 * Configuracion
 *
 * @Table(name="configuracion")
 * @Entity
 */
class Configuracion
{

function __construct() {}

    /**
     * @var string
     *
     * @Column(name="municipio", type="string", length=5, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $municipio;

    /**
     * @var integer
     *
     * @Column(name="plan", type="integer", nullable=true)
     */
    private $plan;

    /**
     * @var integer
     *
     * @Column(name="certifica", type="integer", nullable=true)
     */
    private $certifica;

    /**
     * @var integer
     *
     * @Column(name="asigna", type="integer", nullable=true)
     */
    private $asigna;


    /** 
     * Set municipio
     *
     * @param string $municipio
     * @return Configuracion
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    
        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /** 
     * Set plan
     *
     * @param integer $plan
     * @return Configuracion
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    
        return $this;
    }

    /**
     * Get plan
     *
     * @return integer 
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /** 
     * Set certifica
     *
     * @param integer $certifica
     * @return Configuracion
     */
    public function setCertifica($certifica)
    {
        $this->certifica = $certifica;
    
        return $this;
    }

    /**
     * Get certifica
     *
     * @return integer 
     */
    public function getCertifica()
    {
        return $this->certifica;
    }

    /** 
     * Set asigna
     *
     * @param integer $asigna
     * @return Configuracion
     */
    public function setAsigna($asigna)
    {
        $this->asigna = $asigna;
    
        return $this;
    }

    /**
     * Get asigna
     *
     * @return integer 
     */
    public function getAsigna()
    {
        return $this->asigna;
    }
}
