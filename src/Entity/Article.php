<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $vehicleName = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $circulationDate = null;

    #[ORM\Column]
    private ?int $kilometer = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;


    /*
     *
     * constructeur
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleName(): ?string
    {
        return $this->vehicleName;
    }

    public function setVehicleName(string $vehicleName): static
    {
        $this->vehicleName = $vehicleName;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCirculationDate(): ?\DateTimeImmutable
    {
        return $this->circulationDate;
    }

    public function setCirculationDate(\DateTimeImmutable $circulationDate): static
    {
        $this->circulationDate = $circulationDate;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): static
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}