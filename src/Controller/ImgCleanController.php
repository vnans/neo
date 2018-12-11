<?php

namespace App\Controller;

use App\Entity\ImgClean;
use App\Form\ImgCleanType;
use App\Repository\ImgCleanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/img/clean")
 */
class ImgCleanController extends AbstractController
{
    /**
     * @Route("/", name="img_clean_index", methods="GET")
     */
    public function index(ImgCleanRepository $imgCleanRepository): Response
    {
        return $this->render('img_clean/index.html.twig', ['img_cleans' => $imgCleanRepository->findAll()]);
    }

    /**
     * @Route("/new", name="img_clean_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $imgClean = new ImgClean();
        $form = $this->createForm(ImgCleanType::class, $imgClean);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imgClean);
            $em->flush();

            return $this->redirectToRoute('img_clean_index');
        }

        return $this->render('img_clean/new.html.twig', [
            'img_clean' => $imgClean,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="img_clean_show", methods="GET")
     */
    public function show(ImgClean $imgClean): Response
    {
        return $this->render('img_clean/show.html.twig', ['img_clean' => $imgClean]);
    }

    /**
     * @Route("/{id}/edit", name="img_clean_edit", methods="GET|POST")
     */
    public function edit(Request $request, ImgClean $imgClean): Response
    {
        $form = $this->createForm(ImgCleanType::class, $imgClean);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('img_clean_index', ['id' => $imgClean->getId()]);
        }

        return $this->render('img_clean/edit.html.twig', [
            'img_clean' => $imgClean,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="img_clean_delete", methods="DELETE")
     */
    public function delete(Request $request, ImgClean $imgClean): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imgClean->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imgClean);
            $em->flush();
        }

        return $this->redirectToRoute('img_clean_index');
    }
}
