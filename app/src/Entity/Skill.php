<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public private(set) ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /** @var string[] $keywords */
    #[ORM\Column(type: Types::JSON)]
    private array $keywords = [];

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /** @return string[] */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /** @param string[] $keywords */
    public function setKeywords(array $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }
}
