<?php

namespace IES2Mares\TutoresBundle\Entity;

use Application\Sonata\UserBundle\Entity\User as BaseUser;
#use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use IES2Mares\TutoresBundle\Entity\Profesor;


/**
 * Usuario
 */
class Usuario extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $tipousuario;

    /**
     * @var string
     */

    protected $google_id;
    /**
     * @var string
     */

    protected $google_access_token;

    /**
     * Returns a string representation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getApellidos().', '.$this->getNombre() ?: '-';
    }

    public function setTipousuario($tipousuario)
    {
        $this->tipousuario = $tipousuario;

        return $this;
    }

    /**
     * Get tipousuario
     *
     * @return string 
     */
    public function getTipousuario()
    {
        return $this->tipousuario;
    }


    public function setGoogleId($googleId)
    {
        $this->google_id = $googleId;

        return $this;
    }

    /**
     * Get GoogleAccessToken
     *
     * @return string
     */

    public function getGoogleId()
    {
        return $this->google_id;
    }

    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->google_access_token = $googleAccessToken;

        return $this;
    }

    /**
     * Get GoogleAccessToken
     *
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
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
     * @var \IES2Mares\TutoresBundle\Entity\Profesor
     */
    private $profesor;


    /**
     * Set profesor
     *
     * @param \IES2Mares\TutoresBundle\Entity\Profesor $profesor
     * @return Usuario
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
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $nombre;


    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
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
     * @return Usuario
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
}
