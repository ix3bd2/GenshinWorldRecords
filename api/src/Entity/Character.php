<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ApiResource(
    
    attributes: ["pagination_enabled" => false],normalizationContext: ['groups' => ['character']])
]

class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["character","buffs"])]
    private $id;

    #[Groups(["character","patchChar","buffs"])]
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

    #[Groups(["character","patchChar","buffs"])]
    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'characters')]
    private $element;

    #[Groups("character")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $weaponRefine;

    #[Groups(["character","patchChar"])]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $rarity;

    #[Groups("character")]
    #[ORM\Column(type: 'array', nullable: true)]
    private $buff = [];
    
    #[Groups(["character","patchChar"])]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nation;

    #[ORM\OneToMany(mappedBy: 'characters', targetEntity: PatchChar::class)]
    private $patchChars;

    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'text', nullable: true)]
    private $AAimg;

    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'text', nullable: true)]
    private $talentEimg;
    
    #[Groups(["character","buffs"])]
    #[ORM\Column(type: 'text', nullable: true)]
    private $talentQimg;

    #[Groups("character")]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $cons;

    #[Groups("character")]
    #[ORM\OneToMany(mappedBy: 'character', targetEntity: Buff::class)]
    private $buffs;

    #[Groups("character")]
    #[ORM\ManyToMany(targetEntity: Artifact::class, inversedBy: 'characters')]
    private $artifact;

    #[Groups("character")]
    #[ORM\ManyToMany(targetEntity: Buff::class, inversedBy: 'characters')]
    private $allBuffs;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->patchChars = new ArrayCollection();
        $this->buffs = new ArrayCollection();
        $this->artifact = new ArrayCollection();
        $this->allBuffs = new ArrayCollection();
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

    public function getNation(): ?string
    {
        return $this->nation;
    }

    public function setNation(?string $nation): self
    {
        $this->nation = $nation;

        return $this;
    }

    /**
     * @return Collection|PatchChar[]
     */
    public function getPatchChars(): Collection
    {
        return $this->patchChars;
    }

    public function addPatchChar(PatchChar $patchChar): self
    {
        if (!$this->patchChars->contains($patchChar)) {
            $this->patchChars[] = $patchChar;
            $patchChar->setCharacters($this);
        }

        return $this;
    }

    public function removePatchChar(PatchChar $patchChar): self
    {
        if ($this->patchChars->removeElement($patchChar)) {
            // set the owning side to null (unless already changed)
            if ($patchChar->getCharacters() === $this) {
                $patchChar->setCharacters(null);
            }
        }

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
            $buff->setCharacter($this);
        }

        return $this;
    }

    public function removeBuff(Buff $buff): self
    {
        if ($this->buffs->removeElement($buff)) {
            // set the owning side to null (unless already changed)
            if ($buff->getCharacter() === $this) {
                $buff->setCharacter(null);
            }
        }

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

    /**
     * @return Collection|Buff[]
     */
    public function getAllBuffs(): Collection
    {
        return $this->allBuffs;
    }

    public function addAllBuff(Buff $allBuff): self
    {
        if (!$this->allBuffs->contains($allBuff)) {
            $this->allBuffs[] = $allBuff;
        }

        return $this;
    }

    public function removeAllBuff(Buff $allBuff): self
    {
        $this->allBuffs->removeElement($allBuff);

        return $this;
    }
}
