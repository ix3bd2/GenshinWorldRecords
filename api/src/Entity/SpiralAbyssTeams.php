<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SpiralAbyssTeamsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SpiralAbyssTeamsRepository::class)]
#[ApiResource(
    
    normalizationContext: ['groups' => ['abyssTeam']])
    
]
class SpiralAbyssTeams
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["abyssTeam","top3team"])]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $atk;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $def;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $hp;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $er;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $em;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $cr;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $cd;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $ed;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $talentE;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $talentQ;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $talentAA;

    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'spiralAbyssTeams')]
    #[Groups(["abyssTeam","top3team"])]
    private $weapon;

    #[ORM\ManyToOne(targetEntity: Character::class, inversedBy: 'spiralAbyssTeams')]
    #[Groups(["abyssTeam","top3team"])]
    private $character;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(["abyssTeam","top3team"])]
    private $cons;

    #[ORM\ManyToMany(targetEntity: Artifact::class, inversedBy: 'spiralAbyssTeams')]
    #[Groups(["abyssTeam","top3team"])]
    private $artifact;

    #[ORM\ManyToOne(targetEntity: Top3SpiralAbyss::class, inversedBy: 'team')]
    #[Groups(["abyssTeam","top3team"])]
    private $top3SpiralAbyss;

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

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

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
     * @return Collection<int, Artifact>
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

    public function getTop3SpiralAbyss(): ?Top3SpiralAbyss
    {
        return $this->top3SpiralAbyss;
    }

    public function setTop3SpiralAbyss(?Top3SpiralAbyss $top3SpiralAbyss): self
    {
        $this->top3SpiralAbyss = $top3SpiralAbyss;

        return $this;
    }
}
