<?php


/* Date: 02/08/2016 19:03:56 */

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
     * @Column(name="numradicado", type="string", length=5)
     */
    private $numRadicado;

    /**
     * @var string
     *
     * @Column(name="codigobppim", type="string", length=15, nullable=true)
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
     * @Column(name="proponente", type="string", length=50, nullable=true)
     */
    private $proponente;

    /**
     * @var \DateTime
     *
     * @Column(name="fechacreacion", type="datetime", nullable=true)
     */
    private $fechacreacion;

    /**
     * @var string
     *
     * @Column(name="valor", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var integer
     *
     * @Column(name="numbeneficiario", type="integer", nullable=true)
     */
    private $numbeneficiario;

    /**
     * @var string
     *
     * @Column(name="justificacion", type="text", nullable=true)
     */
    private $justificacion;

    /**
     * @var integer
     *
     * @Column(name="dimension", type="integer", nullable=true)
     */
    private $dimension;

    /**
     * @var \Vigencia
     *
     * @ManyToOne(targetEntity="Vigencia")
     * @JoinColumns({
     *   @JoinColumn(name="vigencia", referencedColumnName="id")
     * })
     */
    private $vigencia;

    /**
     * @var integer
     *
     * @Column(name="meses", type="integer", nullable=true)
     */
    private $meses;

    /**
     * @var \DateTime
     *
     * @Column(name="fecharadicacion", type="date", nullable=true)
     */
    private $fecharadicacion;

    /**
     * @var string
     *
     * @Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

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
     * @OneToMany(targetEntity="Asignacion", mappedBy="proyecto")
     */
    private $asignaciones;

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
     * Set numRadicado
     *
     * @param string $numRadicado
     * @return Proyecto
     */
    public function setNumRadicado($numRadicado)
    {
        $this->numRadicado = $numRadicado;

        return $this;
    }

    /**
     * Get numRadicado
     *
     * @return string 
     */
    public function getNumRadicado()
    {
        return $this->numRadicado;
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
     * Set valor
     *
     * @param string $valor
     * @return Proyecto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /** 
     * Set numbeneficiario
     *
     * @param integer $numbeneficiario
     * @return Proyecto
     */
    public function setNumbeneficiario($numbeneficiario)
    {
        $this->numbeneficiario = $numbeneficiario;

        return $this;
    }

    /**
     * Get numbeneficiario
     *
     * @return integer 
     */
    public function getNumbeneficiario()
    {
        return $this->numbeneficiario;
    }

    /** 
     * Set justificacion
     *
     * @param string $justificacion
     * @return Proyecto
     */
    public function setJustificacion($justificacion)
    {
        $this->justificacion = $justificacion;

        return $this;
    }

    /**
     * Get justificacion
     *
     * @return string 
     */
    public function getJustificacion()
    {
        return $this->justificacion;
    }

    /** 
     * Set dimension
     *
     * @param integer $dimension
     * @return Proyecto
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get dimension
     *
     * @return integer 
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /** 
     * Set vigencia
     *
     * @param integer $vigencia
     * @return Proyecto
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;

        return $this;
    }

    /**
     * Get vigencia
     *
     * @return integer 
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /** 
     * Set meses
     *
     * @param integer $meses
     * @return Proyecto
     */
    public function setMeses($meses)
    {
        $this->meses = $meses;

        return $this;
    }

    /**
     * Get meses
     *
     * @return integer 
     */
    public function getMeses()
    {
        return $this->meses;
    }

    /** 
     * Set fecharadicacion
     *
     * @param \DateTime $fecharadicacion
     * @return Proyecto
     */
    public function setFecharadicacion($fecharadicacion)
    {
        $this->fecharadicacion = $fecharadicacion;

        return $this;
    }

    /**
     * Get fecharadicacion
     *
     * @return \DateTime 
     */
    public function getFecharadicacion()
    {
        return $this->fecharadicacion;
    }

    /** 
     * Set observacion
     *
     * @param string $observacion
     * @return Proyecto
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

    /**
     * Get asignaciones
     *
     * @return \Asignaciones 
     */
    public function getAsignaciones()
    {
        return $this->asignaciones;
    }
    
}
