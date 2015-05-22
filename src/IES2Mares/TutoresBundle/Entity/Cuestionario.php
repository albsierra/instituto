<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuestionario
 */
class Cuestionario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var \DateTime
     */
    private $fechafin;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Alumno
     */
    private $alumno;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $creador;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profesor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profesor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     */
    public function __toString()
    {
        return $this->getAlumno()->__toString();
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
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Cuestionario
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Cuestionario
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set fechafin
     *
     * @param \DateTime $fechafin
     * @return Cuestionario
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    /**
     * Get fechafin
     *
     * @return \DateTime 
     */
    public function getFechafin()
    {
        return $this->fechafin;
    }

    /**
     * Set alumno
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $alumno
     * @return Cuestionario
     */
    public function setAlumno(\IES2Mares\TutoresBundle\Entity\Alumno $alumno = null)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get alumno
     *
     * @return \IES2Mares\TutoresBundle\Entity\Alumno
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * Set creador
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $creador
     * @return Cuestionario
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
     * Add profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Cuestionario
     */
    public function addProfesor(\IES2Mares\TutoresBundle\Entity\Profesor $profesor)
    {
        $this->profesor[] = $profesor;

        return $this;
    }

    /**
     * Remove profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     */
    public function removeProfesor(\IES2Mares\TutoresBundle\Entity\Profesor $profesor)
    {
        $this->profesor->removeElement($profesor);
    }

    /**
     * Get profesor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfesor()
    {
        return $this->profesor;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $preguntas;


    /**
     * Add preguntas
     *
     * @param \IES2Mares\TutoresBundle\Entity\Pregunta $preguntas
     * @return Cuestionario
     */
    public function addPregunta(\IES2Mares\TutoresBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas[] = $preguntas;

        return $this;
    }

    /**
     * Remove preguntas
     *
     * @param \IES2Mares\TutoresBundle\Entity\Pregunta $preguntas
     */
    public function removePregunta(\IES2Mares\TutoresBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas->removeElement($preguntas);
    }

    /**
     * Get preguntas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $preguntasincorporadas;


    /**
     * Add preguntasincorporadas
     *
     * @param \IES2Mares\TutoresBundle\Entity\preguntaincorporada $preguntasincorporadas
     * @return Cuestionario
     */
    public function addPreguntasincorporada(\IES2Mares\TutoresBundle\Entity\preguntaincorporada $preguntasincorporadas)
    {
        $this->preguntasincorporadas[] = $preguntasincorporadas;

        return $this;
    }

    /**
     * Remove preguntasincorporadas
     *
     * @param \IES2Mares\TutoresBundle\Entity\preguntaincorporada $preguntasincorporadas
     */
    public function removePreguntasincorporada(\IES2Mares\TutoresBundle\Entity\preguntaincorporada $preguntasincorporadas)
    {
        $this->preguntasincorporadas->removeElement($preguntasincorporadas);
    }

    /**
     * Get preguntasincorporadas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreguntasincorporadas()
    {
        return $this->preguntasincorporadas;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionariosasignados;


    /**
     * Add cuestionariosasignados
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionarioasignado $cuestionariosasignados
     * @return Cuestionario
     */
    public function addCuestionariosasignado(\IES2Mares\TutoresBundle\Entity\Cuestionarioasignado $cuestionariosasignados)
    {
        $this->cuestionariosasignados[] = $cuestionariosasignados;

        return $this;
    }

    /**
     * Remove cuestionariosasignados
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionarioasignado $cuestionariosasignados
     */
    public function removeCuestionariosasignado(\IES2Mares\TutoresBundle\Entity\Cuestionarioasignado $cuestionariosasignados)
    {
        $this->cuestionariosasignados->removeElement($cuestionariosasignados);
    }

    /**
     * Get cuestionariosasignados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCuestionariosasignados()
    {
        return $this->cuestionariosasignados;
    }

    /**
     * get Cuestionarioasignado segun Profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     */
    public function getCuestionarioasignadoSegunProfesor($profesor)
    {
        $cuestionariosAsignados = $this->cuestionariosasignados;
        foreach($cuestionariosAsignados as $cuestionarioAsignado){
            if($cuestionarioAsignado->getProfesor()->getId() == $profesor->getId()){
                $cuestionarioDeProfesor = $cuestionarioAsignado;
            }
        }
        return $cuestionarioDeProfesor;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profesores;


    /**
     * Add profesores
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesores
     * @return Cuestionario
     */
    public function addProfesore(\IES2Mares\TutoresBundle\Entity\Profesor $profesores)
    {
        $this->profesores[] = $profesores;

        return $this;
    }

    /**
     * Remove profesores
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesores
     */
    public function removeProfesore(\IES2Mares\TutoresBundle\Entity\Profesor $profesores)
    {
        $this->profesores->removeElement($profesores);
    }

    /**
     * Get profesores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfesores()
    {
        return $this->profesores;
    }
}
