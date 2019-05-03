<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage")
 * @ORM\Entity
 */
class Voyage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_voyage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVoyage;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vol", inversedBy="idVoyage")
     * @ORM\JoinTable(name="voyage_vol",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_vol", referencedColumnName="id_vol")
     *   }
     * )
     */
    private $idVol;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idVol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdVoyage(): ?int
    {
        return $this->idVoyage;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Vol[]
     */
    public function getIdVol(): Collection
    {
        return $this->idVol;
    }

    public function addIdVol(Vol $idVol): self
    {
        if (!$this->idVol->contains($idVol)) {
            $this->idVol[] = $idVol;
        }

        return $this;
    }

    public function removeIdVol(Vol $idVol): self
    {
        if ($this->idVol->contains($idVol)) {
            $this->idVol->removeElement($idVol);
        }

        return $this;
    }

}
