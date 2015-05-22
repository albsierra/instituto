<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matricula
 */
class Matricula
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Alumno
     */
    private $expediente;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Grupo
     */
    private $grupo;


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
     * Set expediente
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $expediente
     * @return Matricula
     */
    public function setExpediente(\IES2Mares\TutoresBundle\Entity\Alumno $expediente = null)
    {
        $this->expediente = $expediente;

        return $this;
    }

    /**
     * Get expediente
     *
     * @return \IES2Mares\TutoresBundle\Entity\Alumno
     */
    public function getExpediente()
    {
        return $this->expediente;
    }

    /**
     * Set grupo
     *
     * @param \IES2Mares\TutoresBundle\Entity\Grupo $grupo
     * @return Matricula
     */
    public function setGrupo(\IES2Mares\TutoresBundle\Entity\Grupo $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \IES2Mares\TutoresBundle\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
