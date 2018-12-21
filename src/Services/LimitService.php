<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 21/12/2018
 * Time: 17:06
 */

namespace App\Services;


use App\Entity\Container;
use App\Entity\Containership;
use Doctrine\ORM\EntityManager;
class LimitService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function limitContainership(Containership $containership)
    {
        $repos = $this->em->getRepository('App:Container');

        $onecontainership = $repos->findBy(array("containership" => $containership->getId()));

        $nbcontainership = count($onecontainership);



        if($containership->getContainerLimit() <= $nbcontainership)
        {
            return false;
        }
        else
        {
            return true;
        }

    }
}