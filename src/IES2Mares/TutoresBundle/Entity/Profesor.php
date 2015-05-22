<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesor
 */
class Profesor
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $dni;

    /**
     * @var string
     */
    private $movil;

    /**
     * @var string
     */
    private $departamento;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Usuario
     */
    private $idusuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cuestionario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * to String
     */
    public function __toString()
    {
        return $this->getApellidos(). ', '.$this->getNombre();
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Profesor
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Profesor
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Profesor
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
     * Set dni
     *
     * @param string $dni
     * @return Profesor
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set movil
     *
     * @param string $movil
     * @return Profesor
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get movil
     *
     * @return string 
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return Profesor
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set idusuario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Usuario $idusuario
     * @return Profesor
     */
    public function setIdusuario(\IES2Mares\TutoresBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \IES2Mares\TutoresBundle\Entity\Usuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Add cuestionario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario
     * @return Profesor
     */
    public function addCuestionario(\IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario)
    {
        $this->cuestionario[] = $cuestionario;

        return $this;
    }

    /**
     * Remove cuestionario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario
     */
    public function removeCuestionario(\IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionario)
    {
        $this->cuestionario->removeElement($cuestionario);
    }

    /**
     * Get cuestionario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCuestionario()
    {
        return $this->cuestionario;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tutoria;


    /**
     * Add tutoria
     *
     * @param \IES2Mares\TutoresBundle\Entity\Grupo $tutoria
     * @return Profesor
     */
    public function addTutorium(\IES2Mares\TutoresBundle\Entity\Grupo $tutoria)
    {
        $this->tutoria[] = $tutoria;

        return $this;
    }

    /**
     * Remove tutoria
     *
     * @param \IES2Mares\TutoresBundle\Entity\Grupo $tutoria
     */
    public function removeTutorium(\IES2Mares\TutoresBundle\Entity\Grupo $tutoria)
    {
        $this->tutoria->removeElement($tutoria);
    }

    /**
     * Get tutoria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTutoria()
    {
        return $this->tutoria;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $alumnos;


    /**
     * Add alumnos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Alumno $alumnos
     * @return Profesor
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
     * @var string
     */
    private $email;


    /**
     * Set email
     *
     * @param string $email
     * @return Profesor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionariosasignados;


    /**
     * Add cuestionariosasignados
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionarioasignado $cuestionariosasignados
     * @return Profesor
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionarios;


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
