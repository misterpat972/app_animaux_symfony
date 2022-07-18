<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContinentController extends AbstractController
{
    #[Route('/continents', name: 'continents')]
    public function index( ContinentRepository $continentRepository): Response
    {
       $continents = $continentRepository->findAll();       
        return $this->render('continent/continents.html.twig', [
            'continents' => $continents,
        ]);
    }

    #[Route('/continent/{id}', name: 'afficher_continent')]
    public function afficher_continent( Continent $continent): Response
    {
          
       
        return $this->render('continent/continent.html.twig', [
            'continent' => $continent,
        ]);
    }
}
