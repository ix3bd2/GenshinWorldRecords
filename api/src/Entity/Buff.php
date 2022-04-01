<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BuffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BuffRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['buffs']]
)]
class Buff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups("buffs", "character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $img;

    #[Groups("buffs", "character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[Groups("buffs")]
    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'buffs')]
    private $character;

    #[Groups("buffs", "character")]
    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'buffs')]
    private $weapon;

    #[Groups(["buffs", "character"])]
    #[ORM\ManyToOne(targetEntity: Artifact::class, inversedBy: 'buffs')]
    private $artifact;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

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

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getArtifact(): ?Artifact
    {
        return $this->artifact;
    }

    public function setArtifact(?Artifact $artifact): self
    {
        $this->artifact = $artifact;

        return $this;
    }
}
