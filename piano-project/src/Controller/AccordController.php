<?php

namespace App\Controller;

use App\Entity\Accord;
use App\Form\AccordType;
use App\Repository\AccordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accord")
 */
class AccordController extends AbstractController
{
    /**
     * @Route("/", name="accord_index", methods={"GET"})
     */
    public function index(AccordRepository $accordRepository): Response
    {
        return $this->render('accord/index.html.twig', [
            'accords' => $accordRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="accord_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $accord = new Accord();
        $form = $this->createForm(AccordType::class, $accord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accord);
            $entityManager->flush();

            return $this->redirectToRoute('accord_index');
        }

        return $this->render('accord/new.html.twig', [
            'accord' => $accord,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accord_show", methods={"GET"})
     */
    public function show(Accord $accord): Response
    {
        return $this->render('accord/show.html.twig', [
            'accord' => $accord,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="accord_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Accord $accord): Response
    {
        $form = $this->createForm(AccordType::class, $accord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accord_index', [
                'id' => $accord->getId(),
            ]);
        }

        return $this->render('accord/edit.html.twig', [
            'accord' => $accord,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accord_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Accord $accord): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accord->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($accord);
            $entityManager->flush();
        }

        return $this->redirectToRoute('accord_index');
    }
}
