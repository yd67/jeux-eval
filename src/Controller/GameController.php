<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\GameRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }
    /**
     * @Route("/game/create", name="game_create")
     */
    public function createGame(GameRepository $GameRepository)
    {
    $game = new Player();
    $form = $this->createForm(gameType::class, $game);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        if ($form->isValid()) {
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($game);
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
    return $this->render('form/game.html.twig', [
        
        'gameForm' => $form->createView()
    ]);
    }
}
