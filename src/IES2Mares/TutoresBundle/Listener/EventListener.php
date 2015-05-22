<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 30/01/15
 * Time: 23:22
 */

namespace IES2Mares\TutoresBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use IES2Mares\TutoresBundle\Entity\Usuario;
use IES2Mares\TutoresBundle\Entity\Cuestionario;
use DateTime, DateInterval;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Container;


class EventListener {

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        $dominio = $this->container->getParameter('dominio');
        //  "Usuario" entity
        if ($entity instanceof Usuario && (substr_compare($entity->getEmail(), $dominio , strlen($dominio)*(-1)) === 0))
        {
            $repositorio = $entityManager->getRepository("TutoresBundle:Profesor");
            $profesor = $repositorio->findOneBy(array(
                'email' => $entity->getEmail()
            ));
            if($profesor){
                $entity->setTipousuario("P");
                if($profesor->getEmail() == $this->container->getParameter('superadmin')){
                    $entity->addRole("ROLE_SUPER_ADMIN");
                } else {
                    $entity->addRole("ROLE_PROFESOR");
                }
                $profesor->setIdusuario($entity);
            }
            $entityManager->flush($profesor);
        }
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        //  "Cuestionario" entity
        if ($entity instanceof Cuestionario && !$entity->getFechafin())
        {
            $fechaFin = new DateTime();
            $fechaFin->add(new DateInterval('P10D'));

            $entity->setFechafin($fechaFin);
        }
    }

}