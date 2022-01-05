<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeaponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]class Weapon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $img;

    #[ORM\OneToMany(mappedBy: 'weapon', targetEntity: Character::class)]
    private $character;

    #[ORM\OneToMany(mappedBy: 'weapon', targetEntity: Team::class)]
    private $teams;

    public function __construct()
    {
        $this->character = new ArrayCollection();
        $this->teams = new ArrayCollection();
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

    /**
     * @return Collection|character[]
     */
    public function getcharacter(): Collection
    {
        return $this->character;
    }

    public function addCharacter(character $character): self
    {
        if (!$this->character->contains($character)) {
            $this->character[] = $character;
            $character->setWeapon($this);
        }

        return $this;
    }

    public function removeCharacter(character $character): self
    {
        if ($this->character->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getWeapon() === $this) {
                $character->setWeapon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->setWeapon($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getWeapon() === $this) {
                $team->setWeapon(null);
            }
        }

        return $this;
    }
}
