<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Form\CommandesType;
use App\Repository\CommandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;

/**
 * @Route("/commandes")
 */
class CommandesController extends AbstractController
{
    /**
     * @Route("/", name="commandes_index", methods="GET")
     */
    public function index(CommandesRepository $commandesRepository): Response
    {
        return $this->render('commandes/index.html.twig', ['commandes' => $commandesRepository->findAll()]);
    }

    /**
     * @Route("/new/{id}", name="commandes_new", methods="GET|POST")
     */
    public function new(Request $request , Articles $article): Response
    {
        $commande = new Commandes();
        $form = $this->createForm(CommandesType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();


            $this->addFlash('infoInscrit','Commande enrégistrée');

            return $this->redirectToRoute('articles_index');
        }

         return $this->render('commandes/new.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
            'article' => $article
        ]);

    }

    /**
     * @Route("/{id}", name="commandes_show", methods="GET")
     */
    public function show(Commandes $commande): Response
    {
        return $this->render('commandes/show.html.twig', ['commande' => $commande]);
    }

    /**
     * @Route("/{id}/edit", name="commandes_edit", methods="GET|POST")
     */
    public function edit(Request $request, Commandes $commande): Response
    {
        $form = $this->createForm(CommandesType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commandes_index', ['id' => $commande->getId()]);
        }

        return $this->render('commandes/edit.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commandes_delete", methods="DELETE")
     */
    public function delete(Request $request, Commandes $commande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
        }

        return $this->redirectToRoute('commandes_index');
    }
}
