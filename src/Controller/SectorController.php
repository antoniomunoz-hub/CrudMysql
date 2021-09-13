<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sector;
use Symfony\Component\HttpFoundation\Request;


class SectorController extends AbstractController
{
    /**
     * @Route("/sector/add", 
     * name="add")
     */
    public function index(): Response
    {
        return $this->render('sector/add.html.twig', [
            'controller_name' => 'SectorController',
        ]);
    }

    /**
     * @Route("/sector", 
     * name="create_sector",
     * methods="POST")
     */
    public function createSector(
        Request $request
    ):  Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createsector(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $sector = new Sector();
        $sector->setNombre($request->request->get("nombre"));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($sector);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute("sector_showall");
    }

    /**
     * @Route("/sector/{id}", 
     * name="sector_show")
     */
    public function show(int $id): Response
    {
        $sector = $this->getDoctrine()
            ->getRepository(Sector::class)
            ->find($id);

        if (!$sector) {
            throw $this->createNotFoundException(
                'No encontro sector con id '.$id
            );
        }
        // or render a template
        // in the template, print things with {{ sector.name }}
        return $this->render('sector/edit.html.twig', ['sector' => $sector]);
    }

     /**
     * @Route("/sector", 
     * name="sector_showall")
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

    /**
     * @Route("/sector/update/{id}", 
     * name="update_sector", 
     * methods="POST")
     */
    public function updateSector(
        int $id,
        Request $request

    ): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createSector(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $sector = $this->getDoctrine() ->getRepository(Sector::class) ->find($id);
        $sector->setNombre($request->request->get("nombre"));


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($sector);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute("sector_showall");
    }

    /**
     * @Route("/sector/delete/{id}", 
     * name="delete_sector", 
     * methods="GET")
     */

    public function deleteSector(
        int $id,
        Request $request
    ): Response
     {
        $sector = $this->getDoctrine() ->getRepository(Sector::class) ->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($sector); 
        $entityManager->flush();

        return $this->redirectToRoute("sector_showall");
    }
}
