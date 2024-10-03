<?php

namespace App\Entity;

use App\Repository\OpeningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningRepository::class)]
class Opening
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $ouvertureMatin = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $fermetureMatin = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $ouvertureMidi = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $fermetureMidi = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $jour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOuvertureMatin(): ?\DateTimeImmutable
    {
        return $this->ouvertureMatin;
    }

    public function setOuvertureMatin(\DateTimeImmutable $ouvertureMatin): static
    {
        $this->ouvertureMatin = $ouvertureMatin;

        return $this;
    }

    public function getFermetureMatin(): ?\DateTimeImmutable
    {
        return $this->fermetureMatin;
    }

    public function setFermetureMatin(\DateTimeImmutable $fermetureMatin): static
    {
        $this->fermetureMatin = $fermetureMatin;

        return $this;
    }

    public function getOuvertureMidi(): ?\DateTimeImmutable
    {
        return $this->ouvertureMidi;
    }

    public function setOuvertureMidi(\DateTimeImmutable $ouvertureMidi): static
    {
        $this->ouvertureMidi = $ouvertureMidi;

        return $this;
    }

    public function getFermetureMidi(): ?\DateTimeImmutable
    {
        return $this->fermetureMidi;
    }

    public function setFermetureMidi(\DateTimeImmutable $fermetureMidi): static
    {
        $this->fermetureMidi = $fermetureMidi;

        return $this;
    }

    public function getJour(): ?\DateTimeImmutable
    {
        return $this->jour;
    }

    public function setJour(\DateTimeImmutable $jour): static
    {
        $this->jour = $jour;

        return $this;
    }
}