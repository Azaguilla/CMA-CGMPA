<?php

namespace App\Controller;

use App\Entity\Container;
use App\Entity\ContainerProduct;
use App\Entity\Containership;
use App\Entity\Product;
use App\Services\ContainerManager;
use App\Services\LimitService;
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
     * @Route("/container/{id}",
     *     requirements={"id": "\d+"})
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
     * @Route("/containership/{id}",
     *     requirements={"id": "\d+"})
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
     * @Route("/product/{id}",
     *     requirements={"id": "\d+"})
     */
    public function oneProduct($id, ContainerManager $containerManager)
    {
        $product = $containerManager->findOne($id, "Product");

        return $this->render('container/oneproduct.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/containership/new")
     */
    public function addContainership()
    {

        $containership = new Containership();

        $containership->setCaptainName("Mary");
        $containership->setContainerLimit("4553");
        $containership->setName("Bloody Mary");

        $em = $this->getDoctrine()->getManager();

        $em->persist($containership);

        $em->flush();

        return $this->render('container/index.html.twig');
    }

    /**
     * @Route("/container/new")
     */
    public function addContainer(ContainerManager $containerManager, LimitService $limitService)
    {
        $containership = $containerManager->findOne(2, "Containership");
        $containermodel = $containerManager->findOne(1, "ContainerModel");

        $container = new Container();

        $container->setColor("ECARLATE");
        $container->setContainerModel($containermodel);

        $testValidation = $limitService->limitContainership($containership);

        if ($testValidation == true)
        {
            $container->setContainership($containership);

            $em = $this->getDoctrine()->getManager();

            $em->persist($container);

            $em->flush();

            return $this->render('container/index.html.twig');
        }
        else
        {
            return $this->render('container/erreur.html.twig');
        }
    }

    /**
     * @Route("/product/new")
     */
    public function addProduct(ContainerManager $containerManager)
    {
        $product = new Product();

        $product->setName("Chocolat");
        $product->setHeight("999");
        $product->setLength("444");
        $product->setWidth("777");

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);

        $em->flush();

        return $this->render('container/index.html.twig');
    }


    /**
     * @Route("/product-container/new")
     */
    public function addProductContainer(ContainerManager $containerManager)
    {
        $product = $containerManager->findOne(1, "Product");
        $container = $containerManager->findOne(3, "Container");

        $containerproduct = new ContainerProduct();

        $containerproduct->setContainer($container);
        $containerproduct->setProduct($product);
        $containerproduct->setQuantity("65");

        $em = $this->getDoctrine()->getManager();

        $em->persist($containerproduct);

        $em->flush();

        return $this->render('container/index.html.twig');
    }

}