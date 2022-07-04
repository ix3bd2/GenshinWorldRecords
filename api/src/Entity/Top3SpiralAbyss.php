<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\Top3SpiralAbyssRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: Top3SpiralAbyssRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['top3team']])
    ]
class Top3SpiralAbyss
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'top3SpiralAbyss', targetEntity: SpiralAbyssTeams::class)]
    #[Groups("top3team")]
    private $team;

    public function __construct()
    {
        $this->team = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, SpiralAbyssTeams>
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(SpiralAbyssTeams $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->setTop3SpiralAbyss($this);
        }

        return $this;
    }

    public function removeTeam(SpiralAbyssTeams $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getTop3SpiralAbyss() === $this) {
                $team->setTop3SpiralAbyss(null);
            }
        }

        return $this;
    }
}
