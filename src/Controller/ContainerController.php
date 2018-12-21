<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
     * @Route("/container"
     */
    public function listContainer()
    {


        return $this->render('container/index.html.twig', [
            'controller_name' => 'ContainerController',
        ]);
    }

    /**
     * @Route("/container/{id}")
     */
    public function oneContainer($id)
    {
        return $this->render('container/index.html.twig', [
            'id' => $id,
        ]);
    }

    /**
     * @Route("/containership")
     */
    public function containerShip()
    {
        return $this->render('container/index.html.twig', [

        ]);
    }

    /**
     * @Route("/containership/{id}")
     */
    public function oneContainerShip($id)
    {
        return $this->render('container/index.html.twig', [
            'id' => $id,
        ]);
    }

    /**
     * @Route("/product")
     */
    public function product()
    {
        return $this->render('container/index.html.twig', [

        ]);
    }

    /**
     * @Route("/product/{id}")
     */
    public function oneProduct($id)
    {
        return $this->render('container/index.html.twig', [
            'id' => $id,
        ]);
    }

}
