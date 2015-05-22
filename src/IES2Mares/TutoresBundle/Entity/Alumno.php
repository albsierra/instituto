<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 */
class Alumno
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dni;

    /**
     * @var string
     */
    private $apellido1;

    /**
     * @var string
     */
    private $apellido2;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \DateTime
     */
    private $fechanac;

    /**
     * @var string
     */
    private $movil;

    /**
     * @var string
     */
    private $padre;

    /**
     * @var string
     */
    private $madre;

    /**
     * @var string
     */
    private $telcasa;

    /**
     * @var string
     */
    private $movilpadre;

    /**
     * @var string
     */
    private $movilmadre;

    /**
     * @var string
     */
    private $domicilio;

    /**
     * @var string
     */
    private $cp;

    /**
     * @var string
     */
    private $localidad;

    /**
     * @var string
     */
    private $provincia;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Usuario
     */
    private $idusuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grupos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * to String
     */
    public function __toString()
    {
        return $this->getApellido1(). ' '.$this->getApellido2(). ', '.$this->getNombre();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Alumno
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set dni
     *
     * @param string $dni
     * @return Alumno
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
     * Set apellido1
     *
     * @param string $apellido1
     * @return Alumno
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     * @return Alumno
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Alumno
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
     * Set fechanac
     *
     * @param \DateTime $fechanac
     * @return Alumno
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime 
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Set movil
     *
     * @param string $movil
     * @return Alumno
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
     * Set padre
     *
     * @param string $padre
     * @return Alumno
     */
    public function setPadre($padre)
    {
        $this->padre = $padre;

        return $this;
    }

    /**
     * Get padre
     *
     * @return string 
     */
    public function getPadre()
    {
        return $this->padre;
    }

    /**
     * Set madre
     *
     * @param string $madre
     * @return Alumno
     */
    public function setMadre($madre)
    {
        $this->madre = $madre;

        return $this;
    }

    /**
     * Get madre
     *
     * @return string 
     */
    public function getMadre()
    {
        return $this->madre;
    }

    /**
     * Set telcasa
     *
     * @param string $telcasa
     * @return Alumno
     */
    public function setTelcasa($telcasa)
    {
        $this->telcasa = $telcasa;

        return $this;
    }

    /**
     * Get telcasa
     *
     * @return string 
     */
    public function getTelcasa()
    {
        return $this->telcasa;
    }

    /**
     * Set movilpadre
     *
     * @param string $movilpadre
     * @return Alumno
     */
    public function setMovilpadre($movilpadre)
    {
        $this->movilpadre = $movilpadre;

        return $this;
    }

    /**
     * Get movilpadre
     *
     * @return string 
     */
    public function getMovilpadre()
    {
        return $this->movilpadre;
    }

    /**
     * Set movilmadre
     *
     * @param string $movilmadre
     * @return Alumno
     */
    public function setMovilmadre($movilmadre)
    {
        $this->movilmadre = $movilmadre;

        return $this;
    }

    /**
     * Get movilmadre
     *
     * @return string 
     */
    public function getMovilmadre()
    {
        return $this->movilmadre;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Alumno
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Alumno
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return Alumno
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Alumno
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set idusuario
     *
     * @param \IES2Mares\TutoresBundle\Entity\Usuario $idusuario
     * @return Alumno
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grupos;

    /**
     * Add grupos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Grupo $grupos
     * @return Alumno
     */
    public function addGrupo(\IES2Mares\TutoresBundle\Entity\Grupo $grupos)
    {
        $this->grupos[] = $grupos;

        return $this;
    }

    /**
     * Remove grupos
     *
     * @param \IES2Mares\TutoresBundle\Entity\Grupo $grupos
     */
    public function removeGrupo(\IES2Mares\TutoresBundle\Entity\Grupo $grupos)
    {
        $this->grupos->removeElement($grupos);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrupos()
    {
        return $this->grupos;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $materias;


    /**
     * Add materias
     *
     * @param \IES2Mares\TutoresBundle\Entity\Materia $materias
     * @return Alumno
     */
    public function addMateria(\IES2Mares\TutoresBundle\Entity\Materia $materias)
    {
        $this->materias[] = $materias;

        return $this;
    }

    /**
     * Remove materias
     *
     * @param \IES2Mares\TutoresBundle\Entity\Materia $materias
     */
    public function removeMateria(\IES2Mares\TutoresBundle\Entity\Materia $materias)
    {
        $this->materias->removeElement($materias);
    }

    /**
     * Get materias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaterias()
    {
        return $this->materias;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profesores;


    /**
     * Add profesores
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesores
     * @return Alumno
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cuestionarios;


    /**
     * Add cuestionarios
     *
     * @param \IES2Mares\TutoresBundle\Entity\Cuestionario $cuestionarios
     * @return Alumno
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

    public function getCuestionariosAbiertos()
    {
        $cuestionarios = $this->getCuestionarios();
        foreach ($cuestionarios as $cuestionario) {
            if($cuestionario->getFechafin() < new \DateTime()) {
                $cuestionarios->removeElement($cuestionario);
            }
        }
        return $cuestionarios;
    }
}
