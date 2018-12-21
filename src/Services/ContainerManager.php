<?php
/**
 * Created by PhpStorm.
 * User: Laurie
 * Date: 21/12/2018
 * Time: 14:02
 */

namespace App\Services;

use Doctrine\ORM\EntityManager;

class ContainerManager
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAllContainer()
    {
        
    }

    public function findOneContainer()
    {

    }
}