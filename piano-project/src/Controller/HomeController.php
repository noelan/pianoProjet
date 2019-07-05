<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index() : Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/piano", name ="piano")
     */
    public function showPiano()
    {
        return $this->render('pianoo.html.twig');
    }


    /**
     * @Route("/jeu/accord", name="jeu_accord")
     */
     public function jeuAccord() 
     {
        return $this->render('home/jeu/accord.html.twig');
     } 
}
