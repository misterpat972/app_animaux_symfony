<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Repository\AnimauxRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(AnimauxRepository $animauxRepository ): Response
    {   
        $animaux = $animauxRepository->findBy([], ['id' => 'DESC'], 3);
        return $this->render('accueil/accueil.html.twig', [
            'animaux' => $animaux,
        ]);
    }

    #[Route('/animaux', name: 'animaux')]
    public function animaux(AnimauxRepository $animauxRepository ): Response
    {   
        $animaux = $animauxRepository->findAll();       
        return $this->render('animal/animales.html.twig', [
            'animaux' => $animaux,
        ]);
    }

    // /**
    //  * @Route("/animal/{id}", name="afficher_animal")
    //  */
    // pour récupérer un animal en particulier id est le paramètre de l'url //
    // public function animal( AnimalRepository $animalRepository, $id): Response
    // {   
    //     // récupération un animal en base de données
    //    $animal = $animalRepository->find($id);       
    //     return $this->render('animal/animale.html.twig', [
    //         'animal' =>  $animal,
    //     ]);
    // }


     //deuxieme methode pour récupérer un animal en particulier id est le paramètre de l'url //   
    #[Route('/animal/{id}', name: 'afficher_animal')]
    public function animal( Animaux $animal ): Response
    {   
        return $this->render('animal/animale.html.twig', [
            'animal' =>  $animal,
        ]);
    }

    // #[Route('/familles', name: 'afficher_famille')]
    // public function famille(): Response
    // {   
        
    //     return $this->render('animal/accueil.html.twig', [
    //         'afficher_famille' => $famille,
    //     ]);
    // }
}
