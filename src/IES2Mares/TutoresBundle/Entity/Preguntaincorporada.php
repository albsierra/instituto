<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preguntaincorporada
 */
class Preguntaincorporada
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Cuestionario
     */
    private $cuestionario;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Pregunta
     */
    private $pregunta;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getPregunta()->__toString();
    }

    /**
     * Set cuestionario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario
     * @return Preguntaincorporada
     */
    public function setCuestionario(\IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario = null)
    {
        $this->cuestionario = $cuestionario;

        return $this;
    }

    /**
     * Get cuestionario
     *
     * @return \IES2Mares\TutoresBundle\Entity\Cuestionario
     */
    public function getCuestionario()
    {
        return $this->cuestionario;
    }

    /**
     * Set pregunta
     *
     * @param \IES2Mares\TutoresBundle\Entity\Pregunta $pregunta
     * @return Preguntaincorporada
     */
    public function setPregunta(\IES2Mares\TutoresBundle\Entity\Pregunta $pregunta = null)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    /**
     * Get pregunta
     *
     * @return \IES2Mares\TutoresBundle\Entity\Pregunta
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $respuestas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->respuestas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add respuestas
     *
     * @param \IES2Mares\TutoresBundle\Entity\Respuesta $respuestas
     * @return Preguntaincorporada
     */
    public function addRespuesta(\IES2Mares\TutoresBundle\Entity\Respuesta $respuestas)
    {
        $this->respuestas[] = $respuestas;

        return $this;
    }

    /**
     * Remove respuestas
     *
     * @param \IES2Mares\TutoresBundle\Entity\Respuesta $respuestas
     */
    public function removeRespuesta(\IES2Mares\TutoresBundle\Entity\Respuesta $respuestas)
    {
        $this->respuestas->removeElement($respuestas);
    }

    /**
     * Get respuestas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }
}
