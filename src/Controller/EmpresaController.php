<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Empresa;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Sector;



class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa/add", 
     * name="add")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sectores = $this->getDoctrine() ->getRepository(Sector::class) ->findAll();

        return $this->render('empresa/add.html.twig', [
            'controller_name' => 'EmpresaController',
            'sectores' => $sectores
        ]);
        
    }

    /**
     * @Route("/empresa", 
     * name="create_empresa", 
     * methods="POST")
     */
    public function createEmpresa(
        Request $request
    ):  Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createEmpresa(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $empresa = new Empresa();
        $empresa->setNombre($request->request->get("nombre"));
        $empresa->setEmail($request->request->get("email"));
        $empresa->setTelefono($request->request->get("telefono"));
        $sector = $this->getDoctrine()
        ->getRepository(Sector::class)
        ->find($request->request->get("sector"));

        $empresa->setSector($sector);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($empresa);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute("empresa_showall");
    }

     /**
     * @Route("/empresa/{id}", 
     * name="empresa_show")
     */
    public function show(int $id): Response
    {
        $empresa = $this->getDoctrine()
            ->getRepository(Empresa::class)
            ->find($id);

        if (!$empresa) {
            throw $this->createNotFoundException(
                'No encontro empresa con id '.$id
            );
        }
        // or render a template
        // in the template, print things with {{ empresa.name }}
        return $this->render('empresa/edit.html.twig', ['empresa' => $empresa]);
    }

     /**
     * @Route("/empresa", 
     * name="empresa_showall")
     */
    public function showAll(): Response
    {
        $empresas = $this->getDoctrine()
            ->getRepository(Empresa::class)
            ->findAll();

        // return new Response('Check out this great empresa: '.$empresa->getName());

        // or render a template
        // in the template, print things with {{ empresa.name }}
        return $this->render('empresa/show.html.twig', ['empresas' => $empresas]);
        
    }

    /**
     * @Route("/empresa/update/{id}", 
     * name="update_empresa", 
     * methods="POST")
     */
    public function updateEmpresa(
        int $id,
        Request $request

    ): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createEmpresa(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $empresa = $this->getDoctrine() ->getRepository(Empresa::class) ->find($id);
        $empresa->setNombre($request->request->get("nombre"));
        $empresa->setEmail($request->request->get("email"));
        $empresa->setTelefono($request->request->get("telefono"));
        $empresa->setSector($request->request->get("sector"));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($empresa);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute("empresa_showall");
    }

     /**
     * @Route("/empresa/delete/{id}", 
     * name="delete_empresa", 
     * methods="GET")
     */

    public function deleteEmpresa(
        int $id,
        Request $request
    ): Response
     {
        $empresa = $this->getDoctrine() ->getRepository(Empresa::class) ->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($empresa); 
        $entityManager->flush();

        return $this->redirectToRoute("empresa_showall");
    }
}
