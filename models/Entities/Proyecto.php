<?php


/* Date: 24/04/2016 22:45:47 */

namespace Entities;

/**
 * Proyecto
 *
 * @Table(name="proyecto", indexes={@Index(name="estado", columns={"estado", "sector", "categoria"}), @Index(name="estado_2", columns={"estado"}), @Index(name="categoria", columns={"categoria"}), @Index(name="sector", columns={"sector"})})
 * @Entity
 */
class Proyecto
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
     * @Column(name="codigobppim", type="string", length=15, nullable=false)
     */
    private $codigobppim;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="proponente", type="string", length=50, nullable=false)
     */
    private $proponente;

    /**
     * @var \DateTime
     *
     * @Column(name="fechacreacion", type="datetime", nullable=false)
     */
    private $fechacreacion;

    /**
     * @var \Categoria
     *
     * @ManyToOne(targetEntity="Categoria")
     * @JoinColumns({
     *   @JoinColumn(name="categoria", referencedColumnName="id")
     * })
     */
    private $categoria;

    /**
     * @var \Estado
     *
     * @ManyToOne(targetEntity="Estado")
     * @JoinColumns({
     *   @JoinColumn(name="estado", referencedColumnName="id")
     * })
     */
    private $estado;

    /**
     * @var \Sector
     *
     * @ManyToOne(targetEntity="Sector")
     * @JoinColumns({
     *   @JoinColumn(name="sector", referencedColumnName="id")
     * })
     */
    private $sector;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Proyecto
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
     * Set codigobppim
     *
     * @param string $codigobppim
     * @return Proyecto
     */
    public function setCodigobppim($codigobppim)
    {
        $this->codigobppim = $codigobppim;

        return $this;
    }

    /**
     * Get codigobppim
     *
     * @return string 
     */
    public function getCodigobppim()
    {
        return $this->codigobppim;
    }

    /** 
     * Set nombre
     *
     * @param string $nombre
     * @return Proyecto
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
     * Set proponente
     *
     * @param string $proponente
     * @return Proyecto
     */
    public function setProponente($proponente)
    {
        $this->proponente = $proponente;

        return $this;
    }

    /**
     * Get proponente
     *
     * @return string 
     */
    public function getProponente()
    {
        return $this->proponente;
    }

    /** 
     * Set fechacreacion
     *
     * @param \DateTime $fechacreacion
     * @return Proyecto
     */
    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    /**
     * Get fechacreacion
     *
     * @return \DateTime 
     */
    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    /** 
     * Set categoria
     *
     * @param \Categoria $categoria
     * @return Proyecto
     */
    public function setCategoria($categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /** 
     * Set estado
     *
     * @param \Estado $estado
     * @return Proyecto
     */
    public function setEstado($estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /** 
     * Set sector
     *
     * @param \Sector $sector
     * @return Proyecto
     */
    public function setSector($sector = null)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return \Sector 
     */
    public function getSector()
    {
        return $this->sector;
    }
}
