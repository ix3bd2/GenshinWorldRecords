<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeaponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]class Weapon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["character","buffs"])]
    private $id;

    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'text', nullable: true)]
    private $img;

    #[ORM\OneToMany(mappedBy: 'weapon', targetEntity: Character::class)]
    private $character;

    #[ORM\OneToMany(mappedBy: 'weapon', targetEntity: Team::class)]
    private $teams;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rarity;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $atk;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $substate;

    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'text', nullable: true)]
    private $passive;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $type;

    #[ORM\OneToMany(mappedBy: 'weapon', targetEntity: Buff::class)]
    private $buffs;

    public function __construct()
    {
        $this->character = new ArrayCollection();
        $this->teams = new ArrayCollection();
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

    public function getRarity(): ?int
    {
        return $this->rarity;
    }

    public function setRarity(?int $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(?int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getSubstate(): ?string
    {
        return $this->substate;
    }

    public function setSubstate(?string $substate): self
    {
        $this->substate = $substate;

        return $this;
    }

    public function getPassive(): ?string
    {
        return $this->passive;
    }

    public function setPassive(?string $passive): self
    {
        $this->passive = $passive;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

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
            $buff->setWeapon($this);
        }

        return $this;
    }

    public function removeBuff(Buff $buff): self
    {
        if ($this->buffs->removeElement($buff)) {
            // set the owning side to null (unless already changed)
            if ($buff->getWeapon() === $this) {
                $buff->setWeapon(null);
            }
        }

        return $this;
    }
}
