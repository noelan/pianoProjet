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
     * @Route("/majorChords", name="jeu_majorChords")
     */ 
     public function findMajorChord(SerializerInterface $serializer) 
     {  
        $majorChords = $this->getDoctrine()
                       ->getRepository(Accord::class)
                       // ->findBy(['mode' => 'Majeur']);  
                       ->findAllChords();
        $chordsSerialized = $serializer->serialize($majorChords, 'json');             
        return $this->render('home/jeu/accord.html.twig', ['majorChords' => $chordsSerialized]);
     } 
}
