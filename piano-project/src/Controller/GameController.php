<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Accord;


/**
 * @Route("jeu",)
 */

class GameController extends AbstractController
{   

    /**
      * @Route("/findChords/index", name="findChords_index")
      */
      public function index() 
      {
        return $this->render('home/jeu/index.html.twig');
      }
        
    /**
     * @Route("/findChords/{mode}", name="findChords")
     */ 
    // Trouver un accord par rapport a son mode
     public function findChord(SerializerInterface $serializer, $mode) 
     {  
        // $majorChords = $this->getDoctrine()
        //                ->getRepository(Accord::class)
        //                // ->findBy(['mode' => 'Majeur']);  
        //                ->findAllChords();
        // $chordsSerialized = $serializer->serialize($majorChords, 'json');
        $mode = $serializer->serialize($mode, 'json');  
        return $this->render('home/jeu/accord.html.twig', ['mode' => $mode]);
     }
}
