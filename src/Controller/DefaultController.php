<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }
     /**
     * @Route("/contact", name="contact")
     */
    public function contact() 
    {
    	return $this->render('default/contact.html.twig');
    }
    /**
     * @Route("/admin", name="admin")
     */
public function admin()
{
    return $this->render('default/admin.html.twig');
}
}
