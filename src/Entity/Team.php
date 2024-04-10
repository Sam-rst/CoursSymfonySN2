<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $origin = null;

    #[ORM\Column(nullable: true)]
    private ?int $players = null;

    #[ORM\Column(length: 255)]
    private ?string $shirt = null;

    #[ORM\ManyToMany(targetEntity: Meeting::class, inversedBy: 'teams')]
    private Collection $meetings;

    public function __construct()
    {
        $this->meetings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): static
    {
        $this->origin = $origin;

        return $this;
    }

    public function getPlayers(): ?int
    {
        return $this->players;
    }

    public function setPlayers(?int $players): static
    {
        $this->players = $players;

        return $this;
    }

    public function getShirt(): ?string
    {
        return $this->shirt;
    }

    public function setShirt(string $shirt): static
    {
        $this->shirt = $shirt;

        return $this;
    }

    /**
     * @return Collection<int, Meeting>
     */
    public function getMeetings(): Collection
    {
        return $this->meetings;
    }

    public function addMeeting(Meeting $meeting): static
    {
        if (!$this->meetings->contains($meeting)) {
            $this->meetings->add($meeting);
        }

        return $this;
    }

    public function removeMeeting(Meeting $meeting): static
    {
        $this->meetings->removeElement($meeting);

        return $this;
    }
}
