<?php

namespace App\Entity;

use App\Repository\ShowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShowRepository::class)
 * @ORM\Table(name="`show`")
 */
class Show
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $rate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity=Artist::class, inversedBy="shows")
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity=MusicalStyle::class, inversedBy="shows")
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="shows")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=Venu::class, inversedBy="shows")
     */
    private $venu;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getStyle(): ?MusicalStyle
    {
        return $this->style;
    }

    public function setStyle(?MusicalStyle $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getVenu(): ?Venu
    {
        return $this->venu;
    }

    public function setVenu(?Venu $venu): self
    {
        $this->venu = $venu;

        return $this;
    }

}
