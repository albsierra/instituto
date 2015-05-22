<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 */
class Grupo
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
     * @var string
     */
    private $grupo;

    /**
     * @var string
     */
    private $subgrupo;

    /**
     * @var string
     */
    private $ensenanza;

    /**
     * @var integer
     */
    private $curso;

    /**
     * @var string
     */
    private $horariovisita;


    private $alumnos;

    public function __construct() {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * to String
     */
    public function __toString()
    {
        return $this->getGrupo();
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
     * Set anyo
     *
     * @param string $anyo
     * @return Grupo
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
     * Set grupo
     *
     * @param string $grupo
     * @return Grupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set subgrupo
     *
     * @param string $subgrupo
     * @return Grupo
     */
    public function setSubgrupo($subgrupo)
    {
        $this->subgrupo = $subgrupo;

        return $this;
    }

    /**
     * Get subgrupo
     *
     * @return string 
     */
    public function getSubgrupo()
    {
        return $this->subgrupo;
    }

    /**
     * Set ensenanza
     *
     * @param string $ensenanza
     * @return Grupo
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
     * @param integer $curso
     * @return Grupo
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return integer 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set horariovisita
     *
     * @param string $horariovisita
     * @return Grupo
     */
    public function setHorariovisita($horariovisita)
    {
        $this->horariovisita = $horariovisita;

        return $this;
    }

    /**
     * Get horariovisita
     *
     * @return string 
     */
    public function getHorariovisita()
    {
        return $this->horariovisita;
    }

    /**
     * Add alumnos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $alumnos
     * @return Grupo
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
    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $profesortutor;


    /**
     * Set profesortutor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesortutor
     * @return Grupo
     */
    public function setProfesortutor(\IES2Mares\TutoresBundle\Entity\Profesor $profesortutor = null)
    {
        $this->profesortutor = $profesortutor;

        return $this;
    }

    /**
     * Get profesortutor
     *
     * @return \IES2Mares\TutoresBundle\Entity\Profesor
     */
    public function getProfesortutor()
    {
        return $this->profesortutor;
    }
    /**
     * @var string
     */
    private $tutor;


    /**
     * Set tutor
     *
     * @param string $tutor
     * @return Grupo
     */
    public function setTutor($tutor)
    {
        $this->tutor = $tutor;

        return $this;
    }

    /**
     * Get tutor
     *
     * @return string 
     */
    public function getTutor()
    {
        return $this->tutor;
    }
}
