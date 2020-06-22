<?php

namespace App\Entity;

use App\Repository\OuvriersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OuvriersRepository::class)
 */
class Ouvriers
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
    private $nom_et_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\ManyToOne(targetEntity=Taches::class, inversedBy="ouvrier")
     */
    private $taches;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtPrenom(): ?string
    {
        return $this->nom_et_prenom;
    }

    public function setNomEtPrenom(string $nom_et_prenom): self
    {
        $this->nom_et_prenom = $nom_et_prenom;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

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
        return $this->nom_et_prenom;
    }
}
