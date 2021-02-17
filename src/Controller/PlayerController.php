<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{
    /**
     * @Route("/player", name="player")
     */
    public function index(PlayerRepository $PlayerRepository): Response
    {
        $players = $PlayerRepository->findAll();

        return $this->render('player/player.html.twig', [
            'players' => $players,
        ]);
    }
     /**
     * @Route("/player/", name="player_create")
     */
    public function addPlayer(Request $request)
    {
        $player = new Player();
        $form = $this->createForm(playersType::class, $player);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($player);
                $manager->flush();
                $this->addFlash(
                    'success',
                    'Le joueur bien été ajoutée.'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue lors de l\'ajout du joueur '
                );
            }
        }
        return $this->render('form/player.html.twig', [
            'playerForm' => $form->createView()
        ]);
    }
    
}
