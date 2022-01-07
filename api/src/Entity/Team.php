<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $atk;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $def;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $hp;

    #[ORM\Column(type: 'float', nullable: true)]
    private $er;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $em;

    #[ORM\Column(type: 'float', nullable: true)]
    private $cr;

    #[ORM\Column(type: 'float', nullable: true)]
    private $cd;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ed;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentE;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentQ;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $talentAA;

    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'teams')]
    private $weapon;

    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'team')]
    private $character;

    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'teams')]
    private $element;

    #[ORM\Column(type: 'array', nullable: true)]
    private $artifact = [];

    public function __construct()
    {
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
