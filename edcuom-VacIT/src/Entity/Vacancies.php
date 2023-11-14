<?php

namespace App\Entity;

use App\Repository\VacanciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VacanciesRepository::class)]
class Vacancies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vacancies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $company = null;

    #[ORM\Column(length: 255)]
    private ?string $job = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: platform::class, inversedBy: 'vacancies')]
    private Collection $platform;

    #[ORM\OneToMany(mappedBy: 'vacancy', targetEntity: Applications::class)]
    private Collection $applications;

    public function __construct()
    {
        $this->platform = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?User
    {
        return $this->company;
    }

    public function setCompany(?User $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): static
    {
        $this->job = $job;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, platform>
     */
    public function getPlatform(): Collection
    {
        return $this->platform;
    }

    public function addPlatform(platform $platform): static
    {
        if (!$this->platform->contains($platform)) {
            $this->platform->add($platform);
        }

        return $this;
    }

    public function removePlatform(platform $platform): static
    {
        $this->platform->removeElement($platform);

        return $this;
    }

    /**
     * @return Collection<int, Applications>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Applications $application): static
    {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->setVacancy($this);
        }

        return $this;
    }

    public function removeApplication(Applications $application): static
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getVacancy() === $this) {
                $application->setVacancy(null);
            }
        }

        return $this;
    }
}
