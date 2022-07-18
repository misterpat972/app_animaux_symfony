<?php

namespace App\Controller;

use App\Entity\Dispose;
use App\Entity\Personne;
use App\Repository\DisposeRepository;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{   // affichage de la liste des personnes
    #[Route('/personnes', name: 'personnes')]
    public function index( PersonneRepository $personneRepository ): Response
    {              
        $personnes = $personneRepository->findAll();        
        return $this->render('personne/personnes.html.twig', [
            "personnes" => $personnes,
        ]);
    }

    // affichage d'une personne
    #[Route('/personne/{id}', name: 'afficher_personne')]
    public function personne( Personne $personne ): Response
    {              
           return $this->render('personne/personne.html.twig', [
            "personne" => $personne,
        ]);
    }
}
