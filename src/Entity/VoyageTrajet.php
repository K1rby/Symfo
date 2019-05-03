<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoyageTrajet
 *
 * @ORM\Table(name="voyage_trajet", indexes={@ORM\Index(name="id_voyage", columns={"id_voyage"}), @ORM\Index(name="id_trajet", columns={"id_trajet"})})
 * @ORM\Entity
 */
class VoyageTrajet
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
     * @var \Trajet
     *
     * @ORM\ManyToOne(targetEntity="Trajet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_trajet", referencedColumnName="id_trajet")
     * })
     */
    private $idTrajet;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    public function getIdVoyagetrajet(): ?int
    {
        return $this->idVoyagetrajet;
    }

    public function getIdTrajet(): ?Trajet
    {
        return $this->idTrajet;
    }

    public function setIdTrajet(?Trajet $idTrajet): self
    {
        $this->idTrajet = $idTrajet;

        return $this;
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


}
