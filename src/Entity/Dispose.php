<?php

namespace App\Entity;

use App\Repository\DisposeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: DisposeRepository::class)]
// ici pour relier la une seul Personne a un animal il faut utiliser [UniqueEntity] et relier le champ personne au champ animal :
#[UniqueEntity(fields: ["personne", "Animal"])]

class Dispose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'disposes')]
    private ?Animaux $animal = null;

    #[ORM\ManyToOne(inversedBy: 'disposes')]
    private ?Personne $personne = null;

    #[ORM\Column]
    private ?int $nb = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animaux
    {
        return $this->animal;
    }

    public function setAnimal(?Animaux $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getNb(): ?int
    {
        return $this->nb;
    }

    public function setNb(int $nb): self
    {
        $this->nb = $nb;

        return $this;
    }
}
