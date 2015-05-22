<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiamatriculada
 */
class Materiamatriculada
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $anyo;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Alumno
     */
    private $expediente;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Materia
     */
    private $materia;

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
     * Set anyo
     *
     * @param string $anyo
     * @return Materiamatriculada
     */
    public function setAnyo($anyo)
    {
        $this->anyo = $anyo;

        return $this;
    }

    /**
     * Get anyo
     *
     * @return string 
     */
    public function getAnyo()
    {
        return $this->anyo;
    }

    /**
     * Set expediente
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $expediente
     * @return Materiamatriculada
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
     * Set materia
     *
     * @param \IES2Mares\TutoresBundle\Entity\Materia $materia
     * @return Materiamatriculada
     */
    public function setMateria(\IES2Mares\TutoresBundle\Entity\Materia $materia = null)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return \IES2Mares\TutoresBundle\Entity\Materia
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Set profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Materiamatriculada
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
}
