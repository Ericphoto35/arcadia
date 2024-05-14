<?php

namespace App\Entity;

use App\Repository\AvisVisiteursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisVisiteursRepository::class)]
class AvisVisiteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Petitmot = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $Publication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getPetitmot(): ?string
    {
        return $this->Petitmot;
    }

    public function setPetitmot(?string $Petitmot): static
    {
        $this->Petitmot = $Petitmot;

        return $this;
    }

    public function getPublication(): ?string
    {
        return $this->Publication;
    }

    public function setPublication(?string $Publication): static
    {
        $this->Publication = $Publication;

        return $this;
    }
}
