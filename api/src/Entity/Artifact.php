<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArtifactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArtifactRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]
class Artifact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[Groups("character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $img;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $halfset;

    #[ORM\Column(type: 'text', nullable: true)]
    private $fullset;

    #[ORM\OneToMany(mappedBy: 'aritfact', targetEntity: Buff::class)]
    private $buffs;

    #[ORM\ManyToMany(targetEntity: Character::class, mappedBy: 'artifact')]
    private $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->buffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
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

    public function getHalfset(): ?string
    {
        return $this->halfset;
    }

    public function setHalfset(?string $halfset): self
    {
        $this->halfset = $halfset;

        return $this;
    }

    public function getFullset(): ?string
    {
        return $this->fullset;
    }

    public function setFullset(?string $fullset): self
    {
        $this->fullset = $fullset;

        return $this;
    }

    /**
     * @return Collection|Buff[]
     */
    public function getBuffs(): Collection
    {
        return $this->buffs;
    }

    public function addBuff(Buff $buff): self
    {
        if (!$this->buffs->contains($buff)) {
            $this->buffs[] = $buff;
            $buff->setAritfact($this);
        }

        return $this;
    }

    public function removeBuff(Buff $buff): self
    {
        if ($this->buffs->removeElement($buff)) {
            // set the owning side to null (unless already changed)
            if ($buff->getAritfact() === $this) {
                $buff->setAritfact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->addArtifact($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            $character->removeArtifact($this);
        }

        return $this;
    }
}
