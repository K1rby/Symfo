<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoyageVol
 *
 * @ORM\Table(name="voyage_vol", indexes={@ORM\Index(name="id_vol", columns={"id_vol"}), @ORM\Index(name="id_voyage", columns={"id_voyage"})})
 * @ORM\Entity
 */
class VoyageVol
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_voyagetrajet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVoyagetrajet;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    /**
     * @var \Vol
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vol", referencedColumnName="id_vol")
     * })
     */
    private $idVol;

    public function getIdVoyagetrajet(): ?int
    {
        return $this->idVoyagetrajet;
    }

    public function getIdVoyage(): ?Voyage
    {
        return $this->idVoyage;
    }

    public function setIdVoyage(?Voyage $idVoyage): self
    {
        $this->idVoyage = $idVoyage;

        return $this;
    }

    public function getIdVol(): ?Vol
    {
        return $this->idVol;
    }

    public function setIdVol(?Vol $idVol): self
    {
        $this->idVol = $idVol;

        return $this;
    }


}
