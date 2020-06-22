<?php

namespace App\Entity;

use App\Repository\TachesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TachesRepository::class)
 */
class Taches
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
    private $nom_tache;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\ManyToOne(targetEntity=Projets::class, inversedBy="tache")
     */
    private $projets;

    /**
     * @ORM\OneToMany(targetEntity=Ouvriers::class, mappedBy="taches")
     */
    private $ouvrier;

    /**
     * @ORM\OneToMany(targetEntity=Materiels::class, mappedBy="taches")
     */
    private $Materiel;

    public function __construct()
    {
        $this->ouvrier = new ArrayCollection();
        $this->Materiel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTache(): ?string
    {
        return $this->nom_tache;
    }

    public function setNomTache(string $nom_tache): self
    {
        $this->nom_tache = $nom_tache;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getProjets(): ?Projets
    {
        return $this->projets;
    }

    public function setProjets(?Projets $projets): self
    {
        $this->projets = $projets;

        return $this;
    }

    /**
     * @return Collection|Ouvriers[]
     */
    public function getOuvrier(): Collection
    {
        return $this->ouvrier;
    }

    public function addOuvrier(Ouvriers $ouvrier): self
    {
        if (!$this->ouvrier->contains($ouvrier)) {
            $this->ouvrier[] = $ouvrier;
            $ouvrier->setTaches($this);
        }

        return $this;
    }

    public function removeOuvrier(Ouvriers $ouvrier): self
    {
        if ($this->ouvrier->contains($ouvrier)) {
            $this->ouvrier->removeElement($ouvrier);
            // set the owning side to null (unless already changed)
            if ($ouvrier->getTaches() === $this) {
                $ouvrier->setTaches(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Materiels[]
     */
    public function getMateriel(): Collection
    {
        return $this->Materiel;
    }

    public function addMateriel(Materiels $materiel): self
    {
        if (!$this->Materiel->contains($materiel)) {
            $this->Materiel[] = $materiel;
            $materiel->setTaches($this);
        }

        return $this;
    }

    public function removeMateriel(Materiels $materiel): self
    {
        if ($this->Materiel->contains($materiel)) {
            $this->Materiel->removeElement($materiel);
            // set the owning side to null (unless already changed)
            if ($materiel->getTaches() === $this) {
                $materiel->setTaches(null);
            }
        }

        return $this;
    }

    public function  __toString()
    {
        return $this->nom_tache;
    }
}
