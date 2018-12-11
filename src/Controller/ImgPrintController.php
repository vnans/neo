<?php

namespace App\Controller;

use App\Entity\ImgPrint;
use App\Form\ImgPrintType;
use App\Repository\ImgPrintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/img/print")
 */
class ImgPrintController extends AbstractController
{
    /**
     * @Route("/", name="img_print_index", methods="GET")
     */
    public function index(ImgPrintRepository $imgPrintRepository): Response
    {
        return $this->render('img_print/index.html.twig', ['img_prints' => $imgPrintRepository->findAll()]);
    }

    /**
     * @Route("/new", name="img_print_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $imgPrint = new ImgPrint();
        $form = $this->createForm(ImgPrintType::class, $imgPrint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imgPrint);
            $em->flush();

            return $this->redirectToRoute('img_print_index');
        }

        return $this->render('img_print/new.html.twig', [
            'img_print' => $imgPrint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="img_print_show", methods="GET")
     */
    public function show(ImgPrint $imgPrint): Response
    {
        return $this->render('img_print/show.html.twig', ['img_print' => $imgPrint]);
    }

    /**
     * @Route("/{id}/edit", name="img_print_edit", methods="GET|POST")
     */
    public function edit(Request $request, ImgPrint $imgPrint): Response
    {
        $form = $this->createForm(ImgPrintType::class, $imgPrint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('img_print_index', ['id' => $imgPrint->getId()]);
        }

        return $this->render('img_print/edit.html.twig', [
            'img_print' => $imgPrint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="img_print_delete", methods="DELETE")
     */
    public function delete(Request $request, ImgPrint $imgPrint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imgPrint->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imgPrint);
            $em->flush();
        }

        return $this->redirectToRoute('img_print_index');
    }
}
