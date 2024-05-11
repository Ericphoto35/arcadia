<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $servicenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $servicedescription = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $serviceimage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicenom(): ?string
    {
        return $this->servicenom;
    }

    public function setServicenom(?string $servicenom): static
    {
        $this->servicenom = $servicenom;

        return $this;
    }

    public function getServicedescription(): ?string
    {
        return $this->servicedescription;
    }

    public function setServicedescription(?string $servicedescription): static
    {
        $this->servicedescription = $servicedescription;

        return $this;
    }

    public function getServiceimage(): ?string
    {
        return $this->serviceimage;
    }

    public function setServiceimage(?string $serviceimage): static
    {
        $this->serviceimage = $serviceimage;

        return $this;
    }
}
