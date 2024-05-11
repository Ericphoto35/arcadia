<?php

namespace App\Entity;

use App\Repository\HabitatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatsRepository::class)]
class Habitats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $habitatnom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habitatdescription = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $habitatimage = null;

    /**
     * @var Collection<int, Animals>
     */
    #[ORM\OneToMany(targetEntity: Animals::class, mappedBy: 'habitatani')]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHabitatnom(): ?string
    {
        return $this->habitatnom;
    }

    public function setHabitatnom(?string $habitatnom): static
    {
        $this->habitatnom = $habitatnom;

        return $this;
    }

    public function getHabitatdescription(): ?string
    {
        return $this->habitatdescription;
    }

    public function setHabitatdescription(?string $habitatdescription): static
    {
        $this->habitatdescription = $habitatdescription;

        return $this;
    }

    public function getHabitatimage(): ?string
    {
        return $this->habitatimage;
    }

    public function setHabitatimage(?string $habitatimage): static
    {
        $this->habitatimage = $habitatimage;

        return $this;
    }

    /**
     * @return Collection<int, Animals>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animals $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setHabitatani($this);
        }

        return $this;
    }

    public function removeAnimal(Animals $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitatani() === $this) {
                $animal->setHabitatani(null);
            }
        }

        return $this;
    }
}
