<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuestionarioasignado
 */
class Cuestionarioasignado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $completado;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Cuestionario
     */
    private $cuestionario;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $profesor;


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
     * Set completado
     *
     * @param boolean $completado
     * @return Cuestionarioasignado
     */
    public function setCompletado($completado)
    {
        $this->completado = $completado;

        return $this;
    }

    /**
     * Get completado
     *
     * @return boolean 
     */
    public function getCompletado()
    {
        return $this->completado;
    }

    /**
     * Set cuestionario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario
     * @return Cuestionarioasignado
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
     * Set profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Cuestionarioasignado
     */
    public function setProfesor(\IES2Mares\TutoresBundle\Entity\Profesor $profesor = null)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return \IES2Mares\TutoresBundle\Entity\Profesor 
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    public function getObservaciones()
    {
        return $this->getCuestionario()->getObservaciones();
    }

}
