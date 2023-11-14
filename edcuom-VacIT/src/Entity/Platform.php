<?php

namespace App\Entity;

use App\Repository\PlatformRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatformRepository::class)]
class Platform
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\ManyToMany(targetEntity: Vacancies::class, mappedBy: 'platform')]
    private Collection $vacancies;

    public function __construct()
    {
        $this->vacancies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection<int, Vacancies>
     */
    public function getVacancies(): Collection
    {
        return $this->vacancies;
    }

    public function addVacancy(Vacancies $vacancy): static
    {
        if (!$this->vacancies->contains($vacancy)) {
            $this->vacancies->add($vacancy);
            $vacancy->addPlatform($this);
        }

        return $this;
    }

    public function removeVacancy(Vacancies $vacancy): static
    {
        if ($this->vacancies->removeElement($vacancy)) {
            $vacancy->removePlatform($this);
        }

        return $this;
    }

}
