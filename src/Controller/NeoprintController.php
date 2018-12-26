<?php

namespace App\Controller;

use App\Entity\Neoprint;
use App\Form\NeoprintType;
use App\Repository\NeoprintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/neoprint")
 */
class NeoprintController extends AbstractController
{
    /**
     * @Route("/", name="neoprint_index", methods="GET")
     */
    public function index(NeoprintRepository $neoprintRepository): Response
    {
        return $this->render('neoprint/index.html.twig', ['neoprints' => $neoprintRepository->findAll()]);
    }
    /**
     * @Route("/index2", name="neoprint_index2", methods="GET")
     */
    public function index2(NeoprintRepository $neoprintRepository): Response
    {
        return $this->render('neoprint/index2.html.twig', ['neoprints' => $neoprintRepository->findAll()]);
    }

    /**
     * @Route("/new", name="neoprint_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $neoprint = new Neoprint();
        $form = $this->createForm(NeoprintType::class, $neoprint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($neoprint);
            $em->flush();

            return $this->redirectToRoute('neoprint_index');
        }

        return $this->render('neoprint/new.html.twig', [
            'neoprint' => $neoprint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="neoprint_show", methods="GET")
     */
    public function show(Neoprint $neoprint): Response
    {
        return $this->render('neoprint/show.html.twig', ['neoprint' => $neoprint]);
    }

    /**
     * @Route("/{id}/edit", name="neoprint_edit", methods="GET|POST")
     */
    public function edit(Request $request, Neoprint $neoprint): Response
    {
        $form = $this->createForm(NeoprintType::class, $neoprint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('neoprint_index', ['id' => $neoprint->getId()]);
        }

        return $this->render('neoprint/edit.html.twig', [
            'neoprint' => $neoprint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="neoprint_delete", methods="DELETE")
     */
    public function delete(Request $request, Neoprint $neoprint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$neoprint->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($neoprint);
            $em->flush();
        }

        return $this->redirectToRoute('neoprint_index');
    }
}