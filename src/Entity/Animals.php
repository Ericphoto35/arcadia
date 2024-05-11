<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Vetvisit>
     */
    #[ORM\OneToMany(targetEntity: Vetvisit::class, mappedBy: 'vetvisitanimal')]
    private Collection $vetvisits;

    /**
     * @var Collection<int, EspaceEmploye>
     */
    #[ORM\OneToMany(targetEntity: EspaceEmploye::class, mappedBy: 'empanimal')]
    private Collection $espaceEmployes;

    public function __construct()
    {
        $this->vetvisits = new ArrayCollection();
        $this->espaceEmployes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Vetvisit>
     */
    public function getVetvisits(): Collection
    {
        return $this->vetvisits;
    }

    public function addVetvisit(Vetvisit $vetvisit): static
    {
        if (!$this->vetvisits->contains($vetvisit)) {
            $this->vetvisits->add($vetvisit);
            $vetvisit->setVetvisitanimal($this);
        }

        return $this;
    }

    public function removeVetvisit(Vetvisit $vetvisit): static
    {
        if ($this->vetvisits->removeElement($vetvisit)) {
            // set the owning side to null (unless already changed)
            if ($vetvisit->getVetvisitanimal() === $this) {
                $vetvisit->setVetvisitanimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EspaceEmploye>
     */
    public function getEspaceEmployes(): Collection
    {
        return $this->espaceEmployes;
    }

    public function addEspaceEmploye(EspaceEmploye $espaceEmploye): static
    {
        if (!$this->espaceEmployes->contains($espaceEmploye)) {
            $this->espaceEmployes->add($espaceEmploye);
            $espaceEmploye->setEmpanimal($this);
        }

        return $this;
    }

    public function removeEspaceEmploye(EspaceEmploye $espaceEmploye): static
    {
        if ($this->espaceEmployes->removeElement($espaceEmploye)) {
            // set the owning side to null (unless already changed)
            if ($espaceEmploye->getEmpanimal() === $this) {
                $espaceEmploye->setEmpanimal(null);
            }
        }

        return $this;
    }
}
