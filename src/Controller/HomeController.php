<?php

namespace App\Controller;


use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use App\Repository\ContestRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(GameRepository $GameRepository,PlayerRepository $PlayerRepository,ContestRepository $contestRepository): Response
    {
        $games = $GameRepository->findAll();
        $players = $PlayerRepository->findAll();
        $contests = $contestRepository->findAll();

        return $this->render('home/index.html.twig', [
            'games' => $games,
            'players' => $players,
            'contests' => $contests,
        ]);
    }
   
    
}
