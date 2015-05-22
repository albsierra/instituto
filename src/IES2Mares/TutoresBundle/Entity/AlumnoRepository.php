<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 26/01/15
 * Time: 12:56
 */

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use IES2Mares\TutoresBundle\Entity\Profesor;

class AlumnoRepository extends EntityRepository{
// TODO tener en cuenta el curso
    public function findByTutor(Profesor $profesor)
    {
        $alumnosTutoria = new ArrayCollection();
        if($grupoTutoria = $profesor->getTutoria()->last())
        {
            $alumnosTutoria = $grupoTutoria->getAlumnos();
        }
        return $alumnosTutoria;
    }
}