<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $prenomani = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $raceani = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $imageani = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?habitats $habitatani = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomani(): ?string
    {
        return $this->prenomani;
    }

    public function setPrenomani(?string $prenomani): static
    {
        $this->prenomani = $prenomani;

        return $this;
    }

    public function getRaceani(): ?string
    {
        return $this->raceani;
    }

    public function setRaceani(?string $raceani): static
    {
        $this->raceani = $raceani;

        return $this;
    }

    public function getImageani(): ?string
    {
        return $this->imageani;
    }

    public function setImageani(?string $imageani): static
    {
        $this->imageani = $imageani;

        return $this;
    }

    public function getHabitatani(): ?habitats
    {
        return $this->habitatani;
    }

    public function setHabitatani(?habitats $habitatani): static
    {
        $this->habitatani = $habitatani;

        return $this;
    }
}
