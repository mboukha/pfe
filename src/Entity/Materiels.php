<?php

namespace App\Entity;

use App\Repository\MaterielsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielsRepository::class)
 */
class Materiels
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
    private $nom_mat;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantities;

    /**
     * @ORM\ManyToOne(targetEntity=Taches::class, inversedBy="Materiel")
     */
    private $taches;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMat(): ?string
    {
        return $this->nom_mat;
    }

    public function setNomMat(string $nom_mat): self
    {
        $this->nom_mat = $nom_mat;

        return $this;
    }

    public function getQuantities(): ?int
    {
        return $this->quantities;
    }

    public function setQuantities(int $quantities): self
    {
        $this->quantities = $quantities;

        return $this;
    }

    public function getTaches(): ?Taches
    {
        return $this->taches;
    }

    public function setTaches(?Taches $taches): self
    {
        $this->taches = $taches;

        return $this;
    }

    public function  __toString()
    {
        return $this->nom_mat;
    }
}
