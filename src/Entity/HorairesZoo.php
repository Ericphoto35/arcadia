<?php

namespace App\Entity;

use App\Repository\HorairesZooRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesZooRepository::class)]
class HorairesZoo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $debut = null;

    #[ORM\Column(nullable: true)]
    private ?int $fin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebut(): ?int
    {
        return $this->debut;
    }

    public function setDebut(?int $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?int
    {
        return $this->fin;
    }

    public function setFin(?int $fin): static
    {
        $this->fin = $fin;

        return $this;
    }
}
