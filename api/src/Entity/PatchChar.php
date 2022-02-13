<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatchCharRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PatchCharRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
    attributes: ["pagination_enabled" => false],normalizationContext: ['groups' => ['patchChar']])
]
class PatchChar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("patchChar")]
    private $id;

    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'patchChars')]
    #[Groups("patchChar")]
    private $characters;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("patchChar")]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("patchChar")]
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacters(): ?Character
    {
        return $this->characters;
    }

    public function setCharacters(?Character $characters): self
    {
        $this->characters = $characters;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
