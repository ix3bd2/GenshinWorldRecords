<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource(
   
)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

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
    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'teams')]
    private $weapon;

    #[Groups("character")]
    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'team')]
    private $character;

    #[Groups("character")]
    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'teams')]
    private $element;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[Groups("character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $AAimg;

    #[Groups("character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $talentEimg;

    #[Groups("character")]
    #[ORM\Column(type: 'text', nullable: true)]
    private $talentQimg;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $cons;

    #[Groups("character")]
    #[ORM\ManyToMany(targetEntity: Artifact::class, inversedBy: 'teams')]
    private $artifact;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rarity;

    public function __construct()
    {
        $this->artifact = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getWeapon(): ?weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getCharacter(): ?character
    {
        return $this->character;
    }

    public function setCharacter(?character $character): self
    {
        $this->character = $character;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAAimg(): ?string
    {
        return $this->AAimg;
    }

    public function setAAimg(?string $AAimg): self
    {
        $this->AAimg = $AAimg;

        return $this;
    }

    public function getTalentEimg(): ?string
    {
        return $this->talentEimg;
    }

    public function setTalentEimg(?string $talentEimg): self
    {
        $this->talentEimg = $talentEimg;

        return $this;
    }

    public function getTalentQimg(): ?string
    {
        return $this->talentQimg;
    }

    public function setTalentQimg(?string $talentQimg): self
    {
        $this->talentQimg = $talentQimg;

        return $this;
    }

    public function getCons(): ?int
    {
        return $this->cons;
    }

    public function setCons(?int $cons): self
    {
        $this->cons = $cons;

        return $this;
    }

    /**
     * @return Collection|Artifact[]
     */
    public function getArtifact(): Collection
    {
        return $this->artifact;
    }

    public function addArtifact(Artifact $artifact): self
    {
        if (!$this->artifact->contains($artifact)) {
            $this->artifact[] = $artifact;
        }

        return $this;
    }

    public function removeArtifact(Artifact $artifact): self
    {
        $this->artifact->removeElement($artifact);

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
}
