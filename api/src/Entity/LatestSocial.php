<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LatestSocialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LatestSocialRepository::class)]
#[ApiResource]
class LatestSocial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'array', nullable: true)]
    private $tweets = [];

    #[ORM\Column(type: 'text', nullable: true)]
    private $youtubeVideo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTweets(): ?array
    {
        return $this->tweets;
    }

    public function setTweets(?array $tweets): self
    {
        $this->tweets = $tweets;

        return $this;
    }

    public function getYoutubeVideo(): ?string
    {
        return $this->youtubeVideo;
    }

    public function setYoutubeVideo(?string $youtubeVideo): self
    {
        $this->youtubeVideo = $youtubeVideo;

        return $this;
    }
}
