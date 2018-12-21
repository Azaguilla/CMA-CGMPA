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

    public function findAllContainer($entity)
    {
        $containerRepository =  $this->em->getRepository('App:'.$entity);

        return $containerRepository->findAll();
    }

    public function findOneContainer($id)
    {
        $containerRepository =  $this->em->getRepository('App:Container');

        return $containerRepository->findOneBy(array('id' => $id));
    }

    public function findAllContainership()
    {
        $containerRepository =  $this->em->getRepository('App:Containership');

        return $containerRepository->findAll();
    }

    public function findOneContainership($id)
    {
        $var = "Containership";
        $containershipRepository =  $this->em->getRepository('App:'.$var);

        return $containershipRepository->findOneBy(array('id' => $id));
    }

    public function findAllProducts()
    {
        $productRepository =  $this->em->getRepository('App:Product');

        return $productRepository->findAll();
    }

    public function findOneProduct($id)
    {

        $productRepository =  $this->em->getRepository('App:Product');

        return $productRepository->findOneBy(array('id' => $id));
    }


}