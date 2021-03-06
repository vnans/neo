<?php

namespace App\Controller;

use App\Entity\Neoclean;
use App\Form\NeocleanType;
use App\Repository\NeocleanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;

/**
 * @Route("/neoclean")
 */
class NeocleanController extends AbstractController
{
    /**
     * @Route("/", name="neoclean_index", methods="GET")
     */
    public function index(NeocleanRepository $neocleanRepository): Response
    {
        return $this->render('neoclean/index.html.twig', ['neocleans' => $neocleanRepository->findAll()]);
    }
     /**
     * @Route("/index2", name="neoclean_index2", methods="GET")
     */
    public function index2(NeocleanRepository $neocleanRepository): Response
    {
        return $this->render('neoclean/index2.html.twig', ['neocleans' => $neocleanRepository->findAll()]);
    }

    /**
     * @Route("/new", name="neoclean_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $neoclean = new Neoclean();
        $form = $this->createForm(NeocleanType::class, $neoclean);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $neoclean->getImage();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName);
            $neoclean->setImage($fileName); 

            $em = $this->getDoctrine()->getManager();
            $em->persist($neoclean);
            $em->flush();

            return $this->redirectToRoute('neoclean_index');
        }







        return $this->render('neoclean/new.html.twig', [
            'neoclean' => $neoclean,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="neoclean_show", methods="GET")
     */
    public function show(Neoclean $neoclean): Response
    {
        return $this->render('neoclean/show.html.twig', ['neoclean' => $neoclean]);
    }

    /**
     * @Route("/{id}/edit", name="neoclean_edit", methods="GET|POST")
     */
    public function edit(Request $request, Neoclean $neoclean): Response
    {
        $form = $this->createForm(NeocleanType::class, $neoclean);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $neoclean->getImage();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName);
            $neoclean->setImage($fileName); 

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('neoclean_index', ['id' => $neoclean->getId()]);
        }

        return $this->render('neoclean/edit.html.twig', [
            'neoclean' => $neoclean,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="neoclean_delete", methods="DELETE")
     */
    public function delete(Request $request, Neoclean $neoclean): Response
    {
        if ($this->isCsrfTokenValid('delete'.$neoclean->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($neoclean);
            $em->flush();
        }

        return $this->redirectToRoute('neoclean_index');
    }
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
