<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 */
class Materia
{
    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $materia;

    /**
     * @var string
     */
    private $ensenanza;

    /**
     * @var string
     */
    private $curso;

    /**
     * to String
     */
    public function __toString()
    {
        return $this->getMateria();
    }
    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Materia
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }


    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set materia
     *
     * @param string $materia
     * @return Materia
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return string 
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Set ensenanza
     *
     * @param string $ensenanza
     * @return Materia
     */
    public function setEnsenanza($ensenanza)
    {
        $this->ensenanza = $ensenanza;

        return $this;
    }

    /**
     * Get ensenanza
     *
     * @return string 
     */
    public function getEnsenanza()
    {
        return $this->ensenanza;
    }

    /**
     * Set curso
     *
     * @param string $curso
     * @return Materia
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return string 
     */
    public function getCurso()
    {
        return $this->curso;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $alumnos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add alumnos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $alumnos
     * @return Materia
     */
    public function addAlumno(\IES2Mares\TutoresBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos[] = $alumnos;

        return $this;
    }

    /**
     * Remove alumnos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $alumnos
     */
    public function removeAlumno(\IES2Mares\TutoresBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos->removeElement($alumnos);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }
}
