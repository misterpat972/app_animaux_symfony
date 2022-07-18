<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use App\Entity\Dispose;
use App\Entity\Famille;
use App\Entity\Personne;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Validator\Constraints\Length;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   


        // création des personnes
        $personne1 = new Personne();
        $personne1->setNom('milo');
        $manager->persist($personne1);

        $personne2 = new Personne();
        $personne2->setNom('tiya');
        $manager->persist($personne2);

        $personne3 = new Personne();
        $personne3->setNom('lili');
        $manager->persist($personne3);
      


        // creation de continents
        $continent1 = new Continent();
        $continent1->setLibelle('Europe');
        $manager->persist($continent1);
        $continent2 = new Continent();
        $continent2->setLibelle('Asie');
        $manager->persist($continent2);
        $continent3 = new Continent();
        $continent3->setLibelle('Afrique');
        $manager->persist($continent3);
        $continent4 = new Continent();
        $continent4->setLibelle('Océanie');
        $manager->persist($continent4);
        $continent5 = new Continent();
        $continent5->setLibelle('Amérique');
        $manager->persist($continent5);
            

        // création de familles d'animaux
        $famille1 = new Famille();
        $famille1->setLibelle('mammifère')
        ->setDescription('Animaux vertébrés nourissant leurs petits avec du lait');
        $manager->persist($famille1);
        // création de familles d'animaux
        $famille2 = new Famille();
        $famille2->setLibelle('reptile')
        ->setDescription('Animaux vertèbrés qui rampent');
        $manager->persist($famille2);
        // création de familles d'animaux
        $famille3 = new Famille();
        $famille3->setLibelle('poissons')
        ->setDescription('Animaux invertébrés du monde aquatique');
        // persistance de la famille d'animaux
        $manager->persist($famille3);


        // création d'animaux
        // création d'un animal
        $animal = new Animaux();
        $animal->setNom('Chien')
        ->setDescription('Ce chien est un animal de compagnie')
        ->setImage('chien.png')
        ->setPoids(20)
        ->setDangereux(false)
        ->setFamille($famille1)
        ->addContinent($continent1)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);
        // persistance de l'animal
        $manager->persist($animal);


        $animal2 = new Animaux();
        $animal2->setNom('Serpent')
        ->setDescription('animal dangeureux')
        ->setImage('serpent.png')
        ->setPoids(3)
        ->setDangereux(true)
        ->setFamille($famille2)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4);
        // persistance de l'animal
        $manager->persist($animal2);

        $animal3 = new Animaux();
        $animal3->setNom('Crocodile')
        ->setDescription('animal très dangeureux')
        ->setImage('crocodile.png')
        ->setPoids(100)
        ->setDangereux(true)
        ->setFamille($famille2)        
        ->addContinent($continent3)
        ->addContinent($continent4);
        // persistance de l'animal
        $manager->persist($animal3);

        $animal4 = new Animaux();
        $animal4->setNom('Requin')
        ->setDescription('animal marin très dangeureux')
        ->setImage('requin.png')
        ->setPoids(200)
        ->setDangereux(true)
        ->setFamille($famille3)
        ->addContinent($continent4)
        ->addContinent($continent5);
        // persistance de l'animal
        $manager->persist($animal4);

        $animal5 = new Animaux();
        $animal5->setNom('Cochon')
        ->setDescription('animal de compagnie')
        ->setImage('cochon.png')
        ->setPoids(90)
        ->setDangereux(false)
        ->setFamille($famille1)
        ->addContinent($continent1)
        ->addContinent($continent5);
        // persistance de l'animal
        $manager->persist($animal5);
        // $product = new Product();
        // $manager->persist($product);


        // ici on va créer dans la table d'association  dispose 1.n 1.n,  les associations entre les personnes et les animaux
        $dispose = new Dispose();
        $dispose->setPersonne($personne1)
        ->setAnimal($animal)
        ->setNb(3);
        $manager->persist($dispose);

        $dispose1 = new Dispose();
        $dispose1->setPersonne($personne2)
        ->setAnimal($animal2)
        ->setNb(1);
        $manager->persist($dispose1);

        $dispose3 = new Dispose();
        $dispose3->setPersonne($personne3)
        ->setAnimal($animal3)
        ->setNb(2);
        $manager->persist($dispose3);

        $dispose4 = new Dispose();
        $dispose4->setPersonne($personne1)
        ->setAnimal($animal4)
        ->setNb(1);
        $manager->persist($dispose4);

        $dispose5 = new Dispose();
        $dispose5->setPersonne($personne3)
        ->setAnimal($animal5)
        ->setNb(4);
        $manager->persist($dispose5);

       


        $manager->flush();
    }
}
