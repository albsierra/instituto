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
use IES2Mares\TutoresBundle\Entity\Cuestionario;

class PreguntaincorporadaRepository extends EntityRepository{

    public function findPendientes($cuestionarioId, $profesor)
    {

        $query = $this->createQueryBuilder('create');
        $query->join('TutoresBundle:Respuesta', 'resp', 'WITH', 'resp.preguntaincorporada = '.$query->getRootAlias().'.id');
        $query->andWhere(
            $query->expr()->eq('resp.profesor', ':profesor' )
        );
        $query->setParameter('profesor', $profesor);
        $query->andWhere(
            $query->expr()->eq($query->getRootAlias().'.cuestionario', ':cuestionarioId' )
        );
        $query->setParameter('cuestionarioId', $cuestionarioId);
        $pregRespondidasArray = $query->getQuery()->getResult();

        $query = $this->createQueryBuilder('create');
        $query->join('TutoresBundle:Cuestionario', 'cuest', 'WITH', 'cuest.id = '.$query->getRootAlias().'.cuestionario');
        $query->andWhere(
            $query->expr()->eq('cuest.id', ':cuestionarioId' )
        );
        $query->setParameter('cuestionarioId', $cuestionarioId);
        $pregIncorporadasArray = $query->getQuery()->getResult();

        $preguntasSinResponder = array_diff($pregIncorporadasArray, $pregRespondidasArray);
        return current($preguntasSinResponder);
//        return  $this->findOneBy(array('cuestionario' => $cuestionarioId));
    }
}