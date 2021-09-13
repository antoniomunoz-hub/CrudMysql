<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sector;

class SectorController extends AbstractController
{
    // /**
    //  * @Route("/sector", name="sector")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('sector/index.html.twig', [
    //         'controller_name' => 'sectorController',
    //     ]);
    // }

    /**
     * @Route("/sector", name="create_sector")
     */
    public function createSector(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createsector(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $sector = new Sector();
        $sector->setNombre('Construccion');
    

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($sector);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$sector->getId());
    }

     /**
     * @Route("/sectores", name="sectores_showall")
     */
    public function showAll(): Response
    {
        $sectores = $this->getDoctrine()
            ->getRepository(Sector::class)
            ->findAll();

        // return new Response('Check out this great sector: '.$sector->getName());

        // or render a template
        // in the template, print things with {{ sector.name }}
        return $this->render('sector/show.html.twig', ['sectores' => $sectores]);
        
    }
}
