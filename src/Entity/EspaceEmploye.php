<?php

namespace App\Entity;

use App\Repository\EspaceEmployeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspaceEmployeRepository::class)]
class EspaceEmploye
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?string $empvisite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $empfood = null;

    #[ORM\Column(nullable: true)]
    private ?int $empquantite = null;

    #[ORM\ManyToOne(inversedBy: 'espaceEmployes')]
    private ?Animals $empanimal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpvisite(): ?string
    {
        return $this->empvisite;
    }

    public function setEmpvisite(?string $empvisite): static
    {
        $this->empvisite = $empvisite;

        return $this;
    }

    public function getEmpfood(): ?string
    {
        return $this->empfood;
    }

    public function setEmpfood(?string $empfood): static
    {
        $this->empfood = $empfood;

        return $this;
    }

    public function getEmpquantite(): ?int
    {
        return $this->empquantite;
    }

    public function setEmpquantite(?int $empquantite): static
    {
        $this->empquantite = $empquantite;

        return $this;
    }

    public function getEmpanimal(): ?Animals
    {
        return $this->empanimal;
    }

    public function setEmpanimal(?Animals $empanimal): static
    {
        $this->empanimal = $empanimal;

        return $this;
    }
}
