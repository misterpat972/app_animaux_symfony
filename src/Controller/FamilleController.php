<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    #[Route('/familles', name: 'familles')]
    public function index( FamilleRepository $familleRepository): Response
    {
        $familles = $familleRepository->findAll();
        return $this->render('famille/familles.html.twig', [
            'familles' => $familles,
        ]);
    }

    #[Route('/famille/{id}', name: 'afficher_famille')]
    public function famille( Famille $famille): Response  
    {
        return $this->render('famille/afficherFamille.html.twig', [
            'famille' => $famille,
        ]);
    }
}
