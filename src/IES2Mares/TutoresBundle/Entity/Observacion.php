<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observacion
 */
class Observacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $observacion;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $profesor;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Cuestionario
     */
    private $cuestionario;


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
     * Set observacion
     *
     * @param string $observacion
     * @return Observacion
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
     * Set profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Observacion
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

    /**
     * Set cuestionario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario
     * @return Observacion
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
}
