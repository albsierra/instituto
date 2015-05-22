<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 */
class Pregunta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $enunciado;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $obligatoria;

    /**
     * @var integer
     */
    private $incluidapordefecto;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $creador;


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
     * Set enunciado
     *
     * @param string $enunciado
     * @return Pregunta
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;

        return $this;
    }

    /**
     * Get enunciado
     *
     * @return string 
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Pregunta
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set obligatoria
     *
     * @param integer $obligatoria
     * @return Pregunta
     */
    public function setObligatoria($obligatoria)
    {
        $this->obligatoria = $obligatoria;

        return $this;
    }

    /**
     * Get obligatoria
     *
     * @return integer 
     */
    public function getObligatoria()
    {
        return $this->obligatoria;
    }

    /**
     * Set incluidapordefecto
     *
     * @param integer $incluidapordefecto
     * @return Pregunta
     */
    public function setIncluidapordefecto($incluidapordefecto)
    {
        $this->incluidapordefecto = $incluidapordefecto;

        return $this;
    }

    /**
     * Get incluidapordefecto
     *
     * @return integer 
     */
    public function getIncluidapordefecto()
    {
        return $this->incluidapordefecto;
    }

    /**
     * Set creador
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $creador
     * @return Pregunta
     */
    public function setCreador(\IES2Mares\TutoresBundle\Entity\Profesor $creador = null)
    {
        $this->creador = $creador;

        return $this;
    }

    /**
     * Get creador
     *
     * @return \IES2Mares\TutoresBundle\Entity\Profesor
     */
    public function getCreador()
    {
        return $this->creador;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cuestionarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getEnunciado();
    }

    /**
     * Add cuestionarios
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionarios
     * @return Pregunta
     */
    public function addCuestionario(\IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionarios)
    {
        $this->cuestionarios[] = $cuestionarios;

        return $this;
    }

    /**
     * Remove cuestionarios
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionarios
     */
    public function removeCuestionario(\IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionarios)
    {
        $this->cuestionarios->removeElement($cuestionarios);
    }

    /**
     * Get cuestionarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCuestionarios()
    {
        return $this->cuestionarios;
    }
}
