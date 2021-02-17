<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContestController extends AbstractController
{
    /**
     * @Route("/contest", name="contest")
     */
    public function index(): Response
    {
        return $this->render('contest/index.html.twig', [
            'controller_name' => 'ContestController',
        ]);
    }
    /**
     * @Route("/contest/create", name="contest_create")
     */
    public function createcontest(ContestRepository $ContestRepository)
    {
    $contest = new Player();
    $form = $this->createForm(contestType::class, $contest);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        if ($form->isValid()) {
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($contest);
            $manager->flush();
            $this->addFlash(
                'success',
                'Le joueur bien été ajoutée.'
            );
        } else {
            $this->addFlash(
                'danger',
                'Une erreur est survenue lors de l\'ajout du jeux '
            );
        }
    }
    return $this->render('form/contest.html.twig', [
        
        'contestForm' => $form->createView()
    ]);
    }
}
