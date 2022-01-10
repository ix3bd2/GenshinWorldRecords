<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ApiResource(attributes: ["pagination_enabled" => false],normalizationContext: ['groups' => ['character']])
]

class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("character")]
    private $id;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $atk;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $def;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $hp;

    #[Groups("character")]
    #[ORM\Column(type: 'float', nullable: true)]
    private $er;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $em;

    #[Groups("character")]
    #[ORM\Column(type: 'float', nullable: true)]
    private $cr;

    #[Groups("character")]
    #[ORM\Column(type: 'float', nullable: true)]
    private $cd;

    #[Groups("character")]
    #[ORM\Column(type: 'float', nullable: true)]
    private $ed;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentE;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentQ;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentAA;

    #[Groups("character")]
    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'character')]
    private $weapon;

    #[Groups("character")]
    #[ORM\OneToMany(mappedBy: 'character', targetEntity: Team::class)]
    private $team;

    #[Groups("character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $videoUrl;

    #[Groups("character")]
    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'characters')]
    private $element;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $weaponRefine;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rarity;

    #[Groups("character")]
    #[ORM\Column(type: 'array', nullable: true)]
    private $buff = [];

    #[Groups("character")]
    #[ORM\Column(type: 'array', nullable: true)]
    private $artifact = [];

    public function __construct()
    {
        $this->team = new ArrayCollection();
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

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(?int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(?int $def): self
    {
        $this->def = $def;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(?int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getEr(): ?float
    {
        return $this->er;
    }

    public function setEr(?float $er): self
    {
        $this->er = $er;

        return $this;
    }

    public function getEm(): ?int
    {
        return $this->em;
    }

    public function setEm(?int $em): self
    {
        $this->em = $em;

        return $this;
    }

    public function getCr(): ?float
    {
        return $this->cr;
    }

    public function setCr(?float $cr): self
    {
        $this->cr = $cr;

        return $this;
    }

    public function getCd(): ?float
    {
        return $this->cd;
    }

    public function setCd(?float $cd): self
    {
        $this->cd = $cd;

        return $this;
    }

    public function getEd(): ?float
    {
        return $this->ed;
    }

    public function setEd(?float $ed): self
    {
        $this->ed = $ed;

        return $this;
    }

    public function getTalentE(): ?int
    {
        return $this->talentE;
    }

    public function setTalentE(?int $talentE): self
    {
        $this->talentE = $talentE;

        return $this;
    }

    public function getTalentQ(): ?int
    {
        return $this->talentQ;
    }

    public function setTalentQ(?int $talentQ): self
    {
        $this->talentQ = $talentQ;

        return $this;
    }

    public function getTalentAA(): ?int
    {
        return $this->talentAA;
    }

    public function setTalentAA(?int $talentAA): self
    {
        $this->talentAA = $talentAA;

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

    /**
     * @return Collection|Team[]
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->setCharacter($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getCharacter() === $this) {
                $team->setCharacter(null);
            }
        }

        return $this;
    }

    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    public function setVideoUrl(?string $videoUrl): self
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getWeaponRefine(): ?string
    {
        return $this->weaponRefine;
    }

    public function setWeaponRefine(?string $weaponRefine): self
    {
        $this->weaponRefine = $weaponRefine;

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

    public function getBuff(): ?array
    {
        return $this->buff;
    }

    public function setBuff(?array $buff): self
    {
        $this->buff = $buff;

        return $this;
    }

    public function getArtifact(): ?array
    {
        return $this->artifact;
    }

    public function setArtifact(?array $artifact): self
    {
        $this->artifact = $artifact;

        return $this;
    }
}
