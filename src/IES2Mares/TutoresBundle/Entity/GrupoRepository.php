<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 26/01/15
 * Time: 12:56
 */

namespace IES2Mares\TutoresBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GrupoRepository extends EntityRepository{
    public function findOneByAnyosubgrupo($subgrupo)
    {
        return $this->findOneBy(ARRAY('subgrupo' => $subgrupo), array('anyo'=>'DESC'));
    }

}