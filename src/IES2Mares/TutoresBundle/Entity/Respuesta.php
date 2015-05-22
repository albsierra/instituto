<?php

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuesta
 */
class Respuesta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $valor;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $profesor;

    /**
     * @var \IES2Mares\TutoresBundle\Entity\Preguntaincorporada
     */
    private $preguntaincorporada;

    /**
     *
     * @return string
     */
    public function __toString(){
        return ''.$this->getValor();
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
     * Set valor
     *
     * @param integer $valor
     * @return Respuesta
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Get valorString
     *
     * @return string
     */
    public function getValorString()
    {
        $valorString = $this->valor;
        if($this->getPreguntaincorporada()->getPregunta()->getTipo() == 'niveles'){
            switch ($this->getValor()){
                case 0: $valorString = 'Alto'; break;
                case 1: $valorString = 'Medio'; break;
                case 2: $valorString = 'Bajo'; break;
            }
        }

        return (string) $valorString;
    }

    /**
     * Set profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Respuesta
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
     * Set preguntaincorporada
     *
     * @param \IES2Mares\TutoresBundle\Entity\Preguntaincorporada $preguntaincorporada
     * @return Respuesta
     */
    public function setPreguntaincorporada(\IES2Mares\TutoresBundle\Entity\Preguntaincorporada $preguntaincorporada = null)
    {
        $this->preguntaincorporada = $preguntaincorporada;

        return $this;
    }

    /**
     * Get preguntaincorporada
     *
     * @return \IES2Mares\TutoresBundle\Entity\Preguntaincorporada
     */
    public function getPreguntaincorporada()
    {
        return $this->preguntaincorporada;
    }

    /**
     * Get alumno
     *
     * @return \IES2Mares\TutoresBundle\Entity\Alumno
     */
    public function getAlumno()
    {
        return $this->getPreguntaincorporada()->getCuestionario()->getAlumno();
    }

}
