<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public private(set) ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\Column(length: 255)]
    private ?string $company = null;

    /** @var string[] $details */
    #[ORM\Column(type: Types::JSON)]
    private array $details = [];

    /** @var string[] $achievements */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $achievements = null;

    /** @var string[] $skills */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $skills = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    /** @return string[] */
    public function getDetails(): array
    {
        return $this->details;
    }

    /** @param string[] $details */
    public function setDetails(array $details): static
    {
        $this->details = $details;

        return $this;
    }

    /** @return string[]|null */
    public function getAchievements(): ?array
    {
        return $this->achievements;
    }

    /** @param string[] $achievements */
    public function setAchievements(?array $achievements): static
    {
        $this->achievements = $achievements;

        return $this;
    }

    /** @return string[]|null */
    public function getSkills(): ?array
    {
        return $this->skills;
    }

    /** @param string[] $skills */
    public function setSkills(?array $skills): static
    {
        $this->skills = $skills;

        return $this;
    }
}
