<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accord;

/**
 *@Route("/admin")
 */ 
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_index")
     */
    public function index() : Response
    {   
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/piano", name ="piano")
     */
    public function showPiano()
    {
        return $this->render('pianoo.html.twig');
    }

}
