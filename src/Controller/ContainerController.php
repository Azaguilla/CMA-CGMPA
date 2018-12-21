<?php

namespace App\Controller;

use App\Services\ContainerManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
     * @Route("")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function index()
    {
        return $this->render('container/index.html.twig');
    }

    /**
     * @Route("/container")
     * @param ContainerManager $containerManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listContainer(ContainerManager $containerManager)
    {
        $listContainer = $containerManager->findAll("Container");


        return $this->render('container/containers.html.twig', [
            'listContainer' => $listContainer,
        ]);
    }

    /**
     * @Route("/container/{id}")
     */
    public function oneContainer($id, ContainerManager $containerManager)
    {
        $container = $containerManager->findOne($id, "Container");

        return $this->render('container/onecontainer.html.twig', [
            'container' => $container,
        ]);
    }

    /**
     * @Route("/containership")
     */
    public function containerShip(ContainerManager $containerManager)
    {
        $listContainer = $containerManager->findAll("Containership");

        return $this->render('container/containership.html.twig', [
            'listContainer' => $listContainer,
        ]);
    }

    /**
     * @Route("/containership/{id}")
     */
    public function oneContainerShip($id, ContainerManager $containerManager)
    {
        $container = $containerManager->findOne($id, "Containership");

        return $this->render('container/onecontainership.html.twig', [
            'containership' => $container,
        ]);
    }

    /**
     * @Route("/product")
     */
    public function product(ContainerManager $containerManager)
    {
        $products = $containerManager->findAll("Product");

        return $this->render('container/products.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/{id}")
     */
    public function oneProduct($id, ContainerManager $containerManager)
    {
        $product = $containerManager->findOne($id, "Product");

        return $this->render('container/oneproduct.html.twig', [
            'product' => $product,
        ]);
    }

}
