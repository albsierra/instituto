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

class RespuestaRepository extends EntityRepository{

    public function findByCuestionarioIdProfesorId($cuestionarioId, $profesorId)
    {

        $query = $this->createQueryBuilder('respuestasByCuestionario');
        $query->join('TutoresBundle:Preguntaincorporada', 'prginc', 'WITH', 'prginc.id = '.$query->getRootAlias().'.preguntaincorporada');
        $query->andWhere(
            $query->expr()->eq('prginc.cuestionario', ':cuestionario' )
        );
        $query->setParameter('cuestionario', $cuestionarioId);
        $query->andWhere(
            $query->expr()->eq($query->getRootAlias().'.profesor', ':profesorId' )
        );
        $query->setParameter('profesorId', $profesorId);
        return $query->getQuery()->getResult();
    }

}